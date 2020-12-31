<?php
require_once("connMysql.php");
$sql_query = "SELECT * FROM customer ORDER BY co_id DESC LIMIT 0 , 1" ;
$result = mysqli_query($db_link, $sql_query);
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
                        <li><a style="font-size:25px" href="contact.php">聯絡我們</a></li>
                        <li><a style="font-size:25px" href="product_search.php">訂單查詢</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">感謝您的預訂~</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-top:2%; font-size:30px;"><strong>訂單編號為：</strong></div>
                <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                <div class="col-md-12" style="padding-top:2%; font-size:35px;  color:red;">
                    <?php
                    while ($row_result = $result->fetch_assoc()){
                    echo $row_result['co_ordernumber']; }
                    ?>
                </div>
                <!--文字夾於區塊內，建議在div標籤內以padding的%來設定位置，若不設定則區塊高度會等於字體高度-->
                <div class="col-md-12" style="padding-top:2%; font-size:25px;">煩請自行記住編號或列印本頁，以便查詢！</div>
            </div>
            <div class="col-md-8" >備註：<ul><li>請於兩日內匯款完成，若無匯款則取消訂單。</li><li>若欲先付訂金，則須匯款10%金額，房間將保留至當日。</li><li>入住報到須在當日15:00-21:00完成。</li></ul></div>
            <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:7%; padding-right:7%">
                <a href='product.php'><button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px">繼續訂位</button></a>
            </div>
            <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:7%; padding-right:7%">
                <a href='index.html'><button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px">回首頁</button></a>
            </div>
        </div>
    </div>
</section>
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