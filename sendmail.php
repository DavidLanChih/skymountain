<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>線上郵寄系統</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	margin: 0px;
	background-image: url(images/formtomail_bg.png);
	background-repeat: repeat-x;
	background-position: top;
	font-size: 10pt;
	background-color: #99CCCC;
}
form {
	margin: 0px;
}
#contentDiv {
	margin-right: auto;
	margin-left: auto;
	width: 520px;
	background-image: url(images/mailmark.png);
	background-repeat: no-repeat;
	background-position: right top;
}
#siteinfo {
	font-size: 9pt;
	text-align: center;
	font-family: Tahoma, Geneva, sans-serif;
	color: #333;
}
.info {
	font-size: 11pt;
	background-color: #FF6;
	background-image: url(images/icon_info.png);
	background-repeat: no-repeat;
	background-position: 5px center;
	padding-top: 5px;
	padding-right: 5px;
	padding-bottom: 5px;
	padding-left: 24px;
	color: #F00;
	border-radius: 10px;
	width: 480px;
	margin-right: auto;
	margin-bottom: 10px;
	margin-left: auto;
	margin-top: 10px;
}
.showdata {	font-size: 11pt;
	line-height: 150%;
	font-weight: normal;
	color: #F60;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>

</head>
<body bgcolor="#ffffff">
  <?php
    require_once('PHPMailer/PHPMailerAutoload.php'); //引入phpMailer 記得將路徑換成您自己的path
    $mail= new PHPMailer(); //初始化一個PHPMailer物件
    $mail->Host = "smtp.gmail.com"; //SMTP主機 (這邊以gmail為例，所以填寫gmail stmp)
    $mail->IsSMTP(); //設定使用SMTP方式寄信
    $mail->SMTPAuth = true; //啟用SMTP驗證模式
    $mail->Username = "cljh20220@gmail.com"; //您的 gamil 帳號
    $mail->Password = "sb010070"; //您的 gmail 密碼
    $mail->SMTPSecure = "ssl"; // SSL連線 (要使用gmail stmp需要設定ssl模式) 
    $mail->Port = 465; //Gamil的SMTP主機的port(Gmail為465)。
    $mail->CharSet = "utf-8"; //郵件編碼
      
    $mail->From = $_POST['mailfrom']; //寄件者信箱
    $mail->FromName = $_POST['mailname']; //寄件者姓名
    $mail->AddAddress("cljh20220@gmail.com", "天山溫泉度假會館"); //收件人郵件和名稱
    //$mail->AddBCC("天山溫泉度假會館"); //設定 副本收件人 
    //$mail->AddBCC("天山溫泉度假會館"); //設定 密件副本收件人 
    
    $mail->IsHTML(true); //郵件內容為html 
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //添加附件(若不需要則註解掉就好)
     
    $mail->Subject = $_POST['mailsubject']; //郵件標題
    $mail->Body = $_POST['mailcontent']; //郵件內容
    $mail->AltBody = '當收件人的電子信箱不支援html時，會顯示這串~~';
     
 /*    
    if(!$mail->send()) {
        echo '信件發送失敗!!';    
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {    
        echo '信件已發送!!';
    }
  */
?>

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td><img name="formtomail_r1_c1" src="images/formtomail_r1_c1.png" width="600" height="105" border="0" alt=""></td>
  </tr>
  <tr>
    <?php
      if(!$mail->send()) {
        echo '<td background="images/formtomail_r2_c1.png"><div class="info">信件發送失敗!!</div>';    
        //echo 'Mailer Error: ' . $mail->ErrorInfo;//
    } else {    
        echo '<td background="images/formtomail_r2_c1.png"><div class="info">信件已發送!!</div>';
    }
    ?>
      <div id="contentDiv">
      <table width="100%" border="0" cellpadding="5" cellspacing="0">
          <tr>
            <td width="60"><strong> 寄件者</strong></td>
            <td><?php echo $_POST["mailfrom"]; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><strong> 收件者</strong></td>
            <td><?php echo "天山溫泉度假會館"; ?>&nbsp;</td>
          </tr>


          <tr>
            <td><strong>主旨</strong></td>
            <td><?php echo $_POST["mailsubject"]; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><?php echo nl2br($_POST["mailcontent"]); ?>&nbsp;</td>
          </tr>
          <tr>
            
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
   
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
