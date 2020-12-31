<?php
//設定字串、整數應有的格式
function GetSQLValueString($theValue, $theType) {
switch ($theType) {
case "string":
$theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";
break;
case "int":
$theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
break;
}
return $theValue;
}
date_default_timezone_set("Asia/Taipei");
//若表格有發送，則執行以下內容
if(isset($_POST["action"])&&($_POST["action"]=="worktime")){
require_once("connMysql.php");
//找尋帳號是否已經註冊
$query_FindUser = "SELECT em_username FROM employee_member WHERE em_username='{$_POST["ew_username"]}'";
$FindUser=$db_link->query($query_FindUser);
if ($FindUser->num_rows>0){
//比對帳號密碼的預備語法
$query_Login = "SELECT em_username, em_passwd FROM employee_member WHERE em_username=?";
$stmt=$db_link->prepare($query_Login);
$stmt->bind_param("s", $_POST["ew_username"]);
$stmt->execute();
//取出帳號密碼的值綁定結果
$stmt->bind_result($ew_username, $ew_passwd);
$stmt->fetch();
$stmt->close();
//比對密碼，若登入成功則輸入資料
if(password_verify($_POST["ew_passwd"],$ew_passwd)){
//輸入資料的各項連結位置
$query_ins = "INSERT INTO employee_work (ew_ip_location, ew_ip_logintime, ew_username, ew_name, ew_work, ew_jointime) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $db_link->prepare($query_ins);
$stmt->bind_param("sssss",$ew_ip_location, $ew_ip_logintime, $ew_username, $ew_name, $ew_work);
$ew_ip_location = GetSQLValueString($_POST["ew_ip_location"], 'string');
$ew_ip_logintime = GetSQLValueString($_POST["ew_ip_logintime"], 'string');
$ew_username = GetSQLValueString($_POST["ew_username"], 'string');
$ew_name = GetSQLValueString($_POST["ew_name"], 'string');
$ew_work = GetSQLValueString($_POST["ew_work"], 'string');
$stmt->execute();
$stmt->close();
$db_link->close();
header("Location: employee_center.php");
}
$db_link->close();
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
    if(document.formJoin.ew_username.value==""){
    alert("請填寫帳號!");
    document.formJoin.ew_username.focus();
    return false;
    }else{
    uid=document.formJoin.ew_username.value;
    if(uid.length<5 || uid.length>12){
    alert( "您的帳號長度只能5至12個字元!" );
    document.formJoin.ew_username.focus();
    return false;}
    if(!(uid.charAt(0)>='a' && uid.charAt(0)<='z')){
    alert("您的帳號第一字元只能為小寫字母!" );
    document.formJoin.ew_username.focus();
    return false;}
    for(idx=0;idx<uid.length;idx++){
    if(uid.charAt(idx)>='A'&&uid.charAt(idx)<='Z'){
    alert("帳號不可以含有大寫字元!" );
    document.formJoin.ew_username.focus();
    return false;}
    if(!(( uid.charAt(idx)>='a'&&uid.charAt(idx)<='z')||(uid.charAt(idx)>='0'&& uid.charAt(idx)<='9')||( uid.charAt(idx)=='_'))){
    alert( "您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!" );
    document.formJoin.ew_username.focus();
    return false;}
    if(uid.charAt(idx)=='_'&&uid.charAt(idx-1)=='_'){
    alert( "「_」符號不可相連 !\n" );
    document.formJoin.ew_username.focus();
    return false;}
    }
    }
    if(!check_passwd(document.formJoin.ew_passwd.value,document.formJoin.ew_passwdrecheck.value)){
    document.formJoin.ew_passwd.focus();
    return false;}
    if(document.formJoin.ew_name.value==""){
    alert("請填寫姓名!");
    document.formJoin.ew_name.focus();
    return false;}
    if(document.formJoin.ew_birthday.value==""){
    alert("請填寫生日!");
    document.formJoin.ew_birthday.focus();
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
        alert('上下班打卡成功\n回到員工資料管理。');
        window.location.href='employee_login.php';
        </script>
        <?php }?>
        <table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
          
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr valign="top">
                <td><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
                  <p class="title">上下班打卡</p>
                  <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
                  <div class="errDiv">帳號 <?php echo $_GET["username"];?> 已經有人使用！</div>
                  <?php }?>
                  <div class="dataDiv">
                    <hr size="1" />
                    <p class="heading">帳號資料</p>
                    <p><strong>使用帳號</strong>：
                      <input name="ew_username" type="text" class="normalinput" id="ew_username">
                      <font color="#FF0000">*</font><br><span class="smalltext">請填入5~12個字元以內的小寫英文字母、數字、以及_ 符號。</span></p>
                      <p><strong>使用密碼</strong>：
                        <input name="ew_passwd" type="password" class="normalinput" id="ew_passwd">
                        <font color="#FF0000">*</font><br><span class="smalltext">請填入5~10個字元以內的英文字母、數字、以及各種符號組合，</span></p>
                        <p><strong>確認密碼</strong>：
                          <input name="ew_passwdrecheck" type="password" class="normalinput" id="ew_passwdrecheck">
                          <font color="#FF0000">*</font> <br><span class="smalltext">再輸入一次密碼</span></p>
                          <hr size="1" />
                          <p class="heading">個人資料</p>
                          <p><strong>負責人員</strong>：
                            <input name="ew_name" type="text" class="normalinput" id="ew_name" required>
                          <font color="#FF0000">*</font><br></p>
                          <p><strong>打卡類別</strong>：
                            <input name="ew_work" type="radio" value="上班打卡" checked>上班
                            <input name="ew_work" type="radio" value="下班打卡">下班
                          <font color="#FF0000">*</font></p>
                          <p><strong>IP登入位置</strong>：
                            <input name="ew_ip_location" id="ew_ip_location" value="<?php
                            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                            } else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                            }
                            echo $_SERVER['REMOTE_ADDR'];
                            ?>" readonly>
                          <font color="#FF0000">*</font></p>
                          <p><strong>IP登入時間</strong>：
                            <input name="ew_ip_logintime" id="ew_ip_logintime" value="<?php
                            $ew_ip_logintime=date("Y-m-d H:i:s"); echo $ew_ip_logintime;
                            ?>">
                          <font color="#FF0000">*</font></p>
                        </div>
                        
                        <p align="center">
                          <input name="action" type="hidden" id="action" value="worktime">
                          <input type="submit" name="Submit2" value="打卡">
                          <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
                        </p>
                      </form></td>
                      
                    </tr>
                  </table></td>
                </tr>
              </table>
            </body>
          </html>