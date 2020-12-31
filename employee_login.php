<?php
require_once("connMysql.php");
session_start();
//檢查是否經過登入，若有登入則重新導向
if(isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"]!="")){
	//若帳號等級為 member 則導向會員中心
	if($_SESSION["memberLevel"]=="member"){
		header("Location: employee_center.php");
	//否則則導向管理中心
	}else{
			header("Location: employee_admin.php");
	}
}
date_default_timezone_set("Asia/Taipei");
//執行會員登入
if(isset($_POST["username"]) && isset($_POST["passwd"])){
	//繫結登入會員資料
	$query_RecLogin = "SELECT em_username, em_passwd, em_level FROM employee_member WHERE em_username=?";
	$stmt=$db_link->prepare($query_RecLogin);
	$stmt->bind_param("s", $_POST["username"]);
	$stmt->execute();
	//取出帳號密碼的值綁定結果
		$stmt->bind_result($username, $passwd, $level);
	$stmt->fetch();
	$stmt->close();
	//比對密碼，若登入成功則呈現登入狀態
	if(password_verify($_POST["passwd"],$passwd)){
		//計算登入次數及更新登入時間
		$query_RecLoginUpdate = "UPDATE employee_member SET em_login=em_login+1, em_logintime=NOW() WHERE em_username=?";
		$stmt=$db_link->prepare($query_RecLoginUpdate);
	$stmt->bind_param("s", $username);
		$stmt->execute();
	$stmt->close();
		//設定登入者的名稱及等級
		$_SESSION["loginMember"]=$username;
		$_SESSION["memberLevel"]=$level;
		//使用Cookie記錄登入資料
		if(isset($_POST["rememberme"])&&($_POST["rememberme"]=="true")){
			setcookie("remUser", $_POST["username"], time()+365*24*60);
			//setcookie("remPass", $_POST["passwd"], time()+365*24*60);
		}else{
			if(isset($_COOKIE["remUser"])){
				setcookie("remUser", $_POST["username"], time()-100);
				//setcookie("remPass", $_POST["passwd"], time()-100);
			}
		}
		//若帳號等級為 member 則導向會員中心
		if($_SESSION["memberLevel"]=="member"){
			header("Location: employee_center.php");
		//否則則導向管理中心
		}else{
				header("Location: employee_admin.php");
		}
	}else{
		header("Location: employee_login.php?errMsg=1");
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
								<td ><p class="title" style="color: black;">天山溫泉度假飯店員工登入系統</p>
								<p>感謝各位加入天山溫泉度假飯店，我們視所有員工皆為一家人，請務必互相協助，彼此友善溝通，一同成長，共同回饋社會大眾。</p>
								<p class="heading">請各位員工遵守以下規則： </p>
								<ol>
									<li>每個員工已有建檔，<strong style="color: red;">請於上下班時在飯店電腦登入進行打卡(會有IP紀錄)，並請打卡後登出系統；若忘記密碼，請跟管理員申請新的密碼。</strong>
										<li><strong><i style="color: green;">每個員工須於下班前新增當日工作狀況。</i></strong></li>
										<li>管理員可以新增、修改、刪除員工的資料。</li>
										<li> 互相尊重，嚴禁互相惡意攻擊、漫罵。</li>
									</ol>
								</td>
								<td width="50"></td>
								<td width="200">
									<div class="boxtl"></div><div class="boxtr"></div>
									<div class="regbox"><?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
										<div class="errDiv"> 登入帳號或密碼錯誤！</div>
										<?php }?>
										<p class="heading" align="center">員工登入系統</p>
										<form name="form1" method="post" action="">
											<p>帳號：
												<br>
												<input name="username" type="text" class="logintextbox" id="username" value="<?php if(isset($_COOKIE["remUser"]) && ($_COOKIE["remUser"]!="")) echo $_COOKIE["remUser"];?>">
											</p>
											<p>密碼：<br>
												<input name="passwd" type="password" class="logintextbox" id="passwd" value="<?php if(isset($_COOKIE["remPass"]) && ($_COOKIE["remPass"]!="")) echo $_COOKIE["remPass"];?>">
											</p>
											<br>
											<p>
												<input name="rememberme" type="checkbox" id="rememberme" value="true">
											記住我的帳號</p>
											<p align="center"><br>
												<input type="submit" name="button" id="button" value="登入系統">
											</p>
										</form>
									</div>
								</td>
							</tr>
						</table>
					</table>
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
			<?php
				$db_link->close();
			?>