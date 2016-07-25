<?php
if (isset($_COOKIE["userName"])){  //會員登出裝置
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }
	 
// 設定進入rentalCar_iwantCar.php給goiWantCar的cookie
if(!isset($_COOKIE["userName"])){
  setcookie("goiWantCar","rentalCar_iwantCar",time() + 300, "/");
  setcookie("lastPage", "blog", time() - 3600,"/"); //清除返回bolg.php的cookie
  setcookie("pleaseLogin"); //給 pleaseLogin的cookie要給member顯示
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
    <title>租車-我要租車</title>

    <link href="<?= $cssRoot ?>/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= $cssRoot ?>/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $cssRoot ?>/animate.css">
	<link href="<?= $cssRoot ?>/prettyPhoto.css" rel="stylesheet">
	<link href="<?= $cssRoot ?>/style.css" rel="stylesheet" />	

  </head>
  <body onload="fInit()"> <!-- 一進入網站執行來處理由rentalCar_showCar.php 點擊車款傳過來的值 -->
      <script language="JavaScript"> //來處理由rentalCar_showCar.php 點擊車款傳過來的值
      carGO=new Array();
            carGO[0]=["請由上方選取車種"];
            carGO[1]=["CAMRY 2.0", "NEW VIOS 1.5", "YARIS 1.5", "VIOS 1.5"];	// 小客車-豐田
            carGO[2]=["TEANA 2.0", "NEW LIVINA 1.6", "LIVINA 1.6", "TIIDA 1.6", "MARCH 1.5"];		// 小客車-日產
            carGO[3]=["COLT PLUS 1.6", "COLT PLUS 1.5"];	                    // 小客車-三菱
            carGO[4]=["5人座-U7 2.2","7人座-M7 2.2","5人座-U6 1.8"];				// 休旅車-納智捷
            carGO[5]=["5人座-X-Trail 2.0","8人座-SERENA(Q-RV) 2.5"];				// 休旅車-日產
            carGO[6]=["5人座-OUTLANDER 2.4"];			                        	// 休旅車-三菱

  function fInit()
  {
    var strUrl = location.search;
    var getPara, ParaVal , showV, getDs;
    var modle = [] , species = [] , carView = [];
    
    if (strUrl.indexOf("?") != -1) { //用來判斷是否讀到 '?'
      //切割網址有?的部分 https://lab-bob-chen.c9users.io/Company/rentalCar_iwantCar.php?sGOiwant.x=55&sGOiwant.y=15&sGOiwant=21
      //只抓 ?sGOiwant.x=55&sGOiwant.y=15&sGOiwant=21
      var getSearch = strUrl.split("?"); 
      
      //  ?sGOiwant.x=55&sGOiwant.y=15&sGOiwant=21 前面有空白字元 所以選擇getSearch[1]  再做一次切割
      //  sGOiwant.x=55  &   sGOiwant.y=15   &   sGOiwant=21   將有 & 的部分切割 分成三等份
      getPara = getSearch[1].split("&"); 
      
      //  我要最後面的 因此選擇getPara[2]  為 sGOiwant=2_1  再進行一次切割 
      //  sGOiwant = 21   將有 = 符號部分前後切割 分成兩等分  因此 getDs[1] = 2_1
      getDs = getPara[2].split("=");
      
      // 我要抓車子種類 還有車型  因此選擇getDs[1]  為 2_1 再進行一次切割 
      showV = getDs[1].split("_");   // 因此 showV[0]=2 和 showV[1]=1 , showV[0]=2為車種編號, showV[1]=1為車型編號
      modle.push(showV[0]);          // 因此 modle 等於 2 
      species.push(showV[1]);        // 因此 species 等於 1 

    //         alert(carView);  //跳窗顯示測值用而已
    	    var option = document.createElement("option");     //新增一個option
            option.text = carGO[modle][species-1];                //新增一個option的text內容 等於 上一頁點擊的車款carGO[]內部印出
    		document.getElementById("carModel").add(option);	// 設定選項給第二個下拉式選單內容 id="carModel"
    		document.getElementById("carSpecies").value=[modle]; //設定選項給第一個下拉式選單
    
    	document.getElementById("img").src = '<?= $imgRoot ?>images/showCar/'+[modle]+[species]+'.jpg'; //將底下id=img的src位置更換成 點擊1.jpg ex: 11.jpg 21.jpg
    }
    
  }   
</script>
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
				<li>我要租車</li>
			</div>		
		</div>	
	</div>
	</div>
	
	
	<section id="rentalCar">

		<div class="container">
            <div class="">
                <div class="rentalCar-items"> -
                
                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar">租車流程</a></li>
                <li><a class="btn btn-default " href="<?= $root ?>/Home/rentalCar_notice">注意事項</a></li>
                <li><a class="btn btn-default " href="<?= $root ?>/Home/showAllCar">車款介紹</a></li>
                <li><a class="btn btn-default active" href="<?= $root ?>/Home/rentalCar_iwantCar">我要租車</a></li>
                </ul>
                </div>
                
                <div class="col-md-10">
       
                <form id="form1" name="form1" method="post" action="<?= $root ?>/Home/GOrentalCar">
                  <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">請輸入您租車的資料</font></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">姓名</font></td>
                      <td valign="baseline"><input type="text" name="carGoName" id="carGoName" value="<?= $data['carGoName'] ?>" style= "color:#000000" /></td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">取車地點</font></td>
                        <td valign="baseline"><select name="getCar" id="getCar" style= "color:#000000 ; width:177.6px;  height:27.6px" >
                             <option>請選取車站</option>
                             <option>台北三重站</option>
                             <option>台北車站</option>
                             <option>台中火車站</option>
                             <option>台中河南站</option>
                             <option>台中朝馬站</option>
                             <option>台南安平站</option>
                             <option>台南火車站</option>
                             <option>高雄三多站</option>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">還車地點</font></td>
                        <td valign="baseline"><select name="backCar" id="backCar" style= "color:#000000 ; width:177.6px;  height:27.6px" >
                             <option>請選取車站</option>
                             <option>台北三重站</option>
                             <option>台北車站</option>
                             <option>台中火車站</option>
                             <option>台中河南站</option>
                             <option>台中朝馬站</option>
                             <option>台南安平站</option>
                             <option>台南火車站</option>
                             <option>高雄三多站</option>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">取車時間</font></td>
                        <td valign="baseline"><input type="datetime-local" name="getDate" id="getDate" value="<?= $data['getDate'] ?>" style= "color:#000000 ; width:210px ;  height:27.6px" /></td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">還車時間</font></td>
                        <td valign="baseline"><input type="datetime-local" name="backDate" id="backDate" value="<?= $data['backDate'] ?>" style= "color:#000000 ; width:210px ;  height:27.6px" /></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline"><font color="#000000">車種</font></td>
                        <td valign="baseline">
                        <script>

                        function renew(index){ //設定第一個下拉式選項
                            document.getElementById("carModel").length=carGO[index];	// 刪除多餘的選項
                        	for(var i=0;i<carGO[index].length;i++){                 //設定點擊的位子,用length判斷Array的carGO[]的長度
                        	    var option = document.createElement("option");     //新增一個option
                                option.text = carGO[index][i];                      //新增一個option的text內容 等於 目前點擊的位子carGO[]內部印出
                                option.value = carGO[index][i];                     //新增一個option的value內容 等於 目前點擊的位子carGO[]內部印出
                        		document.getElementById("carModel").add(option);	// 設定新選項給第二個下拉式選單內容 id="carModel"
                        		document.getElementById("img").src = '<?= $imgRoot ?>images/showCar/'+[index]+'1'+'.jpg'; //將底下id=img的src位置更換成 點擊1.jpg ex: 11.jpg 21.jpg

                        	    if([index]==0){
    	                            document.getElementById("img").src ='';
    	                        }
                        	}
                        }
                        function changeImg(index){ //設定第二個下拉式選單選擇內容
                            var carSpecies = document.getElementById("carSpecies").value; //新增一個option 抓取id="carSpecies" 的 value值
                        	document.getElementById("img").src = '<?= $imgRoot ?>images/showCar/'+[carSpecies]+[index+1]+'.jpg'; //將圖片跟換成  (value)+(目前點擊位子+1).jpg
                        }
                        </script>
                        
                        <select id="carSpecies" name="carSpecies" onChange="renew(this.selectedIndex);" style= "color:#000000 ; width:177.6px;  height:27.6px">
                            <option value="0_請選擇車種">請選擇車種</option>
                            <optgroup selected="true" label="小客車"> 
                        	<option value="1">豐田</option>
                        	<option value="2">日產</option>
                        	<option value="3">三菱</option>
                        	<optgroup selected="true" label="休旅車"> 
                        	<option value="4">納智捷</option>
                        	<option value="5">日產</option>
                        	<option value="6">三菱</option>

                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline"><font color="#000000">車型</font></td>
                        <td valign="baseline">
                        <select id="carModel" name="carModel" onChange="changeImg(this.selectedIndex);" style= "color:#000000 ; width:177.6px;  height:27.6px">
                        	<!--<option value="">請由上方選取車種</option>-->
                        </select>
                        </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00">
  
                      <input type="submit" name="iwantCar" id="iwantCar" value="送出"   style=background-color:pink;color:#000000 />
                      <input type="reset" name="btnReset" id="btnReset" value="清除" style=background-color:pink;color:#000000 />
                      
                      </td>
                    </tr>
                  </table>
                </form>
                    <center>
                        <div class="recent-work-wrap">
                            <img id="img" class="img-responsive" src="<?= $imgRoot ?>images/showCar/11.jpg">  <!-- 以上下拉式選單換圖的img id=""img -->
                            <p id="demo"></p>
                        </div>
                    </center>
                </div>
            </div>  
                    
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