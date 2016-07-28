<?php
include_once 'dbconfig.php';

class CRUD
{
 public function __construct()
 {
  $db = new DB_con();
 }

 public function create_register($MemberID,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date) // 註冊頁newMember 新增會員資料進資料庫
 {
  mysql_query( "INSERT INTO sql_RentalCar (memberID,memberPW,memberTEL,memberEM,memberBD,newMemberDate)
									values ('$MemberID','$MemberPW','$MemberTEL','$MemberEM','$MemberBD','$Date')");
 }
 
 
  public function create_register_pdo($MemberID,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date) // 註冊頁newMember 新增會員資料進資料庫
 {
  $dbh = new PDO("mysql:host=localhost;dbname=RentalCar", "root", "");
  $dbh->exec("SET CHARACTER SET utf8");
  $result = $dbh->query("INSERT INTO sql_RentalCar (memberID,memberPW,memberTEL,memberEM,memberBD,newMemberDate)
									values ('$MemberID','$MemberPW','$MemberTEL','$MemberEM','$MemberBD','$Date')");
  $db = null;
			return $result;			
 }
 
 ///////////////////////////////////////////////////////////////////////////////////////////////
 
  public function read_register($MemberID) // 註冊頁newMember 查詢會員帳號
 {
   $result = mysql_query("SELECT * FROM sql_RentalCar where memberID = '$MemberID'");
   return $result;
 }
 
 ///////////////////////////////////////////////////////////////////////////////////////////////
 
  public function read_change($sUserName) // 會員專區>會員資料 blog_change.php 還有_write用的查詢會員資料
 {
   $result = mysql_query("SELECT * FROM sql_RentalCar where memberID = '$sUserName'");
   return $result;
 }
 
 //   public function read_change_pdo($sUserName) // 會員專區>會員資料 blog_change.php 還有_write用的查詢會員資料
 // {
    // $dbh = new PDO("mysql:host=localhost;dbname=class", "root", "password");
    // $dbh->exec("SET CHARACTER SET utf8");
    
 //    $sth = $dbh->prepare("SELECT * FROM sql_RentalCar where memberID = :memberID");
 //    $sth->bindParam(':memberID', $sUserName);
 //    $sth->execute();
    
 //    return $sth->fetchAll();
 // }
 
 ///////////////////////////////////////////////////////////////////////////////////////////////
 
  public function create_iwantCar($sUserName,$Date,$carGoName,$getCar,$backCar,$getDate,$backDate,$carSpecies,$carModel) //我要租車資料庫
 {
  mysql_query("INSERT INTO sql_carGo (userID,CarDate,carUesrName,getAddres,backAddres,getData,backData,species,model)
      			values ('$sUserName','$Date','$carGoName','$getCar','$backCar','$getDate','$backDate','$carSpecies','$carModel')");
 }
 
 ///////////////////////////////////////////////////////////////////////////////////////////////
 
 public function update_blogWrite($MemberPW,$MemberPW2,$MemberTEL,$MemberEM,$sUserName) //bolg_change_write.php 修改update資料用
 {
   mysql_query("update sql_RentalCar set memberPW='$MemberPW', memberTEL='$MemberTEL', memberEM='$MemberEM' where memberID='$sUserName'");
 }
 
 ///////////////////////////////////////////////////////////////////////////////////////////////
 
 
 public function read_CarRecord($sUserName)  //bolg_record.php 查詢紀錄用
 {
   $result = mysql_query("SELECT * FROM sql_carGo where userID = '$sUserName'");
   return $result;
 }
 
 
 ///////////////////////////////////////////////////////////////////////////////////////////////

 
 public function delete_record($id)  //bolg.php 刪除訂單用的
 {
  $result = mysql_query("DELETE FROM sql_carGo WHERE id=".$id);
  return $result;
 }
 
 
}
?>