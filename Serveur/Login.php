<?php
// header("Access-Control-Allow-Origin:*");
// header("Content-Type:application/json;charset=UTF-8");
// header("Access-Control-Max-Age:3600");
// header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch,X-Auth-Token");
// header("Access-ControlAllow-Methods:POST,GET");


// $data = file_get_contents("php://input");
// require_once './DataBase.php';

// class Admin{
//     private $id;
//     private $username;
//     private $password;
//     private $hashcode;
//     private $db;


//     public function __construct($username,$password){
//         global $db;
//         $this->username=$username;
//         $this->password=$password;
//         $this->db=$db;
//     }


//     public function generHashCode(){
//         $this->hashcode= md5( $this->password.md5(date("Y-m-d h:i:s"))  );
//     }

//     public function UserExist(){
        
//         $_REQUESt = $this->db->prepare("SELECT *from utilisateur where name_user=:username AND hash_pwd=:password");
//         $_REQUESt->bindParam("username",$this->username);
//         $_REQUESt->bindParam("password",$this->password);
//         $_REQUESt->execute();
//         if($_REQUESt->rowCount()==1){
//             $this->id = $_REQUESt->fetchObject()["id_user"];
//             $this->generHashCode();
//             return true;
//         }else{
//             $this->id=null;
//             return false;
//         }
//     }

//     public function Connect(){
//         if($this->UserExist()){
//             $_REQUESt = $this->db->prepare("UPDATE utilisateur SET con_hashcode=:hashcode WHERE id_user=:iduser");
//             $_REQUESt->bindParam("hashcode",$this->hashcode);
//             $_REQUESt->bindParam("iduser",$this->id);
//             $_REQUESt->execute();
//             return json_encode(["etat"=>true,"id"=>$this->id,"code"=>$$this->hashcode]);
//         }else{
//             print_r(json_encode(["etat"=>false,"code"=>"error"]));
//         }
//     }
   


// }

// if(isset($data)){
//         $_REQUESt = $db->prepare("SELECT *from utilisateur where name_user=:username AND hash_pwd=:password");
//         $_REQUESt->bindParam("username",json_decode($data)->username);
//         $_REQUESt->bindParam("password",json_decode($data)->password);
//         $_REQUESt->execute();
//         if($_REQUESt->rowCount()==1){
//             $hashcode=md5(  json_decode($data)->password.md5(date("Y-m-d h:i:s"))  );
//             $user_id=$_REQUESt->fetchObject()->id_user;
//             $_REQUESt = $db->prepare("UPDATE utilisateur SET con_hashcode=:hashcode WHERE id_user=:iduser");
//             $_REQUESt->bindParam("hashcode",$hashcode);
//             $_REQUESt->bindParam("iduser",$user_id);
//             $_REQUESt->execute();            
//             print_r(json_encode(["etat"=>true,"id"=>$user_id,"code"=>$hashcode]));
//         }else{
//             print_r(json_encode(["etat"=>false,"code"=>"error"]));
//         }
// }

?>