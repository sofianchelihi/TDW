<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch,X-Auth-Token");
header("Access-ControlAllow-Methods:POST,GET");


$data = file_get_contents("php://input");
$db = new PDO("mysql:host=localhost;dbname=tdw;charser=utf8;","root","");

if(isset($data)){
        $_REQUESt = $db->prepare("SELECT *from utilisateur where name_user=:username AND hash_pwd=:password");
        $_REQUESt->bindParam("username",json_decode($data)->username);
        $_REQUESt->bindParam("password",json_decode($data)->password);
        $_REQUESt->execute();
        if($_REQUESt->rowCount()==1){
            $hashcode=md5(  json_decode($data)->password.md5(date("Y-m-d h:i:s"))  );
            $user_id=$_REQUESt->fetchObject()->id_user;
            $_REQUESt = $db->prepare("UPDATE utilisateur SET con_hashcode=:hashcode WHERE id_user=:iduser");
            $_REQUESt->bindParam("hashcode",$hashcode);
            $_REQUESt->bindParam("iduser",$user_id);
            $_REQUESt->execute();            
            print_r(json_encode(["etat"=>true,"id"=>$user_id,"code"=>$hashcode]));
        }else{
            print_r(json_encode(["etat"=>false,"code"=>"error"]));
        }
}

?>