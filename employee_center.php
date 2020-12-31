<?php
require_once("connMysql.php");
session_start();
//檢查是否經過登入
if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
header("Location: employee_login.php");
}
//執行登出動作
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
unset($_SESSION["loginMember"]);
unset($_SESSION["memberLevel"]);
header("Location: employee_login.php");
}
date_default_timezone_set("Asia/Taipei");
//繫結登入會員資料
$query_RecMember = "SELECT * FROM employee_member WHERE em_username = '{$_SESSION["loginMember"]}'";
$RecMember = $db_link->query($query_RecMember);
$row_RecMember=$RecMember->fetch_assoc();
$query_RecWork = "SELECT * FROM employee_work WHERE ew_username = '{$_SESSION["loginMember"]}'";
$RecWork = $db_link->query($query_RecWork);
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
      <table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
        <tr>
          <td>
            <table width="95%" border="0" cellspacing="0" cellpadding="10">
              <tr><td height="30"></td></tr>
              <tr valign="top">
                <td ><p class="title" style="color: black;">工作狀況記錄系統</p>
                
                <p class="heading">請各位員工遵守以下規則： </p>
                <ol>
                  <li>每個員工已有建檔，<strong style="color: red;">請於上下班時在飯店電腦登入進行打卡(會有IP紀錄)，並請打卡後登出系統；若忘記密碼，請跟管理員申請新的密碼。</strong>
                    <li><strong><i style="color: green;">每個員工須於下班前新增當日工作狀況。</i></strong></li>
                    <li>管理員可以新增、修改、刪除員工的資料。</li>
                    <li> 互相尊重，嚴禁互相惡意攻擊、漫罵。</li>
                  </ol>
                  <hr>
                  
                </td>
                <td width="50"></td>
                <td width="200">
                  <div class="boxtl"></div><div class="boxtr"></div>
                  <div class="regbox">
                    <p align="center" class="heading"><strong>員工資訊管理</strong></p>
                    
                    <p><strong><?php echo $row_RecMember["em_name"];?></strong> 您好。</p>
                    <p>本次登入的時間為：<br>
                    <?php $ew_ip_logintime=date("Y-m-d H:i:s"); echo $ew_ip_logintime;?></p>
                    <p align="center"><a href="employee_add.php">新增工作資料</a> | <a href="?logout=true">登出系統</a></p>
                    <p align="center"><a href="employee_worktime.php">上下班打卡</a></p>
                  </div>
                  <div class="boxbl"></div><div class="boxbr"></div></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" background="images/album_r2_c1.jpg" class="trademark"></td>
            </tr>
          </table>
          <table align="center" width="1200px">
            <tr bgcolor="#f0f0f0" height=50px >
              <th width="3%" style="border:4px white solid; text-align:center;">月</th>
              <th width="3%" style="border:4px white solid; text-align:center;">日</th>
              <th width="6%" style="border:4px white solid; text-align:center;">時</th>
              <th width="10%" style="border:4px white solid; text-align:center;">負責人員</th>
              <th width="10%" style="border:4px white solid; text-align:center;">清理房間號碼</th>
              <th width="20%" style="border:4px white solid; text-align:center;">特殊狀況報告</th>
              <th width="16%" style="border:4px white solid; text-align:center;">登入IP位置</th>
              <th width="18%" style="border:4px white solid; text-align:center;">打卡時間</th>
              <th width="14%" style="border:4px white solid; text-align:center;">打卡狀態</th>
            </tr>
            <?php while ($row_RecWork=$RecWork->fetch_assoc()){
            echo "<tr>
              <td style='text-align:center;'>".$row_RecWork["ew_month"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_day"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_time"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_name"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_roomnumber"]."</td>
              <td>".$row_RecWork["ew_roomcondition"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_ip_location"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_ip_logintime"]."</td>
              <td style='text-align:center;'>".$row_RecWork["ew_work"]."</td>
            </tr>";}
            ?>
          </table>
        </body>
      </html>
      <?php
      $db_link->close();
      ?>