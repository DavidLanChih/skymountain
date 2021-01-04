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
                    <h2 class="pageTitle">客房介紹</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-top:2%; "></div>
                <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                <form action='product_login.php' name='roomorder' id='roomorder' method='POST'>
                <div class="col-md-3" style="padding-top:2%; "></div>
                
                <div class="col-md-5" style="padding-top:3%; padding-left:5%; font-size:25px ">入住時間：<input type=date name=roomtime id=roomtime required></div>
                <div class="col-md-2" style="padding-top:2%; padding-left:5%; font-size:25px ">
                    <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit name=order >立即訂房</button>
                </div>
                <div class="col-md-1" style="padding-top:2%; padding-left:5%; font-size:25px ">
                <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=reset name=order >重新填寫</button>
            </div>
                <div class="col-md-12" style="padding-top:5%; "></div>
                <div class="col-md-3"><img width="100%" src="img/Room.jpg" alt=""></div>
                <!--圖片夾於區塊內，若設定100%，也只會佔col-md-3的100%長度-->
                <div class="col-md-3" style="padding-top:6%; padding-bottom:6%; padding-left:5%; font-size:25px">雅緻雙人客房</div>
                <!--文字夾於區塊內，建議在div標籤內以padding的%來設定位置，若不設定則區塊高度會等於字體高度-->
                <div class="col-md-2" style="padding-top:6%; padding-bottom:5%; padding-left:5%; color: red; font-size:25px">4500元</div>
                
                <div class="col-md-2" style="padding-top:5.5%; padding-bottom:5.5%; padding-left:5%; font-size:25px">數量
                    
                        <select name=Room id=Room>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:5%;">
                        <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit name=order >立即訂房</button>
                    </div>
                
                <div class="col-md-12" style="padding-top:5%; "></div>
                <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                <div class="col-md-3"><img width="100%" src="img/RoomVIP1.jpg" alt=""></div>
                <!--圖片夾於區塊內，若設定100%，也只會佔col-md-3的100%長度-->
                <div class="col-md-3" style="padding-top:6%; padding-bottom:6%; padding-left:5%; font-size:25px">VIP精緻雙人客房</div>
                <!--文字夾於區塊內，建議在div標籤內以padding的%來設定位置，若不設定則區塊高度會等於字體高度-->
                <div class="col-md-2" style="padding-top:6%; padding-bottom:5%; padding-left:5%; color: red; font-size:25px">7000元</div>
                <div class="col-md-2" style="padding-top:5.5%; padding-bottom:5.5%; padding-left:5%; font-size:25px">數量
                    
                        <select name=RoomVIP1 id=RoomVIP1>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:5%;">
                        <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit name=order >立即訂房</button>
                    </div>
                
                <div class="col-md-12" style="padding-top:5%; "></div>
                <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                <div class="col-md-3"><img width="100%" src="img/RoomVIP2.jpg" alt=""></div>
                <!--圖片夾於區塊內，若設定100%，也只會佔col-md-3的100%長度-->
                <div class="col-md-3" style="padding-top:6%; padding-bottom:6%; padding-left:5%; font-size:25px">VIP豪華雙人客房</div>
                <!--文字夾於區塊內，建議在div標籤內以padding的%來設定位置，若不設定則區塊高度會等於字體高度-->
                <div class="col-md-2" style="padding-top:6%; padding-bottom:5%; padding-left:5%; color: red; font-size:25px">7000元</div>
                <div class="col-md-2" style="padding-top:5.5%; padding-bottom:5.5%; padding-left:5%; font-size:25px">數量
                    
                        <select name=RoomVIP2 id=RoomVIP2>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    
                    <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:5%;">
                        <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit name=order >立即訂房</button>
                    </div>
                
                
                <div class="col-md-12" style="padding-top:5%; "></div>
                <!--padding-top:2%於div標籤內，則代表此div區塊由中心點至頂端共佔全視窗的2%-->
                <div class="col-md-3"><img width="100%" src="img/RoomPresident.jpg" alt=""></div>
                <!--圖片夾於區塊內，若設定100%，也只會佔col-md-3的100%長度-->
                <div class="col-md-3" style="padding-top:6%; padding-bottom:6%; padding-left:5%; font-size:25px">總統級四人客房</div>
                <!--文字夾於區塊內，建議在div標籤內以padding的%來設定位置，若不設定則區塊高度會等於字體高度-->
                <div class="col-md-2" style="padding-top:6%; padding-bottom:5%; padding-left:5%; color: red; font-size:25px">12000元</div>
                <div class="col-md-2" style="padding-top:5.5%; padding-bottom:5.5%; padding-left:5%; font-size:25px">數量
                    
                        <select name=RoomPresident id=RoomPresident>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    
                    <div class="col-md-1" style="padding-top:5%; padding-bottom:5%; padding-left:5%;">
                        <button class="btn athBtn-main w-mdx-100 js-cart" style=" font-size:20px" type=submit name=order >立即訂房</button>
                    </div>
                </form>
                  <div class="col-md-12" style="padding-top:4%; "></div>
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