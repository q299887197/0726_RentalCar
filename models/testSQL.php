
<?php
include_once 'testdb.php';

class CRUD
{
    
public function __construct()
 {
  $db = new DB_con();
 }
  public function create_register_pdo($MemberID,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date) // 註冊頁newMember 新增會員資料進資料庫
 {
    $dbh = new PDO("mysql:host=localhost;dbname=RentalCar", "root", "");
    $db->exec("set character set utf8");

    $result = $db->query("INSERT INTO sql_RentalCar (memberID,memberPW,memberTEL,memberEM,memberBD,newMemberDate)
    						values ('$MemberID','$MemberPW','$MemberTEL','$MemberEM','$MemberBD','$Date')");
    
    $db = null;
    return $result;			
 }
 
 
}
?>