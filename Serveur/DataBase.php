<?php

class DataBase{ 

  private $username;
  private $password;
  private $databasename;



  public function __construct($username,$password,$databasename){
    $this->username = $username;
    $this->password = $password;
    $this->databasename = $databasename;
  }


  public function Connexion(){
    return  new PDO("mysql:host=localhost;dbname=".$this->databasename.";charser=utf8;",$this->username,$this->password);
  }
}


$DataBase = new DataBase("root","","tdw");
$db = $DataBase->Connexion();

?>