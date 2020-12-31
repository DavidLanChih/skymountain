<?php
function GetSQLValueString($theValue, $theType) {
  switch ($theType) {
    case "string":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";
      break;
    case "int":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
      break;
    case "email":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";
      break;
    case "url":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";
      break;      
  }
  return $theValue;
}
require_once("connMysql.php");
session_start();
//函式：自動產生指定長度的密碼
function MakePass($length) { 
	$possible = "0123456789!@#$%^&*()_+abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	$str = ""; 
	while(strlen($str)<$length){ 
	  $str .= substr($possible, rand(0, strlen($possible)), 1); 
	}
	return($str); 
}
//檢查是否經過登入，若有登入則重新導向
if(isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"]!="")){
	//若帳號等級為 member 則導向會員中心
	if($_SESSION["memberLevel"]=="member"){
		header("Location: employee_center.php");
	//否則則導向管理中心
	}else{
		header("Location: employee_admin.php");	
	}
}
//檢查是否為會員
if(isset($_POST["em_username"])){
	$muser = GetSQLValueString($_POST["em_username"], 'string');
	//找尋該會員資料
	$query_RecFindUser = "SELECT em_username, em_email FROM employee_member WHERE em_username='{$muser}'";
	$RecFindUser = $db_link->query($query_RecFindUser);	
	if ($RecFindUser->num_rows==0){
		header("Location: employee_admin_passmail.php?errMsg=1&username={$muser}");
	}else{	
	//取出帳號密碼的值
		$row_RecFindUser=$RecFindUser->fetch_assoc();
		$username = $row_RecFindUser["em_username"];
		$usermail = $row_RecFindUser["em_email"];	
		//產生新密碼並更新
		$newpasswd = MakePass(10);
		$mpass = password_hash($newpasswd, PASSWORD_DEFAULT);
		$query_update = "UPDATE employee_member SET em_passwd='{$mpass}' WHERE em_username='{$username}'";
		$db_link->query($query_update);
		//補寄密碼信
		$mailcontent ="您好，<br />您的帳號為：{$username} <br/>您的新密碼為：{$newpasswd} <br/>";
		$mailFrom="=?UTF-8?B?" . base64_encode("會員管理系統") . "?= <service@e-happy.com.tw>";
		$mailto=$usermail;
		$mailSubject="=?UTF-8?B?" . base64_encode("補寄密碼信"). "?=";
		$mailHeader="From:".$mailFrom."\r\n";
		$mailHeader.="Content-type:text/html;charset=UTF-8";
		if(!@mail($mailto,$mailSubject,$mailcontent,$mailHeader)) die("郵寄失敗！");
		header("Location: employee_admin_passmail.php?mailStats=1");
	}
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>天山飯店員工登入系統</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="css/jcarousel.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body >
    <div id="wrapper">
      <!-- start header -->
      <header>
        <div class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div><a href="index.html"><img src="img/logo2.png" alt="logo"></a></div>
          </div>
        </div>
      </header>
<?php if(isset($_GET["mailStats"]) && ($_GET["mailStats"]=="1")){?>
<script>alert('密碼信補寄成功！');window.location.href='index.php';</script>
<?php }?>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
        <tr>
          <td>
            <table width="95%" border="0" cellspacing="0" cellpadding="10">
              <tr><td height="30"></td></tr>
              <tr valign="top">
                <td ><p class="title" style="color: black;">天山溫泉度假飯店員工登入系統</p>
                <p>感謝各位加入天山溫泉度假飯店，我們視為所有員工皆為一家人，請務必互相協助，彼此友善溝通，一同成長，共同回饋社會大眾。</p>
                <p class="heading">請各位員工遵守以下規則： </p>
                <ol>
                  <li>每個員工已有建檔，<strong style="color: red;">請於上下班時在飯店電腦登入進行打卡(會有IP紀錄)，並請打卡後登出系統。</strong>
                    <li><i style="color: green;">每個員工須於下班前新增當日作業狀況，但新增後不得再修改或刪除，如有狀況請於當日下班向管理者申請修改。</i></li>
                    <li>若是遺忘密碼，會員可由系統發出電子信函通知。</li>
                    <li>管理者可以新增、修改、刪除會員的資料。</li>
                    <li> 互相尊重，嚴禁互相惡意攻擊， 漫罵。</li>
                  </ol></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div><div class="regbox">
          <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
          <div class="errDiv">帳號「 <strong><?php echo $_GET["username"];?></strong>」沒有人使用！</div>
          <?php }?>
          <p class="heading">忘記密碼？</p>
          <form name="form1" method="post" action="">
            <p>請輸入您申請的帳號，系統將自動產生一個十位數的密碼寄到您註冊的信箱。</p>
            <p><strong>帳號</strong>：<br>
              <input name="em_username" type="text" class="logintextbox" id="em_mail"></p>
            <p align="center">
              <input type="submit" name="button" id="button" value="寄密碼信">
              <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();">
            </p>
            </form>
          
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark"></td>
  </tr>
</table>
</body>
</html>