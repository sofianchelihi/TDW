<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch,X-Auth-Token");
header("Access-ControlAllow-Methods:POST,GET");


$data = file_get_contents("php://input");

include '../Model/DataBase.php';

if(isset($data)){
        $service = json_decode($data)->service;
        switch ($service) {
            case "login":
                $_REQUESt = $db->prepare("SELECT *from utilisateur where id_user=:iduser AND con_hashcode=:hashcode");
                $_REQUESt->bindParam("iduser",json_decode($data)->id_user);
                $_REQUESt->bindParam("hashcode",json_decode($data)->hashcode);
                $_REQUESt->execute();
                if($_REQUESt->rowCount()==1){           
                    print_r(json_encode(["etat"=>true]));
                }else{
                    print_r(json_encode(["etat"=>false]));
                }
              break;
            case "deconnect":
                $user_id=json_decode($data)->id_user;
                $hashcode=md5(  $user_id.md5(date("Y-m-d h:i:s")) );
                $_REQUESt = $db->prepare("UPDATE utilisateur SET con_hashcode=:hashcode WHERE id_user=:iduser");
                $_REQUESt->bindParam("hashcode",$hashcode);
                $_REQUESt->bindParam("iduser",$user_id);
                $_REQUESt->execute();            
              break;
            case "listT1":
                $_REQUESt = $db->prepare("SELECT * FROM `culture` ORDER BY Nom_culture");
                $_REQUESt->execute();
                $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
                print_r(json_encode($_REQUESt));              
              break;
            case "listT2":
                $_REQUESt = $db->prepare("SELECT * FROM `elevage` ORDER BY Nom_animal");
                $_REQUESt->execute();
                $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
                print_r(json_encode($_REQUESt));              
              break;
            case "inserEelemntT1":
                $_REQUESt = $db->prepare("INSERT INTO culture(Nom_culture,Superficie,Production) VALUES(?,?,?)");
                $_REQUESt->bindParam(1,json_decode($data)->Nom_culture);
                $_REQUESt->bindParam(2,json_decode($data)->Superficie);
                $_REQUESt->bindParam(3,json_decode($data)->Production);
                $_REQUESt->execute();   
                print_r("true");           
              break;
            case "inserEelemntT2":
                $_REQUESt = $db->prepare("INSERT INTO elevage(Nom_animal,Nombre_tete) VALUES(?,?)");
                $_REQUESt->bindParam(1,json_decode($data)->Nom_animal);
                $_REQUESt->bindParam(2,json_decode($data)->Nombre_tete);
                $_REQUESt->execute();  
                print_r("true");           
              break;
              case "editEelemntT1":
                $_REQUESt = $db->prepare("UPDATE culture SET Nom_culture=? , Superficie=? , Production=?  WHERE Id_culture = ?");
                $_REQUESt->bindParam(1,json_decode($data)->edit_culture);
                $_REQUESt->bindParam(2,json_decode($data)->edit_Superficie);
                $_REQUESt->bindParam(3,json_decode($data)->edit_Production);
                $_REQUESt->bindParam(4,json_decode($data)->num_edit_culture);
                $_REQUESt->execute();  
                print_r("true");           
              break;
            case "editEelemntT2":
              $_REQUESt = $db->prepare("UPDATE elevage SET Nom_animal=? , Nombre_tete=? WHERE Id_elevage=?");
              $_REQUESt->bindParam(1,json_decode($data)->edit_Espece);
              $_REQUESt->bindParam(2,json_decode($data)->edit_Nombre);
              $_REQUESt->bindParam(3,json_decode($data)->num_edit_Espece);
              $_REQUESt->execute();  
              print_r("true");   
              break;
              case "supEelemntT1":
                $_REQUESt = $db->prepare("DELETE FROM culture WHERE Id_culture=?;");
                $_REQUESt->bindParam(1,json_decode($data)->num_sup_culture);
                $_REQUESt->execute(); 
                print_r("true");        
              break;
            case "supEelemntT2":
              $_REQUESt = $db->prepare("DELETE FROM elevage WHERE Id_elevage =?;");
              $_REQUESt->bindParam(1,json_decode($data)->num_sup_Espece);
              $_REQUESt->execute();  
              print_r("true");           
              break;
            default:             
          }
}

?>