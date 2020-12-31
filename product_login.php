<?php
require_once("connMysql.php");
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
//函式：自動產生指定長度的密碼
function MakePass($length) {
$possible = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$str = "";
while(strlen($str)<$length){
$str .= substr($possible, rand(0, strlen($possible)), 1);
}
return($str);
}
$ordernumber=MakePass(10);
if(isset($_POST["action"])&&($_POST["action"]=="orderlist")){
//輸入資料的各項連結位置
$query_insert = "INSERT INTO customer (co_name, co_iden, co_mail, co_bank, co_account, co_phone, co_Room, co_RoomVIP1, co_RoomVIP2, co_RoomPresident, co_roomtime, co_ordernumber, co_total, co_pay, co_jointime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
$stmt = $db_link->prepare($query_insert);
$stmt->bind_param("ssssssssssssss",$co_name, $co_iden, $co_mail, $co_bank, $co_account, $co_phone, $co_Room, $co_RoomVIP1, $co_RoomVIP2, $co_RoomPresident, $co_roomtime, $ordernumber, $co_total, $co_pay);
$co_name = GetSQLValueString($_POST["co_name"], 'string');
$co_iden = GetSQLValueString($_POST["co_iden"], 'string');
$co_mail = GetSQLValueString($_POST["co_mail"], 'string');
$co_bank = GetSQLValueString($_POST["co_bank"], 'string');
$co_account = GetSQLValueString($_POST["co_account"], 'string');
$co_phone = GetSQLValueString($_POST["co_phone"], 'string');
$co_Room = GetSQLValueString($_POST["co_Room"], 'string');
$co_RoomVIP1 = GetSQLValueString($_POST["co_RoomVIP1"], 'string');
$co_RoomVIP2 = GetSQLValueString($_POST["co_RoomVIP2"], 'string');
$co_RoomPresident = GetSQLValueString($_POST["co_RoomPresident"], 'string');
$co_roomtime = GetSQLValueString($_POST["co_roomtime"], 'string');
$co_ordernumber = GetSQLValueString($ordernumber, 'string');
$co_total = GetSQLValueString($_POST["co_total"], 'string');
$co_pay = GetSQLValueString($_POST["co_pay"], 'string');
$stmt->execute();
$stmt->close();
$db_link->close();
header("Location: product_thank.php");
}

?>
<!DOCTYPE html>
<html lang="zh-tw"><!--中文編輯-->
<head>
    <meta charset="utf-8"><!--編碼格式-->
    <title>天山溫泉度假飯店</title><!--網頁名稱-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!--RWD-->
    <meta name="Keywords" content="天山溫泉度假飯店"/><!--SEO關鍵字搜尋-->
    <meta name="description" content="盤據陽明山俯視大台北市區之美景，享受陽明山特有的白磺溫泉，提供旅客頂級休閒之旅" /><!--網站簡介-->
    <meta name="author" content="DavidLan 依此網站模板編改 http://webthemez.com"><!--本網頁作者-->
    <link rev="made" href="mailto:cljh20220@gmail.com"><!--本網頁作者e-mail-->
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="css/jcarousel.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
        .noborder{border: hidden; }
    </style>
</head>
<body class=""><div id="wrapper">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div><a href="index.html"><img src="img/logo2.png" alt="logo"></a></div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li ><a style="font-size:25px" href="index.html">Home</a></li>
                        <li><a style="font-size:25px" href="about.html">關於我們</a></li>
                        <li class="active"><a style="font-size:25px" href="product.php">客房介紹</a></li>
                        <li><a style="font-size:25px" href="department.html">飯店設施</a></li>
                        <li><a style="font-size:25px" href="contact.html">聯絡我們</a></li>
                        <li><a style="font-size:25px" href="product_search.php">訂房查詢</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">資料填寫</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-top:4%; padding-bottom:4%;font-size:30px; color:red;"><strong>訂房內容</strong></div>
                <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                <form action='' method="POST" >
                    <?php
                    if (isset($_POST['Room'])&&($_POST['Room']>0))
                    {
                    echo '<div class="col-md-6" style="padding-bottom:2%; font-size:25px;">                   
                        <input class=noborder name="co_Room" value="雅緻雙人客房'.$_POST['Room'].'間" readonly></div>';
                        }
                        else{
                            echo '<input class=noborder name="co_Room" type="hidden" value="">';
                        }
                    if (isset($_POST['RoomVIP1'])&&($_POST['RoomVIP1']>0))
                    {
                    echo '<div class="col-md-6" style="padding-bottom:2%; font-size:25px;">                   
                        <input class=noborder name="co_RoomVIP1" value="VIP精緻雙人客房'.$_POST['RoomVIP1'].'間" readonly></div>';
                        }
                        else{
                            echo '<input class=noborder name="co_RoomVIP1" type="hidden" value="">';
                        }
                    if (isset($_POST['RoomVIP2'])&&($_POST['RoomVIP2']>0))
                    {
                    echo '<div class="col-md-6" style="padding-bottom:2%; font-size:25px;">                   
                        <input class=noborder name="co_RoomVIP2" value="VIP豪華雙人客房'.$_POST['RoomVIP2'].'間" readonly></div>';
                        }
                        else{
                            echo '<input class=noborder name="co_RoomVIP2" type="hidden" value="">';
                        }
                    if (isset($_POST['RoomPresident'])&&($_POST['RoomPresident']>0))
                    {
                    echo '<div class="col-md-6" style="padding-bottom:2%; font-size:25px;">                   
                        <input class=noborder name="co_RoomPresident" value="總統級四人客房'.$_POST['RoomPresident'].'間" readonly></div>';
                        }
                        else{
                            echo '<input class=noborder name="co_RoomPresident" type="hidden" value="">';
                        }
                        ?>
                        <div class="col-md-12" style="padding-bottom:0.1%;font-size:5px;"></div>
                    <div class="col-md-6" style="padding-top:2%; padding-bottom:2%;font-size:25px;">入住時間為：
                        <input  class="noborder" name="co_roomtime" value="<?php echo $_POST['roomtime'];?>" readonly>
                    </div>
                    <div class="col-md-6" style="padding-top:2%; padding-bottom:2%;font-size:25px;">總計費用：
                        <input  class="noborder" name="co_total" value="<?php echo 4500*$_POST['Room']+7000*$_POST['RoomVIP1']+7000*$_POST['RoomVIP2']+12000*$_POST['RoomPresident'];?>" readonly>
                    </div>
                    
                    <div class="col-md-3" style="padding-top:2%; font-size:25px;">姓名：
                        <input type='text' name='co_name' id='co_name' size='10' required>
                    </div>
                    <div class="col-md-4" style="padding-top:2%; font-size:25px;">身分證：
                        <input type='text' name='co_iden' id='co_iden'  size='16' required>
                    </div>
                    <div class="col-md-5" style="padding-top:2%; font-size:25px;">電子信箱：
                        <input type='text' name='co_mail' id='co_mail'  size='20' required>
                    </div>
                    <div class="col-md-3" style="padding-top:2%; font-size:25px;">電話：
                        <input type='text' name='co_phone' id='co_phone'  size='10' required>
                    </div>
                    <div class="col-md-4" style="padding-top:2%; font-size:25px;">匯款銀行名稱：
                        <input type='text' name='co_bank' id='co_bank'  size='10' required>
                    </div>
                    <div class="col-md-5" style="padding-top:2%; font-size:25px;">匯款帳號：
                        <input type='text' name='co_account' id='co_account'  size='20' required>
                    </div>
                    <input name="co_pay" type="hidden" id="co_pay" value="未付(每天17:00更新)">
                </div>
                <div class="col-md-8" style="padding-top:2%;"></div>
                <div class="col-md-2" style="padding-top:5%; padding-bottom:5%; padding-left:5%; padding-right:5%">
                    <input name="action" type="hidden" id="action" value="orderlist"><button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit>訂房完成</button>
                    
                </div>
            </form>
            <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:5%; padding-right:5%">
                <a href="product.php"><button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px">回上一頁</button></a>
            </div>
            
        </div>
    </div>
</section>
<!-- 將所有資料存到資料表-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h2 class="widgetheading"><a href="#">天山溫泉度假飯店</a></h2>
                    <address>
                    112台北市北投區竹子湖路1號</address>
                    <p>
                        <i class="icon-phone"></i> 0800-000-000 <br>
                        <i class="icon-envelope-alt"></i> admin@skymountain.com
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h2 class="widgetheading">推薦景點</h2>
                    <ul class="link-list">
                        <li><a href="https://hotspringmuseum.taipei">北投溫泉博物館</a></li>
                        <li><a href="https://www.npm.gov.tw">國立故宮博物院</a></li>
                        
                        <li><a href="https://www.tshs.ntpc.gov.tw">淡水紅毛城</a></li>
                        <li><a href="https://www.president.gov.tw">總統府</a></li>
                        <li><a href="https://www.cksmh.gov.tw">中正紀念堂</a></li>
                        <li><a href="https://www.taipei-101.com.tw">台北101購物中心</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h2 class="widgetheading">友情連結</h2>
                    <ul class="link-list">
                        <li><a href="http://starmapple774.byethost3.com/tree">天然煌葉</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget">
                    <h2 class="widgetheading">員工專區</h2>
                    <ul class="link-list">
                        <li><a href="employee_login.php">員工登入</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; Above Site All right reserved. DavidLan modify template of WebThemez</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li><a href="https://www.facebook.com/" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/" data-placement="top" title="youtube"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</div>
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</head>
</html>