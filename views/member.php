<?php
if (isset($_GET["logout"])) //作為登出使用 清除cookie
{
	setcookie("userName", "Guest", time() - 3600, "/");
	header("Location: member");
	exit();
}

if(isset($_COOKIE["pleaseLogin"])){ //從 rentalCar_iwantCar.php被導往來此頁並傳來pleaseLogin的COOKIE
  echo "<script language='javascript'>alert('請先登入,才能進入唷');</script>";
  setcookie("pleaseLogin", "", time() - 3600); //上面顯示跳窗後清除 COOKIE
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member</title>

    <!-- Bootstrap -->
		<link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?= $cssRoot ?>/font-awesome.min.css">
		<link rel="stylesheet" href="<?= $cssRoot ?>/animate.css">
		<link href="<?= $cssRoot ?>/prettyPhoto.css" rel="stylesheet">
		<link href="<?= $cssRoot ?>/style.css" rel="stylesheet" />	

  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="<?= $root ?>/Home/index"><h1><span>德順</span>租車</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="<?= $root ?>/Home/index">首頁</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/about">關於我們</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/rentalCar">租車</a></li>								
								<li role="presentation"><a href="<?= $root ?>/Home/contact">服務據點</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/blog">會員專區</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/member" class="active">會員登入</a></li>							
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="<?= $root ?>/Home/index">Home</a></li>
				<li>會員登入</li>			
			</div>		
		</div>	
	</div>
	
	<div class="member">
		<div class="container">
			<center><h3>會員登入</h3></center>
			<hr>
        <div>
          <form id="form1" name="form1" method="post" action="<?= $root ?>/Home/login">
            <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
              <tr>
                <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">請輸入您的帳號密碼</font></td>
              </tr>
              <tr>
                <td width="80" align="center" valign="baseline"><font color="#000000">帳號</font></td>
                <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" value="<?= $data[1] ?>" style= "color:#000000" /></td>
              </tr>
              <tr>
                <td width="80" align="center" valign="baseline"><font color="#000000">密碼</font></td>
                <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" style= "color:#000000" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#77FF00">

                <input type="submit" name="btnOK" id="btnOK" value="登入"   style=background-color:pink;color:#000000 />

                <input type="submit" name="btnMember" id="btnMember" value=註冊 style=background-color:pink;color:#000000 />
     
                </td>
              </tr>
            </table>
          </form>
        </div>
			</div>
		</div>	
	
	<br>
	<br>
	
	<div class="sub-member">
		<div class="container">
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">加入會員</h4>
								<p>加入會員才可享有租車，且車種非常多，任君挑選。<br>每台車子都有定期保養檢查，因此不必擔心車況問題，絕對安全。<br>來德順租車絕對是您的最佳選擇。</p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-rocket"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">會員專區</h4>
								<p>加入會員後，才會有"會員專區"，專區提供給租車的您各種旅遊資訊，讓您輕輕鬆鬆遊玩台灣。<br><br>專區也會有不定時的優惠，讓會員有更便宜的價格來租車，讓您可以省錢又可以出遊玩。</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
						
			<div class="col-md-6">
				<img src="<?= $imgRoot ?>images/4.jpg" class="img-responsive">
				<p>L</p>
			</div>
		</div>
	</div>
	
	
	<footer>
		<div class="footer">
			<div class="container">
				<div class="social-icon">
					<div class="col-md-4">
						<ul class="social-network">
							<li><a href="https://www.facebook.com/profile.php?id=100002346849644"  target="_blank" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/q031117/"  target="_blank" class="linkedin tool-tip" title="instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/watch?v=JvkqZrYJUe8" target="_blank" class="ytube tool-tip"  title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
						</ul>	
					</div>
				</div>
				
				<div class="col-md-4 col-md-offset-4">
					<div>
						&copy;  德順租車
						<br>
						&copy;  地址 : 台中市西屯區市政北二路238號
						<br>
						&copy;  服務專線 : 0983-275-426
						<br>
						&copy;  負責人 : Bob_Chen
					</div>
				</div>						
			</div>
			<div class="pull-right">
				<a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
			</div>
		</div>
	</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?= $jsRoot ?>/jquery-2.1.1.min.js"></script>	
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?= $jsRoot ?>/bootstrap.min.js"></script>
		<script src="<?= $jsRoot ?>/jquery.prettyPhoto.js"></script>
		<script src="<?= $jsRoot ?>/jquery.isotope.min.js"></script>  
		<script src="<?= $jsRoot ?>/wow.min.js"></script>
		<script src="<?= $jsRoot ?>/functions.js"></script>
  </body>
</html>