<?php
class session {
    
    ///=================================================================
    ////  判斷目前登入還登出  
    ///=================================================================
    function session_in_out(){
        if (isset($_SESSION["userName"])){
        	$sUserName = $_SESSION["userName"];
        	}
        else{ 
        	  $sUserName = "Guest";
            }

        return $sUserName;
    } //===========================結束=================================
    
    
    
    ///=================================================================
    ////  判斷是否有登入的session 來判斷要導向哪頁 
    ///=================================================================
    function cookieGoBlog($comeFrom){
        // 設定進入後 給cookie
        if(!isset($_SESSION["userName"])){
        if($comeFrom == "blog"){
            setcookie("lastPage",$comeFrom,time() + 300, "/");
            setcookie("goiWantCar", "rentalCar_iwantCar", time() - 3600, "/");//清除返回rentalCar_iwantCar.php的cookie
        }
        elseif($comeFrom == "rentalCar_iwantCar"){
            setcookie("goiWantCar",$comeFrom,time() + 300, "/");
            setcookie("lastPage", "blog", time() - 3600,"/"); //清除返回bolg.php的cookie
        }
          setcookie("pleaseLogin"); //給 pleaseLogin的cookie要給member顯示請先登入
          header("location: member"); //轉址, 會員專區沒有登入cookie會被請到 member登入頁面
          exit();
        }
    } //===========================結束=================================
    
}

?>