<?php
include_once("models/crud.php");

class showCar {
    public $crud;
    
    function __construct(){
        $this-> crud = new CRUD(); 
    }
    
    function showAllcar(){
        $result = mysql_query("SELECT * FROM sql_showCar");
        return $result;
    }
    
    function showCarByClass($class){
        $result = mysql_query("SELECT * FROM sql_showCar where class = '".$class."'");
        return $result;
    }
}
?>
