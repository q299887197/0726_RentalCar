<?php
require_once("models/PDOdb.php");

class login {

    ///=================================================================
    ////  會員登入    SELECT ------
    ///=================================================================
    
    function member_login($sUserName,$sUserPassword) // 登入頁面 member.php 查詢帳號
    {
	  $db_con = new DB_con();
      $dbh = $db_con->db;
      
      $sth = $dbh->prepare("SELECT * FROM `sql_RentalCar` WHERE `memberID` = :memberID");
      $sth->bindParam(':memberID', $sUserName);
      $sth->execute();
      $dbh = null;
      $result=array();
      foreach (($sth->fetchAll()) as $row);
      
      
      if($sUserName != null && $sUserPassword != null){                                 // 帳號密碼不能為空直
        	if($row[1] == $sUserName && $row[2] == $sUserPassword){                     // 比對帳號密碼是否相同
        	    $_SESSION["userName"]=$sUserName;                                       // 正確給予相對應的session
        	    
        	    if (isset($_COOKIE["lastPage"])){
        			setcookie("lastPage", "blog", time() - 3600,"/");                   //清除返回bolg.php的cookie
        			$result["login"]="OK";
        			$result["go"] = "blog";
        			return $result;
        		}
        		elseif(isset($_COOKIE["goiWantCar"])){
        			setcookie("goiWantCar", "rentalCar_iwantCar", time() - 3600,"/");   //清除返回rentalCar_iwantCar.php的cookie
        			$result["login"]="OK";
        			$result["go"] = "rentalCar_iwantCar";
        			return $result;
        		}
        		else
        		    $result["login"]="OK";
        		    $result["go"] = "index";
        			return $result;                                                     //都沒有則導回首頁
        	}
        	else
        	   $result["alert"] = "<script language='javascript'> alert('帳號密碼錯誤'); </script>";
               $result["go"] = "member";
               return $result;
	 }
	 else
	   $result["alert"] = "<script language='javascript'> alert('請輸入正確帳號密碼'); </script>";
       $result["go"] = "member";
       return $result;
    }
    
    
    ///=================================================================
    ////  會員登出    GET OUT ------
    ///=================================================================    
    
    function member_logout(){
      if (isset($_GET["logout"]))       //作為登出使用 清除cookie
      {
      	 unset($_SESSION['userName']);
      	 header("Location: member");
      	 exit();
      }
      
      if(isset($_COOKIE["pleaseLogin"])){       //被導往來此頁並傳來pleaseLogin的COOKIE
         $data="<script language='javascript'>alert('請先登入,才能進入唷');</script>";
         setcookie("pleaseLogin", "", time() - 3600);
         return $data;
      }
    
    }

}
?>
