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
 									VALUES (?, ?, ?, ?, ?, ?)");
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
    
    $sth = $dbh->prepare("SELECT * FROM `sql_RentalCar` WHERE `memberID` = :memberID");
    $sth->bindParam(':memberID', $sUserName);
    $sth->execute();
    $dbh = null;
    return $sth->fetchAll();
 }
 
 public function read_change_pdo123($sUserName,$MemberPW,$MemberPW2,$MemberTEL,$MemberEM,$MemberBD,$Date) // 註冊頁用的 
 {
    $db_con = new DB_con();
    $dbh = $db_con->db;
    
    $sth = $dbh->prepare("SELECT * FROM `sql_RentalCar` WHERE `memberID` = :memberID");
    $sth->bindParam(':memberID', $sUserName);
    $sth->execute();
    $dbh = null;
    $result=array();
    foreach (($sth->fetchAll()) as $row);
    
    
    if($sUserName != null && $MemberPW != null && $MemberPW2 != null && $MemberTEL != null && $MemberEM != null && $MemberBD != null ){ //不能為空值
            	if ( $row[1] == $id)  //比對帳號是否有相同重複
            	{
                	if($MemberPW == $MemberPW2){ //驗證密碼是否兩次都相同
                	  $this -> create_register_pdo($sUserName,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date);
                	  // echo "<script language='javascript'> alert('註冊成功,請重新登入');location.href='../Home/index'; </script>"; //轉址, 註冊完成導回首頁
                	  $result["login"]="OK";
                	  $result["alert"] = "<script language='javascript'> alert('註冊成功,請重新登入'); </script>";
        			        $result["go"] = "index";
                	  return $result;
                	}
                	else{
                		 $result["alert"] = "<script language='javascript'> alert('密碼輸入不一致'); </script>";
                   $result["go"] = "newMember";
                   return $result;
                	}
            	}
            	else{
            		$result["alert"] = "<script language='javascript'> alert('此帳號使用過了'); </script>";
              $result["go"] = "newMember";
              return $result;
            	}
        	}
        	else{
        		$result["alert"] = "<script language='javascript'> alert('請輸入完整資料'); </script>";
          $result["go"] = "newMember";
          return $result;
        	}
 }
 
 
  ///=================================================================
  ////  我要租車頁 新增資料庫  INSERT
  ///=================================================================
 
 public function create_iwantCar_pdo($sUserName,$Date,$carGoName,$getCar,$backCar,$getDate,$backDate,$carSpecies,$carModel) //我要租車資料庫
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("INSERT INTO `sql_carGo` (`userID`,`CarDate`,`carUesrName`,`getAddres`,`backAddres`,`getData`,`backData`,`species`,`model`)
       			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
  
 // public function update_blogWrite_pdo($MemberPW,$MemberTEL,$MemberEM,$sUserName) //bolg_change_write.php 修改update資料用
 // {
 //   $db_con = new DB_con();
 //   $dbh = $db_con->db;
   
 //   $sth = $dbh->prepare("UPDATE sql_RentalCar SET memberPW= :memberPW , memberTEL= :memberTEL, memberEM= :memberEM where memberID= :memberID");
 //   $sth->bindParam(':memberPW', $MemberPW);
 //   $sth->bindParam(':memberTEL', $MemberTEL);
 //   $sth->bindParam(':memberEM', $MemberEM);
 //   $sth->bindParam(':memberID', $sUserName);
 
 //   $dbh = null;
 //   return $sth->execute();		
 // }
 
 public function update_blogWrite_pdo123($MemberPW,$MemberPW2,$MemberTEL,$MemberEM,$sUserName) //bolg_change_write.php 修改update資料用
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   

   if($MemberPW != null && $MemberPW2 != null && $MemberTEL != null && $MemberEM != null ){ //不能為空值
          if($MemberPW == $MemberPW2){                                                      //驗證密碼是否兩次都相同
          $sth = $dbh->prepare("UPDATE `sql_RentalCar` SET `memberPW` = :memberPW , `memberTEL` = :memberTEL, `memberEM` = :memberEM WHERE `memberID`= :memberID");
          $sth->bindParam(':memberPW', $MemberPW);
          $sth->bindParam(':memberTEL', $MemberTEL);
          $sth->bindParam(':memberEM', $MemberEM);
          $sth->bindParam(':memberID', $sUserName);
          $dbh = null;
          
          $result["result"] = $sth->execute();		
          $result["login"]="OK";
          $result["alert"] = "<script language='javascript'> alert('修改完成!'); </script>";
          $result["go"] = "blog_change";
          return $result;
          }
          else
           $result["alert"] = "<script language='javascript'> alert('密碼不一致'); </script>";
           $result["go"] = "blog_change_write";
           return $result;
          }
      else
      	$result["alert"] = "<script language='javascript'> alert('請輸入完整資料'); </script>";
       $result["go"] = "blog_change_write";
       return $result;
        
 }
 

  ///=================================================================
  ////  會員專區>租車紀錄    查詢紀錄 SELECT
  ///=================================================================
  
 public function read_CarRecord_pdo($sUserName)  //bolg_record.php 查詢紀錄用
 {
   $db_con = new DB_con();
   $dbh = $db_con->db;
   
   $sth = $dbh->prepare("SELECT * FROM `sql_carGo` WHERE `userID` = :sUserName");
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
   
   $sth = $dbh->prepare("DELETE FROM `sql_carGo` WHERE `id` = :carId ");
   $sth->bindParam(':carId', $id);
   $dbh = null;
   
   return $sth->execute();	
 }
}
?>