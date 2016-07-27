<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>租車-注意事項</title>

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
								<li role="presentation"><a href="<?= $root ?>/Home/rentalCar" class="active">租車</a></li>								
								<li role="presentation"><a href="<?= $root ?>/Home/contact">服務據點</a></li>
								<li role="presentation"><a href="<?= $root ?>/Home/blog">會員專區</a></li>
								<?php if ($data['sUserName'] == "Guest"): ?>
								<li role="presentation"><a href="<?= $root ?>/Home/member">會員登入</a></li>
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
				<li>rentalCar</li>
			</div>		
		</div>	
	</div>
	</div>
	
	
	<section id="rentalCar">
		<center>
		<div class="container">
            <div class="">
                <div class="rentalCar-items"> -----

                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar">租車流程</a></li>
                <li><a class="btn btn-default active" href="<?= $root ?>/Home/rentalCar_notice">注意事項</a></li>
                <li><a class="btn btn-default " href="<?= $root ?>/Home/showAllCar">車款介紹</a></li>
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar_iwantCar">我要租車</a></li>
                </ul>
                </div>

                 <div class="col-md-10">
                 
                 <table>
                 	<p><h2>租車注意事項</h2></p>
					   <tr>
						  <td align="center" valign="top" style="padding:5px 5px 5px 40px;"><div style="line-height: 160%;">
					        <p style="color:red;">
					           <strong>本公司所提供之(甲租乙)還服務，須視各門市車輛調度狀況且限於門市還車 ( 不提供特定地點收車 ) ，若遇連續假期、特定地區節慶活動常因預約較滿而未能提供甲租乙還服務，請先來電洽詢 ( 各門市保留甲租乙還之接單決定權 ) 。</strong>
					        </p>
					        <p style="color:red;"><strong style="line-height: 160%; color:blue;"><strong>若門市確認可提供甲租乙還服務，則手續費收取方式如下：</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;"><strong>【暑假期間(7/1 ~ 8/31)】依下表收費。</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;"><strong>【非暑假期間】</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;"><strong>1. 如於3天前(不含取車當日)預約甲租乙還，則免收甲租乙還手續費；</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;">2. 如3天內預約甲租乙還，則依下表收費，但最高僅收取1,000元；</strong><br>
					        <strong style="color:blue; line-height: 160%;">3. 取車後提出甲租乙還，依下表收費。</strong></p>

					        <p style="color:red;"><strong style="line-height: 160%; color: rgb(0, 0, 255);">註：上述規範適用對象均須持有中華民國身分證。下圖其他分站正在設置中。</strong></p>
					        </div>
					      </td>
					   </tr>
					   <tr>
					    	<td align="center" valign="top"><img src="<?= $imgRoot ?>images/rentalCar/carMoney.jpg" border="0"></td>
					   </tr>

                 </table>
                </div>
            </div>   
            </div>
        </div>
        </center>
        
    </section><!--/#rentalCar-item-->
	

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