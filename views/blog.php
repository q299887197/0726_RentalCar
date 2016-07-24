<?php
if (isset($_COOKIE["userName"])){
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }
	 
// 設定進入blog.php給lastPage的cookie
if(!isset($_COOKIE["userName"])){
  setcookie("lastPage","blog",time() + 300, "/");
  setcookie("goiWantCar", "rentalCar_iwantCar", time() - 3600, "/");//清除返回rentalCar_iwantCar.php的cookie
  setcookie("pleaseLogin"); //給 pleaseLogin的cookie要給member顯示請先登入
  header("location: member"); //轉址, 會員專區沒有登入cookie會被請到 member登入頁面
  exit();
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />		
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
							<a href="index"><h1><span>德順</span>租車</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index">首頁</a></li>
								<li role="presentation"><a href="about">關於我們</a></li>
								<li role="presentation"><a href="rentalCar">租車</a></li>								
								<li role="presentation"><a href="contact">服務據點</a></li>
								<li role="presentation"><a href="blog" class="active">會員專區</a></li>
								
								<?php if ($sUserName == "Guest"): ?>
								<li role="presentation"><a href="member">會員登入</a></li>
								<?php else:  ?>
								
								<li role="presentation"><a href="member?logout=1"><?php echo $sUserName ?>_登出</a></li>
								
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
				<li><a href="index">Home</a></li>
				<li>Blog</li>			
			</div>		
		</div>	
	</div>
	
	<section id="blog" class="container">
		<center>
            <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default active" href="blog">目前訂單</a></li>
                <li><a class="btn btn-default " href="blog_change">會員資料</a></li>
                <li><a class="btn btn-default " href="blog_record">租車紀錄</a></li>
                </ul>
                </div>

            	<div class="col-md-10">
            		<form id="form1" name="form1" method="get" action="blog">
                  <table width="" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
                    <tr>
                      <td colspan="9" align="center" bgcolor="#77FF00"><font color="#000000">目前租車訂單</font></td>
                    </tr>
                    
                    <tr>
                      <td width="135" align="center" bgcolor="#77FF00"><font color="#000000">訂車時間</font></td>
                      <td width="50" align="center" bgcolor="#77FF00"><font color="#000000">姓名</font></td>
                      <td width="75" align="center" bgcolor="#77FF00"><font color="#000000">取車站</font></td>
                      <td width="75" align="center" bgcolor="#77FF00"><font color="#000000">還車站</font></td>
                      <td width="135" align="center" bgcolor="#77FF00"><font color="#000000">取車時間</font></td>
                      <td width="135" align="center" bgcolor="#77FF00"><font color="#000000">還車時間</font></td>
                      <td align="center" bgcolor="#77FF00"><font color="#000000">車種</font></td>
                      <td align="center" bgcolor="#77FF00"><font color="#000000">車型</font></td>
                      <td align="center" bgcolor="#77FF00"><font color="#000000">取消租車</font></td>
                    </tr>
                    <?php while($row = @mysql_fetch_row($data['display'])){ 
                    		if($row[6]>$data['getDate']){
                    ?>
                    <tr>
                      <td width="135" valign="baseline"><input type="text" value="<?php echo $row[2] ?>" style= "color:#000000;width:135px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td width="50" valign="baseline"><input type="text"  value="<?php echo $row[3] ?>" style= "color:#000000;width:50px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td width="75" valign="baseline"><input type="text"  value="<?php echo $row[4] ?>" style= "color:#000000;width:75px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td width="75" valign="baseline"><input type="text"  value="<?php echo $row[5] ?>" style= "color:#000000;width:75px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td width="135" valign="baseline"><input type="text" value="<?php echo $row[6] ?>" style= "color:#000000;width:135px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td width="135" valign="baseline"><input type="text" value="<?php echo $row[7] ?>" style= "color:#000000;width:135px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td valign="baseline"><input type="text"  value="<?php echo $row[8] ?>" style= "color:#000000;width:100px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      <td valign="baseline"><input type="text"  value="<?php echo $row[9] ?>" style= "color:#000000;width:100px" readonly  /></td> <!-- readonly為能讀不能編輯 -->
                      
                      <td><center><a href="blog?id=<?php echo $row[0];?>"><input type="button" name="delete" id="delete" value="取消" style=background-color:pink;color:#000000 /></a></center></td>
                    </tr>
					<?php }};	?>
                  </table>
                </form>
            	</div>
            	<br>
            </div>

        </center>
    </section><!--/#blog-->
	
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
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/jquery.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
	
  </body>
</html>