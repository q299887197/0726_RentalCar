<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>關於我們</title>

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
								<li role="presentation"><a href="<?= $root ?>/Home/about" class="active">關於我們</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/rentalCar">租車</a></li>								
								<li role="presentation"><a href="<?= $root ?>/Home/contact">服務據點</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/blog">會員專區</a></li>
								<?php if ($data['sUserName'] == "Guest"): ?>
								<li role="presentation"><a href="member">會員登入</a></li>
								<?php else: ?>
								<li role="presentation"><a href="<?= $root ?>/Home/member?logout=1"><?= $data['sUserName'] ?>_登出</a></li>
								<?php endif; ?>					
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
				<li>關於我們</li>			
			</div>		
		</div>	
	</div>
	
	<div class="aboutus">
		<div class="container">
			<h3>服務特色</h3>
			<hr>
			<div>
				<!--<img src="images/7.jpg" class="img-responsive">-->
				<!--<h4>We Create, Design and Make it Real</h4>-->
				<p><img src="<?= $imgRoot ?>/images/B01.gif"></img>通過ISO-9001國際品保認證。</p>
				<p><img src="<?= $imgRoot ?>/images/B02.gif"></img>全國首創 <strong style="color:red">租車送保險</strong>：<br>
<pre>
   1. 車損時，除酗酒、不明車損、保險不賠及違約行為外，承租人就車體損傷部分：客車最高僅需負擔10,000元、貨車最高僅需負擔20,000元。
   2. 車輛失竊時，承租人就車輛僅需負擔自負額( 客車即為保險理賠金額之10%、貨車為保險理賠金額之20% )。
   3. 任意第三人責任險450萬元（含財損50萬元)。
   4. 乘客責任險每人100萬元（客車5~9人*100萬元，貨車2~3人*100萬元）。
   5. 強制第三人責任險。<br><center><strong style= "color:red">註：車輛修理或失竊期間，承租人需另負擔無法營業損失</strong></center></pre></p>
				<p><img src="<?= $imgRoot ?>images/B03.gif"></img><strong style="color:red">免押證件、免簽本票、免保證金。</strong></p>
				<p><img src="<?= $imgRoot ?>images/B04.gif"></img>對消費者保障超越政府定型化契約。</p>
				<p><img src="<?= $imgRoot ?>images/B05.gif"></img><strong style="color:blue">提供甲地租車、乙地還車之服務。</strong>（ 詳情請看租車注意事項 <a href="<?= $root ?>/Home/rentalCar_notice"><img src="<?= $imgRoot ?>images/moreNotice.gif"></a> ）</p>
				<p><img src="<?= $imgRoot ?>images/B06.gif"></img>24小時道路救援，提供「行遍天下」全省拖吊、救援服務。</p>
				<p><img src="<?= $imgRoot ?>images/B07.gif"></img>服務人員親切和藹可親，讓您有家人的感覺。</p>
				<p><img src="<?= $imgRoot ?>images/B08.gif"></img><strong style="color:blue">歡迎來電預約、網路預約、門市預約。</strong></p>
				<p><strong style="color:bule">以上純屬虛構</strong></p>
			</div>
		</div>
	</div>
	
	<div class="our-team">
		<div class="container">
			<h3>Our Team</h3>	
			<div class="text-center">
				<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<img src="<?= $imgRoot ?>images/rentalCar/1.jpg" alt="" >
					<h4>Bob_Chen</h4>
					<p>
						姓名 : 陳慶峰 <br>
						電話 : 0983275426 <br>
						FB : <a href="https://www.facebook.com/profile.php?id=100002346849644">https://www.facebook.com/profile.php?id=100002346849644</a> <br>
						ig : <a href="https://www.instagram.com/q031117/">https://www.instagram.com/q031117/</a>
					</p>
				</div>
				<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
					<img src="<?= $imgRoot ?>images/rentalCar/2.jpg" alt="" >
					<h4>新秀聯盟大團隊</h4>
					<p>大家加油</p>
				</div>
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