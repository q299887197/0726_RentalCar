<?php

if (isset($_COOKIE["userName"])){            //登出裝置
	$sUserName = $_COOKIE["userName"];
}
else{ 
	  $sUserName = "Guest";
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company-HTML Bootstrap theme</title>

    <!-- Bootstrap -->
    <link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= $cssRoot ?>/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $cssRoot ?>/animate.css">
	<link href="<?= $cssRoot ?>/prettyPhoto.css" rel="stylesheet">
	<link href="<?= $cssRoot ?>/style.css" rel="stylesheet" />	
	 <style>
        html { height: 101%; }
    </style>
	
   <?PHP 
        if(isset($data['msg'])){ 
            echo "<srcipt>alert('".$data['msg']."');</srcipt>";
        }
   ?>
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
								<?php if ($sUserName == "Guest"): ?>
								<li role="presentation"><a href="<?= $root ?>/Home/member">會員登入</a></li>
								<?php else: ?>
								<li role="presentation"><a href="<?= $root ?>/Home/member?logout=1"><?php echo $sUserName ?>_登出</a></li>
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
				<li>租車</li>
				<li>車款介紹</li>
			</div>		
		</div>	
	</div>
	</div>

	<section id="rentalCar">
        
		<div class="container">
            <div class="">
                <div class="rentalCar-items"><br>
                    
                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar">租車流程</a></li>
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar_notice">注意事項</a></li>
                <li><a class="btn btn-default active" href="<?= $root ?>/Home/showAllCar">車款介紹</a></li>
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar_iwantCar">我要租車</a></li>
                </ul>
                </div>

                <div class="col-md-10">
                    
                <div class="container">
                    <div class="center">
                        <div class="row">

                            <div class="col-md-3" align="right">
                                <a class="btn btn-default <?php if($data['active'] == 'allCar') echo 'active'; ?>" href="<?= $root ?>/Home/showAllCar">全部車種</a>
                            </div>
                            <div class="col-md-3" align="center">
                                <a class="btn btn-default <?php if($data['active']== 'smallCar') echo 'active'; ?>" href="/Company_oop_MVCtest/Home/showCar/smallCar">小客車</a>
                            </div>
                            <div class="col-md-3" align="left">
                                <a class="btn btn-default <?php if($data['active']== 'RV') echo 'active'; ?>" href="/Company_oop_MVCtest/Home/showCar/RV">休旅車</a>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <br>
                    </div>
        		</div>
        		
                    <form id="Scar" name="Scar" method="get" action="/Company_oop_MVCtest/Home/rentalCar_iwantCar">

                    <!--選擇圖片使用-->
                    <?php
                            //小客車smallCar 圖片 
                            while($row = mysql_fetch_array( $data['cars'] )){
                                 VRcar($row[0],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11], $row[12]);
                            }
                    ?>
                </div>
            </div>
         <!------------------------------------------車選擇器---------------------------------------------------->
                    <?php 
                    function VRcar($id,$carModle,$money,$images1,$logo,$type,$level,$exShow,$item,$images2,$images3,$photoMunber){ 
                    $content=  "廠牌: $logo<br>
                                車型: $type<br>
                                車型等級: $level<br>
                                租金定價: $money .NTD<br>
                                特色 :<br>
                                $exShow <br>
                                汽車配備 :<br>
                                $item ";
                    ?>
                    <div class="rentalCar-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="/Company_oop_MVCtest/views/<?php echo $images1 ?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h4><?php echo $carModle; ?></h4>
                                    <p>每日租金價格：<?php echo $money; ?></p>
                                    <!--<a class="preview" href="images/rentalCar/full/item1.png" rel="prettyPhoto" title="休旅車"><i class="fa fa-eye"></i> View</a>-->
                                    <!--圖片選擇,display: none為隱藏,將img輸入隱藏起來-->
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="/Company_oop_MVCtest/views/<?php echo $images2 ?>" rel="prettyPhoto<?php echo $id ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車身"/><i class="fa fa-eye"></i>詳細資料</a>
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="/Company_oop_MVCtest/views/<?php echo $images3 ?>" rel="prettyPhoto<?php echo $id ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車內"/></a>
                                        <input type="image" name="sGOiwant" id="sGOiwant" align="right" value="<?php echo $photoMunber ?>" src="/Company_oop_MVCtest/views/images/btnRentalCarRed.gif" onClick="myFunction();">
                                        <script>
                                            function myFunction() {
                                                document.getElementById("sGOiwant").submit();
                                            }
                                        </script>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    <?php } ?>
        <!------------------------------------------車選擇器end---------------------------------------------------->

                    </form>
                    
                </div>
            </div>
        </div>
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
