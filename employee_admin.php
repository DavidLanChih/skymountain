<?php
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
date_default_timezone_set("Asia/Taipei");
//執行登出動作
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
  unset($_SESSION["loginMember"]);
  unset($_SESSION["memberLevel"]);
  header("Location: employee_login.php");
}
//刪除會員
if(isset($_GET["action"])&&($_GET["action"]=="delete")){
  $query_delMember = "DELETE FROM employee_member WHERE em_id=?";
  $stmt=$db_link->prepare($query_delMember);
  $stmt->bind_param("i", $_GET["id"]);
  $stmt->execute();
  $stmt->close();
  //重新導向回到主畫面
  header("Location: employee_admin.php");
}
//選取管理員資料
$query_RecAdmin = "SELECT em_id, em_name, em_logintime FROM employee_member WHERE em_username=?";
$stmt=$db_link->prepare($query_RecAdmin);
$stmt->bind_param("s", $_SESSION["loginMember"]);
$stmt->execute();
$stmt->bind_result($mid, $mname, $mlogintime);
$stmt->fetch();
$stmt->close();
//選取所有一般會員資料
//預設每頁筆數
$pageRow_records = 5;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
$num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecMember = "SELECT * FROM employee_member WHERE em_level<>'admin' ORDER BY em_jointime DESC";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecMember = $query_RecMember." LIMIT {$startRow_records}, {$pageRow_records}";
//以加上限制顯示筆數的SQL敘述句查詢資料到 $resultMember 中
$RecMember = $db_link->query($query_limit_RecMember);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_resultMember 中
$all_RecMember = $db_link->query($query_RecMember);
//計算總筆數
$total_records = $all_RecMember->num_rows;
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records/$pageRow_records);
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
      <table width="1050" border="0" align="center" cellpadding="4" cellspacing="0">
        
        <tr>
          <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
            <tr valign="top">
              <td><p class="title">員工資料列表 </p>
              <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#F0F0F0">
                <tr height=30px >
                  <th style="border:4px white solid; text-align:center;" width="10%" bgcolor="#CCCCCC">修/刪</th>
                  <th style="border:4px white solid; text-align:center;" width="15%" bgcolor="#CCCCCC">姓名</th>
                  <th style="border:4px white solid; text-align:center;" width="15%" bgcolor="#CCCCCC">帳號</th>
                  <th style="border:4px white solid; text-align:center;" width="25%" bgcolor="#CCCCCC">加入時間</th>
                  <th style="border:4px white solid; text-align:center;" width="25%" bgcolor="#CCCCCC">上次登入</th>
                  <th style="border:4px white solid; text-align:center;" width="10%" bgcolor="#CCCCCC">登入</th>
                </tr>
                <?php while($row_RecMember=$RecMember->fetch_assoc()){ ?>
                <tr>
                  <td width="10%" align="center" bgcolor="#FFFFFF"><p><a href="employee_adminupdate.php?id=<?php echo $row_RecMember["em_id"];?>">修改</a><br>
                  <a href="?action=delete&id=<?php echo $row_RecMember["em_id"];?>" onClick="return deletesure();">刪除</a></p></td>
                  <td width="15%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["em_name"];?></p></td>
                  <td width="15%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["em_username"];?></p></td>
                  <td width="25%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["em_jointime"];?></p></td>
                  <td width="25%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["em_logintime"];?></p></td>
                  <td width="10%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["em_login"];?></p></td>
                </tr>
                <?php }?>
              </table>
              <hr size="1" />
              <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
                <tr>
                  <td valign="middle"><p>員工資料筆數：<?php echo $total_records;?></p></td>
                  <td align="right"><p>
                    <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
                    <a href="?page=1">第一頁</a> | <a href="?page=<?php echo $num_pages-1;?>">上一頁</a> |
                    <?php }?>
                    <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
                    <a href="?page=<?php echo $num_pages+1;?>">下一頁</a> | <a href="?page=<?php echo $total_pages;?>">最末頁</a>
                    <?php }?>
                  </p></td>
                </tr>
                </table><p>&nbsp;</p>
              </td>
              <td width="50"></td>
              <td width="230">
                <br><br><br>
                <div class="boxtl"></div><div class="boxtr"></div>
                <div class="regbox">
                  <p align="center" class="heading"><strong>管理員系統</strong></p>
                  <p><strong><?php echo $mname;?></strong>您好~<br>
                  本次登入的時間為：<br><?php $ew_ip_logintime=date("Y-m-d H:i:s"); echo $ew_ip_logintime;?></p>
                  <p align="center"><a href="employee_join.php?id=<?php echo $mid;?>">新增員工資料</a> | <a href="employee_adminupdate.php?id=<?php echo $mid;?>">修改管理員資料</a> </p><p  align="center"> <a href="?logout=true">登出系統</a></p>
                </div>
                <div class="boxbl"></div><div class="boxbr"></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" background="images/album_r2_c1.jpg" class="trademark"></td>
          </tr>
        </table>
        
      </table>
      
      </body>
    </html>
    <?php
      $db_link->close();
    ?>