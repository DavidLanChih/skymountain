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
<body>
	<div id="wrapper">
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
							<li ><a style="font-size:25px" href="product.php">客房介紹</a></li>
							<li><a style="font-size:25px" href="department.html">飯店設施</a></li>
							<li class="active"><a style="font-size:25px" href="contact.php">聯絡我們</a></li>
							<li><a style="font-size:25px" href="product_search.php">訂單查詢</a></li>
						</ul>
					</div>
				</div>
			</div>
			</header><!-- end header -->
			<section id="inner-headline">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="pageTitle">聯絡我們</h2>
						</div>
					</div>
				</div>
			</section>
			<section id="content">
				
				<div class="container">
					<div class="row">
						<div class="row">
							<div class="col-md-6">
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
								echo '
								<br>
								<div class="alert alert-success hidden" id="contactSuccess">
										<strong>寄信成功!</strong> 感謝您的來信~
								</div>
								<div class="alert alert-error hidden" id="contactError">
										<strong>寄信失敗!</strong> 我們無法收到訊息，請在檢查輸入是否有錯誤!
								</div>
								<div class="contact-form">
										<form id="contact-form" role="form" novalidate="novalidate">
												<div class="form-group has-feedback">
														<label for="name">您的大名</label>
														<input type="text" class="form-control" id="name" name="name" placeholder="">
														<i class="fa fa-user form-control-feedback"></i>
												</div>
												<div class="form-group has-feedback">
														<label for="email">Email</label>
														<input type="email" class="form-control" id="email" name="email" placeholder="">
														<i class="fa fa-envelope form-control-feedback"></i>
												</div>
												<div class="form-group has-feedback">
														<label for="subject">信件標題</label>
														<input type="text" class="form-control" id="subject" name="subject" placeholder="">
														<i class="fa fa-navicon form-control-feedback"></i>
												</div>
												<div class="form-group has-feedback">
														<label for="message">訊息內容</label>
														<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
														<i class="fa fa-pencil form-control-feedback"></i>
												</div>
												<input type="submit" value="送出" class="btn btn-default">(需使用本機localhost)
										</form>
								</div>
								'; ?>
							</div>
							<div class="col-md-6">
								
								<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
								<div style="overflow:hidden;height:600px;width:100%;">
									<div id="gmap_canvas" style="height:600px;width:100%;">	</div>
									<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
									<a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a>
								</div>
								<script type="text/javascript">
									function init_map(){
										var myOptions = {zoom:12,center:new google.maps.LatLng(25.155797, 121.548182),mapTypeId: google.maps.MapTypeId.ROADMAP};
										map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
										marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(25.155797, 121.548182)});
										infowindow = new google.maps.InfoWindow({content:"<b>天山</b><br>溫泉度假飯店<br> 台北市" });
										google.maps.event.addListener(marker, "click", function(){
											infowindow.open(map,marker);
										});
										infowindow.open(map,marker);
									}
									google.maps.event.addDomListener(window, 'load', init_map);
								</script>
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
			<!-- javascript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
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
	</html>