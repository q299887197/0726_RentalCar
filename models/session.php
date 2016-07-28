<?php
class session {
    
    ///=================================================================
    ////  判斷目前登入還登出    ------移到models 內部 晚點做
    ///=================================================================
    function session_in_out(){
        if (isset($_SESSION["userName"])){
        	$sUserName = $_SESSION["userName"];
        	}
        else{ 
        	  $sUserName = "Guest";
            }

        return $sUserName;
    }
    
}

?>