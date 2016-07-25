<?php

if (isset($_COOKIE["userName"])){
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }

switch($_POST['address']){
        		case '1' :
        			$activeAll = active; 
        			break;
        		case '2' :
        			$activeAll = active; 
        			break;
        		case '3' :
        			$activeAll = active; 
        			break;
        		case '4' :
        			$activeAll = active; 
        			break;
        		case '5' :
        			$activeAll = active; 
        			break;
        		case '6' :
        			$activeAll = active; 
        			break;
        		case '7' :
        			$activeAll = active; 
        			break;
        		case '8' :
        			$activeAll = active; 
        			break;
        		default :
        			$activeAll = active; 
        	}

?>

<?php function maps($x,$y,$addName,$adderss){ ?> <!-- googleMap使用 -->
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<div style='color:black;overflow:hidden;height:440px;width:700px;'>
    <div id='gmap_canvas' style='height:400px;width:550px;'></div>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
<script type='text/javascript'>

var x ="<?php echo $x?>" ; //賦值x = $x
var y ="<?php echo $y?>" ; //賦值y = $y
var addName ="<?php echo $addName?>" ; //賦值
var adderss ="<?php echo $adderss?>" ; //賦值
function init_map(x,y,addName,adderss)
{   
    var myOptions = {zoom:16,center:new google.maps.LatLng(x,y),mapTypeId: google.maps.MapTypeId.ROADMAP};
	map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
	marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(x,y)});
	infowindow = new google.maps.InfoWindow({content:'<strong>'+addName+'</strong><br>'+adderss+'<br>'});
	google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
	}

google.maps.event.addDomListener(window, 'load', init_map(x,y,addName,adderss));
</script>
<?php } ?>   <!-- googleMap結束 --> 





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>服務據點</title>

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
								<li role="presentation"><a href="<?= $root ?>/Home/contact" class="active">服務據點</a></li>
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
				<li>服務據點</li>			
			</div>		
		</div>	
	</div>

	<section id="contact">	
    <br>
    	<div class="row">
            <div class="col-md-2" >
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="1">
                             <input class="btn btn-default <?php if($_POST['address']=='1')echo $activeAll ?>" type="submit" name="SB" value="台北三重站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="2">
                             <input class="btn btn-default <?php if($_POST['address']=='2')echo $activeAll ?>" type="submit" name="SB" value="台北車站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="3">
                             <input class="btn btn-default <?php if($_POST['address']=='3')echo $activeAll ?>" type="submit" name="SB" value="台中車站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="4">
                             <input class="btn btn-default <?php if($_POST['address']=='4')echo $activeAll ?>" type="submit" name="SB" value="台中河南站"></form>
            </div>
            <div class="col-md-2" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-2" >
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="5">
                             <input class="btn btn-default <?php if($_POST['address']=='5')echo $activeAll ?>" type="submit" name="SB" value="台中朝馬站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="6">
                             <input class="btn btn-default <?php if($_POST['address']=='6')echo $activeAll ?>" type="submit" name="SB" value="台南安平站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="7">
                             <input class="btn btn-default <?php if($_POST['address']=='7')echo $activeAll ?>" type="submit" name="SB" value="台南車站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="<?= $root ?>/Home/contact" method="post"><input type="hidden" name="address" value="8">
                             <input class="btn btn-default <?php if($_POST['address']=='8')echo $activeAll ?>" type="submit" name="SB" value="高雄三多站"></form>
            </div>
            <div class="col-md-2" >
            </div>
        </div>
        
        <?php 
        	switch($_POST['address']){
        		case '1' :
        			googleMaps(25.0786476,121.49284940000007,台北三重站,新北市三重區仁愛街323號);
        			break;
        		case '2' :
        			googleMaps(25.0450613,121.52628529999993,台北車站,臺北市中正區忠孝西路1段49號);
        			break;
        		case '3' :
        			googleMaps(24.1450049,120.676559,台中車站,台中市中區台灣大道一段1號);
        			break;
        		case '4' :
        			googleMaps(24.1631079,120.63786619999996,台中河南站,台中市西屯區市政北二路238號);
        			break;
        		case '5' :
        			googleMaps(24.1674477,120.63781829999994,台中朝馬站,台中市西屯區朝富路22號);
        			break;
        		case '6' :
        			googleMaps(23.00155,120.16090600000007,台南安平站,台南市安平區國勝路82號);
        			break;
        		case '7' :
        			googleMaps(22.9971367,120.21294979999993,台南車站,臺南市東區北門路二段4號);
        			break;
        		case '8' :
        			googleMaps(22.6352056,120.28738610000005,高雄三多站,高雄市三民區建國320號);
        			break;
        		default :
        			googleMaps(24.1631079,120.63786619999996,台中河南站,台中市西屯區市政北二路238號);
        	}
        ?>
        
        <?php function googleMaps($mapX=24.1631079,$mapY=120.63786619999996,$addressName=台中河南站,$Name=台中市西屯區市政北二路238號){ ?>
				<div class="container" align="center">
				    <div class="overlay">
		                <div class="recent-work-inner">
		            <h3><a href="#"><?php if($_POST['address']) echo $addressName ;  else echo "台中河南旗艦店"?></a></h3>
		            <?php echo maps($mapX,$mapY,$addressName,$Name); ?> 
		                </div> 
		            </div>
		
		        </div>
		<?php } ?>
		
    </section><!--/#contact-item-->
    
<!--25.0786476,121.49284940000007  三重站-->
<!--25.0450613,121.52628529999993 台北車站-->
<!--24.1450049,120.676559  台中車站-->
<!--24.1631079,120.63786619999996 河南站中又集團	-->
<!--24.1674477,120.63781829999994  台中朝馬站-->
<!--23.00155,120.16090600000007  台南安平站-->
<!--22.9971367,120.21294979999993  台南車站-->
<!--22.6352056,120.28738610000005  高雄三多站-->

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
</html>