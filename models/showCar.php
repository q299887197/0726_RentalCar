<?php
require_once("models/PDOdb.php");

class showCar {

    function showAllcar_pdo(){          //顯示所有車種
        $db_con = new DB_con();
        $dbh = $db_con->db;
        
        $sth = $dbh->prepare("SELECT * FROM `sql_showCar`");
        $sth->execute();
        $dbh = null;
        return $sth->fetchAll();
    }
    
    function showCarByClass_pdo($class){    //顯示設定車種 (小客車, 休旅車)
        $db_con = new DB_con();
        $dbh = $db_con->db;
        
        $sth = $dbh->prepare("SELECT * FROM `sql_showCar` WHERE `class` = :class ");
        $sth->bindParam(':class', $class);
        $sth->execute();
        $dbh = null;
        return $sth->fetchAll();
    }
    
    
    
    
}
?>
