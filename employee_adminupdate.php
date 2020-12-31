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
date_default_timezone_set("Asia/Taipei");
require_once("connMysql.php");
session_start();
//檢查是否經過登入
if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: employee_login.php");
}
//檢查權限是否足夠
if($_SESSION["memberLevel"]=="member"){
	header("Location: employee_center.php");
}
//執行登出動作
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: employee_login.php");
}
//執行更新動作
if(isset($_POST["action"])&&($_POST["action"]=="update")){	
	$query_update = "UPDATE employee_member SET em_passwd=?, em_name=?, em_sex=?, em_birthday=?, em_email=?, em_url=?, em_phone=?, em_address=? WHERE em_id=?";
	$stmt = $db_link->prepare($query_update);
	//檢查是否有修改密碼
	$mpass = $_POST["em_passwdo"];
	if(($_POST["em_passwd"]!="")&&($_POST["em_passwd"]==$_POST["em_passwdrecheck"])){
		$mpass = password_hash($_POST["em_passwd"], PASSWORD_DEFAULT);
	}
	$stmt->bind_param("ssssssssi", 
		$mpass,
		GetSQLValueString($_POST["em_name"], 'string'),
		GetSQLValueString($_POST["em_sex"], 'string'),		
		GetSQLValueString($_POST["em_birthday"], 'string'),
		GetSQLValueString($_POST["em_email"], 'email'),
		GetSQLValueString($_POST["em_url"], 'url'),
		GetSQLValueString($_POST["em_phone"], 'string'),
		GetSQLValueString($_POST["em_address"], 'string'),		
		GetSQLValueString($_POST["em_id"], 'int'));
	$stmt->execute();
	$stmt->close();
		//重新導向
	header("Location: employee_admin.php");
}
//選取管理員資料
$query_RecAdmin = "SELECT * FROM employee_member WHERE em_username='{$_SESSION["loginMember"]}'";
$RecAdmin = $db_link->query($query_RecAdmin);	
$row_RecAdmin=$RecAdmin->fetch_assoc();
//繫結選取會員資料
$query_RecMember = "SELECT * FROM employee_member WHERE em_id='{$_GET["id"]}'";
$RecMember = $db_link->query($query_RecMember);	
$row_RecMember=$RecMember->fetch_assoc();
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
  
<script language="javascript">
function checkForm(){
	if(document.formJoin.em_passwd.value!="" || document.formJoin.em_passwdrecheck.value!=""){
		if(!check_passwd(document.formJoin.m_passwd.value,document.formJoin.em_passwdrecheck.value)){
			document.formJoin.em_passwd.focus();
			return false;
		}
	}	
	if(document.formJoin.em_name.value==""){
		alert("請填寫姓名!");
		document.formJoin.em_name.focus();
		return false;
	}
	if(document.formJoin.em_birthday.value==""){
		alert("請填寫生日!");
		document.formJoin.em_birthday.focus();
		return false;
	}
	if(document.formJoin.em_email.value==""){
		alert("請填寫電子郵件!");
		document.formJoin.em_email.focus();
		return false;
	}
	if(!checkmail(document.formJoin.em_email)){
		document.formJoin.em_email.focus();
		return false;
	}
	return confirm('確定送出嗎？');
}
function check_passwd(pw1,pw2){
	if(pw1==''){
		alert("密碼不可以空白!");
		return false;
	}
	for(var idx=0;idx<pw1.length;idx++){
		if(pw1.charAt(idx) == ' ' || pw1.charAt(idx) == '\"'){
			alert("密碼不可以含有空白或雙引號 !\n");
			return false;
		}
		if(pw1.length<5 || pw1.length>10){
			alert( "密碼長度只能5到10個字母 !\n" );
			return false;
		}
		if(pw1!= pw2){
			alert("密碼二次輸入不一樣,請重新輸入 !\n");
			return false;
		}
	}
	return true;
}
function checkmail(myEmail) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(myEmail.value)){
		return true;
	}
	alert("電子郵件格式不正確");
	return false;
}
</script>
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
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading">帳號資料</p>
            <p><strong>使用帳號</strong>：<?php echo $row_RecMember["em_username"];?></p>
            <p><strong>使用密碼</strong> ：
            <input name="em_passwd" type="password" class="normalinput" id="em_passwd">
            <input name="em_passwdo" type="hidden" id="em_passwdo" value="<?php echo $row_RecMember["em_passwd"];?>"></p>
            <p><strong>確認密碼</strong> ：
            <input name="em_passwdrecheck" type="password" class="normalinput" id="em_passwdrecheck"><br>
            <span class="smalltext">若不修改密碼，請不要填寫。若要修改，請輸入密碼二次。</span></p>
            <hr size="1" />
            <p class="heading">個人資料</p>
            <p><strong>真實姓名</strong>：
            <input name="em_name" type="text" class="normalinput" id="em_name" value="<?php echo $row_RecMember["em_name"];?>">
            <font color="#FF0000">*</font> </p>
            <p><strong>性　　別</strong>：
            <input name="em_sex" type="radio" value="女" <?php if($row_RecMember["em_sex"]=="女") echo "checked";?>>女
            <input name="em_sex" type="radio" value="男" <?php if($row_RecMember["em_sex"]=="男") echo "checked";?>>男
            <font color="#FF0000">*</font></p>
            <p><strong>生　　日</strong>：
            <input name="em_birthday" type="text" class="normalinput" id="em_birthday" value="<?php echo $row_RecMember["em_birthday"];?>">
            <font color="#FF0000">*</font><br><span class="smalltext">為西元格式(YYYY-MM-DD)。 </span></p>
            <p><strong>電子郵件</strong>：
            <input name="em_email" type="text" class="normalinput" id="em_email" value="<?php echo $row_RecMember["em_email"];?>">
            <font color="#FF0000">*</font><br><span class="smalltext">請確定此電子郵件為可使用狀態，以方便未來系統使用，如補寄會員密碼信。</span></p>
            <p><strong>電　　話</strong>：
            <input name="em_phone" type="text" class="normalinput" id="em_phone" value="<?php echo $row_RecMember["em_phone"];?>"></p>
            <p><strong>住　　址</strong>：
            <input name="em_address" type="text" class="normalinput" id="em_address" value="<?php echo $row_RecMember["em_address"];?>" size="40"></p>
            <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="em_id" type="hidden" id="em_id" value="<?php echo $row_RecMember["em_id"];?>">
            <input name="action" type="hidden" id="action" value="update">
            <input type="submit" name="Submit2" value="修改資料">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
        <div class="regbox">
          <p class="heading"><strong>會員系統</strong></p>
            <p><strong><?php echo $row_RecAdmin["em_name"];?></strong> 您好。</p>
            <p>本次登入的時間為：<br>
            <?php $ew_ip_logintime=date("Y-m-d H:i:s"); echo $ew_ip_logintime;?></p>
            <p align="center"><a href="employee_admin.php">管理中心</a> | <a href="?logout=true">登出系統</a></p>
        </div>
        <div class="boxbl"></div><div class="boxbr"></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark"></td>
  </tr>
</table>
</body>
</html>
<?php
	$db_link->close();
?>