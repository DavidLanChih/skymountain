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
                        <li><a style="font-size:25px" href="product.php">客房介紹</a></li>
                        <li><a style="font-size:25px" href="department.html">飯店設施</a></li>
                        <li><a style="font-size:25px" href="contact.php">聯絡我們</a></li>
                        <li class="active"><a style="font-size:25px" href="product_search.php">訂單查詢</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">訂單查詢</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <form action="" method="POST">
                    <div class="col-md-12" style="padding-top:2%; "></div>
                    <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                    <div class="col-md-6" style="padding-top:2%; font-size:30px; color:red;"><strong>查詢編號： </strong>
                        <input type='text' name='search' id='search' width='100%'>
                        <span style="padding-left:1%; font-size:60%; color:black;">請填入10個字元（大寫英文字母及數字）</span>
                    </div>
                    <div class="col-md-1"style="padding-top:2%; font-size:30px; color:red;">
                        <input name="action" type="hidden" id="action" value="">
                        <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit>搜尋</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8" style="padding-top:1%;"></div>
            
        </div>
    </div>
</section>
<section>
    <div class="contain">
        <div class="row">
            <div class=col-md-12>
                <table align="center" width=70%>
                    <tr bgcolor="#f0f0f0" height=50px >
                        <th width="14%" style="border:4px white solid; text-align:center;">房客姓名</th>
                        <th width="14%" style="border:4px white solid; text-align:center;">預訂房間</th>
                        <th width="14%" style="border:4px white solid; text-align:center;">入住時間</th>
                        <th width="14%" style="border:4px white solid; text-align:center;">總共金額</th>
                        <th width="14%" style="border:4px white solid; text-align:center;">付款狀況</th>
                    </tr>
                    <tr>
                        <?php
                        require_once("connMysql.php");
                        if(isset($_POST['action']))
                        {
                        $sql_query = "SELECT co_name, co_roomtime, co_total, co_Room, co_RoomVIP1, co_RoomVIP2, co_RoomPresident, co_pay FROM customer WHERE co_ordernumber=? " ;
                        $search_ordernumber = $_POST['search'];
                        $stmtAll = $db_link->prepare($sql_query);
                        $stmtAll->bind_param("s",$search_ordernumber);
                        $stmtAll->execute();
                        $stmtAll->bind_result($co_name ,$co_roomtime , $co_total, $co_Room, $co_RoomVIP1, $co_RoomVIP2, $co_RoomPresident, $co_pay);
                        
                        
                        while ($stmtAll->fetch())
                        {
                        echo "<td width='14%' style='border:4px white solid; text-align:center; vertical-align: middle;'>".$co_name."</td>";
                        echo "<td width='14%' style='border:4px white solid; text-align:center;'>".$co_Room."<div>".$co_RoomVIP1."</div><div>".$co_RoomVIP2."</div><div>".$co_RoomPresident."</div></td>";
                        echo "<td width='14%' style='border:4px white solid; text-align:center;'>".$co_roomtime."</td>";
                        echo "<td width='14%' style='border:4px white solid; text-align:center;'>".$co_total."</td>";
                        echo "<td width='14%' style='border:4px white solid; text-align:center;'>".$co_pay."</td>";
                        }
                        
                        $db_link->close();
                        
                        }
                        ?>
                    </tr>
                </table>
                <div class="col-md-12" style="padding-top:5%; padding-left:7%; padding-right:7%"></div>
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