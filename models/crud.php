<?php
require_once 'PDOdb.php';

class CRUD
{

 ///=================================================================
 ////  註冊頁newMember 新增會員資料進資料庫 INSERT
 ///================================================================= 
 public function create_register_pdo($MemberID,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date) // 註冊頁newMember 新增會員資料進資料庫
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("INSERT INTO `sql_RentalCar` (`memberID`,`memberPW`,`memberTEL`,`memberEM`,`memberBD`,`newMemberDate`)
 									values (?, ?, ?, ?, ?, ?)");
   $sth->bindParam(1, $MemberID);
   $sth->bindParam(2, $MemberPW);
   $sth->bindParam(3, $MemberTEL);
   $sth->bindParam(4, $MemberEM);
   $sth->bindParam(5, $MemberBD);
   $sth->bindParam(6, $Date);
   $dbh = null;
   return $sth->execute();			
 }

 
  ///=================================================================
  ////  註冊頁 and 會員專區>會員資料 用的查詢會員資料 查詢會員帳號 SELECT
  ///=================================================================
 
  public function read_change_pdo($sUserName) // 註冊頁and會員專區>會員資料 用的查詢會員資料 查詢會員帳號
 {
    $db_con = new DB_con();
    $dbh = $db_con->db;
    
    $sth = $dbh->prepare("SELECT * FROM sql_RentalCar where memberID = :memberID");
    $sth->bindParam(':memberID', $sUserName);
    $sth->execute();
    $dbh = null;
    return $sth->fetchAll();
 }
 
 
  ///=================================================================
  ////  我要租車頁 新增資料庫  INSERT
  ///=================================================================
 
 public function create_iwantCar_pdo($sUserName,$Date,$carGoName,$getCar,$backCar,$getDate,$backDate,$carSpecies,$carModel) //我要租車資料庫
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("INSERT INTO sql_carGo (userID,CarDate,carUesrName,getAddres,backAddres,getData,backData,species,model)
       			values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $sth->bindParam(1, $sUserName);
   $sth->bindParam(2, $Date);
   $sth->bindParam(3, $carGoName);
   $sth->bindParam(4, $getCar);
   $sth->bindParam(5, $backCar);
   $sth->bindParam(6, $getDate);
   $sth->bindParam(7, $backDate);
   $sth->bindParam(8, $carSpecies);
   $sth->bindParam(9, $carModel);
   $dbh = null;
   return $sth->execute();
 }
 
 
  ///=================================================================
  ////  會員專區>會員資料>修改資料  資料更新 UPDATE
  ///=================================================================
  
 public function update_blogWrite_pdo($MemberPW,$MemberTEL,$MemberEM,$sUserName) //bolg_change_write.php 修改update資料用
 {

   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("UPDATE sql_RentalCar SET memberPW= :memberPW , memberTEL= :memberTEL, memberEM= :memberEM where memberID= :memberID");
   $sth->bindParam(':memberPW', $MemberPW);
   $sth->bindParam(':memberTEL', $MemberTEL);
   $sth->bindParam(':memberEM', $MemberEM);
   $sth->bindParam(':memberID', $sUserName);
 
   $dbh = null;
   return $sth->execute();		
 }
 

  ///=================================================================
  ////  會員專區>租車紀錄    查詢紀錄 SELECT
  ///=================================================================
  
 public function read_CarRecord_pdo($sUserName)  //bolg_record.php 查詢紀錄用
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("SELECT * FROM sql_carGo where userID = :sUserName");
   $sth->bindParam(':sUserName', $sUserName);
   $sth->execute();
   $dbh = null;
   return $sth->fetchAll();
 }
 
  ///=================================================================
  ////  會員專區>目前訂單    刪除訂單 DELETE
  ///=================================================================


 public function delete_record_pdo($id)  //bolg.php 刪除訂單用的
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("DELETE FROM sql_carGo WHERE id= :carId ");
   $sth->bindParam(':carId', $id);

   $dbh = null;
   return $sth->execute();	
 }
 
 
 
}
?>