<?php
include './DataBase.php';




class Service{
    protected $db;
  
    public function __construct(){
      global $db;
      $this->db=$db;
    }
}
  
 




  
  class ServiceLogin extends Service{
      private $idUser;
      private $hashcode;
      
      public function __construct($idUser,$hashcode){
        parent::__construct();
        $this->idUser=$idUser;
        $this->hashcode=$hashcode;
      }
  
  
      public function verfieLogin(){
        $_REQUESt = $this->db->prepare("SELECT *from utilisateur where id_user=:iduser AND con_hashcode=:hashcode");
        $_REQUESt->bindParam("iduser",$this->idUser);
        $_REQUESt->bindParam("hashcode",$this->hashcode);
        $_REQUESt->execute();
        if($_REQUESt->rowCount()==1){           
          print_r(json_encode(["etat"=>true]));
        }else{
          print_r(json_encode(["etat"=>false]));
        }
      }
  
      public function deconnect(){
        $hashcode = md5(  $this->idUser . md5(date("Y-m-d h:i:s")) );
        $_REQUESt = $this->db->prepare("UPDATE utilisateur SET con_hashcode=:hashcode WHERE id_user=:iduser");
        $_REQUESt->bindParam("hashcode",$hashcode);
        $_REQUESt->bindParam("iduser",$this->idUser);
        $_REQUESt->execute(); 
      }
  
  }
  






  
  class ServicelistT1 extends Service{
    
    public function __construct(){
      parent::__construct();
    }
  
    public function listT1(){
      $_REQUESt = $this->db->prepare("SELECT * FROM `culture` ORDER BY Nom_culture");
      $_REQUESt->execute();
      $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
      print_r(json_encode($_REQUESt));
    }
  
  
    public function inserEelemntT1($Nom_culture,$Superficie,$Production){
      $_REQUESt = $this->db->prepare("INSERT INTO culture(Nom_culture,Superficie,Production) VALUES(?,?,?)");
      $_REQUESt->bindParam(1,$Nom_culture);
      $_REQUESt->bindParam(2,$Superficie);
      $_REQUESt->bindParam(3,$Production);
      $_REQUESt->execute();   
      print_r("true");
    }
  
    public function editEelemntT1($edit_culture,$edit_Superficie,$edit_Production,$num_edit_culture){
      $_REQUESt = $this->db->prepare("UPDATE culture SET Nom_culture=? , Superficie=? , Production=?  WHERE Id_culture = ?");
      $_REQUESt->bindParam(1,$edit_culture);
      $_REQUESt->bindParam(2,$edit_Superficie);
      $_REQUESt->bindParam(3,$edit_Production);
      $_REQUESt->bindParam(4,$num_edit_culture);
      $_REQUESt->execute();  
      print_r("true");  
    }
  
  
    public function supEelemntT1($num_sup_culture){
      $_REQUESt = $this->db->prepare("DELETE FROM culture WHERE Id_culture=?;");
      $_REQUESt->bindParam(1,$num_sup_culture);
      $_REQUESt->execute(); 
      print_r("true");  
    }
  
  }













  
  class ServicelistT2 extends Service{
    public function __construct(){
      parent::__construct();
    }
  
    public function listT2(){
      $_REQUESt = $this->db->prepare("SELECT * FROM `elevage` ORDER BY Nom_animal");
      $_REQUESt->execute();
      $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
      print_r(json_encode($_REQUESt)); 
    }
  
    public function inserEelemntT2($Nom_animal,$Nombre_tete){
      $_REQUESt = $this->db->prepare("INSERT INTO elevage(Nom_animal,Nombre_tete) VALUES(?,?)");
      $_REQUESt->bindParam(1,$Nom_animal);
      $_REQUESt->bindParam(2,$Nombre_tete);
      $_REQUESt->execute();  
      print_r("true"); 
    }
  
  
    public function editEelemntT2($edit_Espece,$edit_Nombre,$num_edit_Espece){
      $_REQUESt = $this->db->prepare("UPDATE elevage SET Nom_animal=? , Nombre_tete=? WHERE Id_elevage=?");
      $_REQUESt->bindParam(1,$edit_Espece);
      $_REQUESt->bindParam(2,$edit_Nombre);
      $_REQUESt->bindParam(3,$num_edit_Espece);
      $_REQUESt->execute();  
      print_r("true");  
    }
  
    public function supEelemntT2($num_sup_Espece){
      $_REQUESt = $this->db->prepare("DELETE FROM elevage WHERE Id_elevage =?;");
      $_REQUESt->bindParam(1,$num_sup_Espece);
      $_REQUESt->execute();  
      print_r("true");
    }
  
  }






  class Admin{
    private $id;
    private $username;
    private $password;
    private $hashcode;
    private $db;


    public function __construct($username,$password){
        global $db;
        $this->username=$username;
        $this->password=$password;
        $this->db=$db;
    }


    public function generHashCode(){
        $this->hashcode= md5( $this->password.md5(date("Y-m-d h:i:s"))  );
    }

    public function UserExist(){
        
        $_REQUESt = $this->db->prepare("SELECT *from utilisateur where name_user=:username AND hash_pwd=:password");
        $_REQUESt->bindParam("username",$this->username);
        $_REQUESt->bindParam("password",$this->password);
        $_REQUESt->execute();
        if($_REQUESt->rowCount()==1){
            $this->id = $_REQUESt->fetchObject()["id_user"];
            $this->generHashCode();
            return true;
        }else{
            $this->id=null;
            return false;
        }
    }

    public function Connect(){
        if($this->UserExist()){
            $_REQUESt = $this->db->prepare("UPDATE utilisateur SET con_hashcode=:hashcode WHERE id_user=:iduser");
            $_REQUESt->bindParam("hashcode",$this->hashcode);
            $_REQUESt->bindParam("iduser",$this->id);
            $_REQUESt->execute();
            return json_encode(["etat"=>true,"id"=>$this->id,"code"=>$$this->hashcode]);
        }else{
            print_r(json_encode(["etat"=>false,"code"=>"error"]));
        }
    }
   
}



class User{

    private $db;
  
    public function __construct(){
      global $db;
      $this->db=$db;
    }
  
  
    public function listT1(){
      $_REQUESt = $this->db->prepare("SELECT * FROM `culture` ORDER BY Nom_culture");
      $_REQUESt->execute();
      $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($_REQUESt);
    }
  
    public function listT2(){
      $_REQUESt = $this->db->prepare("SELECT * FROM `elevage` ORDER BY Nom_animal");
      $_REQUESt->execute();
      $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($_REQUESt);
    }
  
  
    public function menu(){
      $_REQUESt = $this->db->prepare("SELECT * FROM `menu`");
      $_REQUESt->execute();
      $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($_REQUESt);
    }
  
    public function typeA(){
      $_REQUESt = $this->db->prepare("SELECT * FROM `type_agriculture`");
      $_REQUESt->execute();
      $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($_REQUESt); 
    }
  
  
    public function GetService($service){
      switch ($service) {
        case "listT1":
            return $this->listT1();         
          break;
        case "listT2":
            return $this->listT2();              
          break;
        case "menu":
            return $this->menu();              
          break;
        case "typeA":
            return $this->typeA();        
          break;
        default:             
      }
    }
  
  
  
  }
  




?>