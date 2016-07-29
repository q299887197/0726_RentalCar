<?php
require_once("models/PDOdb.php");

class showCar {

    function showAllcar_pdo(){
        $db_con = new DB_con();
        $dbh = $db_con->db;
        
        $sth = $dbh->prepare("SELECT * FROM sql_showCar");
        $sth->execute();
        $dbh = null;
        return $sth->fetchAll();
    }
    
    function showCarByClass_pdo($class){
        $db_con = new DB_con();
        $dbh = $db_con->db;
        
        $sth = $dbh->prepare("SELECT * FROM sql_showCar where class = :class ");
        $sth->bindParam(':class', $class);
        $sth->execute();
        $dbh = null;
        return $sth->fetchAll();
    }
    
    
    
    
}
?>
