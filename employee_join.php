<?php
function GetSQLValueString($theValue, $theType) {
  switch ($theType) {
    case "string":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";//過濾雙引號，單引號，反斜線
      break;
    case "int":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";//過濾數字和加減以外
      break;
    case "email":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";//過濾email以外
      break;
    case "url":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";//過濾網址以外
      break;      
  }
  return $theValue;
}
date_default_timezone_set("Asia/Taipei");
if(isset($_POST["action"])&&($_POST["action"]=="join")){
	require_once("connMysql.php");
	//找尋帳號是否已經註冊
	$query_RecFindUser = "SELECT em_username FROM employee_member WHERE em_username='{$_POST["em_username"]}'";
	$RecFindUser=$db_link->query($query_RecFindUser);
	if ($RecFindUser->num_rows>0){
		header("Location: employee_join.php?errMsg=1&username={$_POST["em_username"]}");
	}else{
	//若沒有執行新增的動作	
		$query_insert = "INSERT INTO employee_member (em_name, em_username, em_passwd, em_sex, em_birthday, em_email, em_url, em_phone, em_address, em_jointime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
		$stmt = $db_link->prepare($query_insert);
		$stmt->bind_param("sssssssss", $em_name, $em_username, $em_passwd, $em_sex, $em_birthday, $em_email, $em_url, $em_phone, $em_address);
			$em_name = GetSQLValueString($_POST["em_name"], 'string');
			$em_username = GetSQLValueString($_POST["em_username"], 'string');
			$em_passwd = password_hash($_POST["em_passwd"], PASSWORD_DEFAULT);
			$em_sex = GetSQLValueString($_POST["em_sex"], 'string');
			$em_birthday = GetSQLValueString($_POST["em_birthday"], 'string');
			$em_email = GetSQLValueString($_POST["em_email"], 'email');
			$em_url = GetSQLValueString($_POST["em_url"], 'url');
			$em_phone = GetSQLValueString($_POST["em_phone"], 'string');
			$em_address = GetSQLValueString($_POST["em_address"], 'string');
		$stmt->execute();
		$stmt->close();
		$db_link->close();
		header("Location: employee_join.php?loginStats=1");
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
<script language="javascript">
function checkForm(){
	if(document.formJoin.em_username.value==""){		
		alert("請填寫帳號!");
		document.formJoin.em_username.focus();
		return false;
	}else{
		uid=document.formJoin.em_username.value;
		if(uid.length<5 || uid.length>12){
			alert( "您的帳號長度只能5至12個字元!" );
			document.formJoin.em_username.focus();
			return false;}
		if(!(uid.charAt(0)>='a' && uid.charAt(0)<='z')){
			alert("您的帳號第一字元只能為小寫字母!" );
			document.formJoin.em_username.focus();
			return false;}
		for(idx=0;idx<uid.length;idx++){
			if(uid.charAt(idx)>='A'&&uid.charAt(idx)<='Z'){
				alert("帳號不可以含有大寫字元!" );
				document.formJoin.em_username.focus();
				return false;}
			if(!(( uid.charAt(idx)>='a'&&uid.charAt(idx)<='z')||(uid.charAt(idx)>='0'&& uid.charAt(idx)<='9')||( uid.charAt(idx)=='_'))){
				alert( "您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!" );
				document.formJoin.em_username.focus();
				return false;}
			if(uid.charAt(idx)=='_'&&uid.charAt(idx-1)=='_'){
				alert( "「_」符號不可相連 !\n" );
				document.formJoin.em_username.focus();
				return false;}
		}
	}
	if(!check_passwd(document.formJoin.em_passwd.value,document.formJoin.em_passwdrecheck.value)){
		document.formJoin.em_passwd.focus();
		return false;}	
	if(document.formJoin.em_name.value==""){
		alert("請填寫姓名!");
		document.formJoin.em_name.focus();
		return false;}
	if(document.formJoin.em_birthday.value==""){
		alert("請填寫生日!");
		document.formJoin.em_birthday.focus();
		return false;}
	if(document.formJoin.em_email.value==""){
		alert("請填寫電子郵件!");
		document.formJoin.em_email.focus();
		return false;}
	if(!checkmail(document.formJoin.em_email)){
		document.formJoin.em_email.focus();
		return false;}
	return confirm('確定送出嗎？');
}
function check_passwd(pw1,pw2){
	if(pw1==''){
		alert("密碼不可以空白!");
		return false;}
	for(var idx=0;idx<pw1.length;idx++){
		if(pw1.charAt(idx) == ' ' || pw1.charAt(idx) == '\"'){
			alert("密碼不可以含有空白或雙引號 !\n");
			return false;}
		if(pw1.length<5 || pw1.length>10){
			alert( "密碼長度只能5到10個字母 !\n" );
			return false;}
		if(pw1!= pw2){
			alert("密碼二次輸入不一樣,請重新輸入 !\n");
			return false;}
	}
	return true;
}
function checkmail(myEmail) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(myEmail.value)){
		return true;}
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
<?php if(isset($_GET["loginStats"]) && ($_GET["loginStats"]=="1")){?>
<script language="javascript">
alert('會員新增成功\n請用申請的帳號密碼登入。');
window.location.href='employee_login.php';		  
</script>
<?php }?>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <p class="title">新增資料</p>
		  <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
          <div class="errDiv">帳號 <?php echo $_GET["username"];?> 已經有人使用！</div>
          <?php }?>
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading">帳號資料</p>
            <p><strong>使用帳號</strong>：
            <input name="em_username" type="text" class="normalinput" id="em_username">
            <font color="#FF0000">*</font><br><span class="smalltext">請填入5~12個字元以內的小寫英文字母、數字、以及_ 符號。</span></p>
            <p><strong>使用密碼</strong>：
            <input name="em_passwd" type="password" class="normalinput" id="em_passwd">
            <font color="#FF0000">*</font><br><span class="smalltext">請填入5~10個字元以內的英文字母、數字、以及各種符號組合，</span></p>
            <p><strong>確認密碼</strong>：
            <input name="em_passwdrecheck" type="password" class="normalinput" id="em_passwdrecheck">
            <font color="#FF0000">*</font> <br><span class="smalltext">再輸入一次密碼</span></p>
            <hr size="1" />
            <p class="heading">個人資料</p>
            <p><strong>真實姓名</strong>：
            <input name="em_name" type="text" class="normalinput" id="em_name">
            <font color="#FF0000">*</font></p>
            <p><strong>性　　別</strong>：
            <input name="em_sex" type="radio" value="女" checked>女
            <input name="em_sex" type="radio" value="男">男
            <font color="#FF0000">*</font></p>
            <p><strong>生　　日</strong>：
            <input name="em_birthday" type="text" class="normalinput" id="em_birthday">
            <font color="#FF0000">*</font> <br>
            <span class="smalltext">為西元格式(YYYY-MM-DD)。</span></p>
            <p><strong>電子郵件</strong>：
            <input name="em_email" type="text" class="normalinput" id="em_email">
            <font color="#FF0000">*</font><br><span class="smalltext">請確定此電子郵件為可使用狀態，以方便未來系統使用，如補寄會員密碼信。</span></p>
            <p><strong>電　　話</strong>：
            <input name="em_phone" type="text" class="normalinput" id="em_phone"></p>
            <p><strong>住　　址</strong>：
            <input name="em_address" type="text" class="normalinput" id="em_address" size="40"></p>
            <p> <font color="#FF0000">*</font> 表示為必填的欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="送出申請">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
        <div class="regbox">
          <p class="heading"><strong>填寫資料注意事項：</strong></p>
          <ol>
            <li> 請提供您本人正確、最新及完整的資料。 </li>
            <li> 在欄位後方出現「*」符號表示為必填的欄位。</li>
            <li>填寫時請您遵守各個欄位後方的補助說明。</li>
            <li>關於您的會員註冊以及其他特定資料，本系統不會向任何人出售或出借你所填寫的個人資料。</li>
            <li>在註冊成功後，除了「使用帳號」外您可以在會員專區內修改您所填寫的個人資料。</li>
          </ol>
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