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
    }
    
}

?>