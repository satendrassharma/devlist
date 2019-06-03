<?php

class Database{
    private $hostdb="localhost";
    private $userdb="root";
    private $passdb="";
    private $namedb="devlist";
    public $pdo;


    public function __construct(){
        if(!isset($this->pdo)){
            try{
                $link=new PDO("mysql:host=".$this->hostdb.";dbname=".$this->namedb,$this->userdb,$this->passdb);
                $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER set utf8");
                $this->pdo=$link;
                // echo $this->pdo;
            }catch(PDOException $e){
                die("failed to connect with database".$e->getMessage());
            }
        }
    }
}

?>