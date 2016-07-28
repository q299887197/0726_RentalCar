<?php
include_once("models/crud.php");

class login {
    public $crud;
    
    function __construct(){
        $this-> crud = new CRUD(); 
    }
    
    
    ///=================================================================
    ////  會員登入    SELECT ------
    ///=================================================================
    
    function member_login($sUserName) // 登入頁面 member.php 查詢帳號
    {
// 	  $result = mysql_query("SELECT * FROM sql_RentalCar where memberID = '$sUserName'");
// 	  return $result;

	  $dbh = new PDO("mysql:host=localhost;dbname=RentalCar", "root", "");
      $dbh->exec("SET CHARACTER SET utf8");
      $sth = $dbh->prepare("SELECT * FROM sql_RentalCar where memberID = :memberID");
      $sth->bindParam(':memberID', $sUserName);
      $sth->execute();
      $dbh = null;
      return $sth->fetchAll();			
    }
    
    
    ///=================================================================
    ////  會員登出    GET OUT ------
    ///=================================================================    
    
    function member_logout(){
      if (isset($_GET["logout"])) //作為登出使用 清除cookie
      {
      	unset($_SESSION['userName']);
      	header("Location: member");
      	exit();
      }
        
    }

}
?>
