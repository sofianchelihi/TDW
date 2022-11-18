<?php
// header("Access-Control-Allow-Origin:*");
// header("Content-Type:application/json;charset=UTF-8");
// header("Access-Control-Max-Age:3600");
// header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch,X-Auth-Token");
// header("Access-ControlAllow-Methods:POST,GET");


// $data = file_get_contents("php://input");
//include './DataBase.php';


// class User{

//   private $db;

//   public function __construct(){
//     global $db;
//     $this->db=$db;
//   }


//   public function listT1(){
//     $_REQUESt = $this->db->prepare("SELECT * FROM `culture` ORDER BY Nom_culture");
//     $_REQUESt->execute();
//     $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//     return json_encode($_REQUESt);
//   }

//   public function listT2(){
//     $_REQUESt = $this->db->prepare("SELECT * FROM `elevage` ORDER BY Nom_animal");
//     $_REQUESt->execute();
//     $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//     return json_encode($_REQUESt);
//   }


//   public function menu(){
//     $_REQUESt = $this->db->prepare("SELECT * FROM `menu`");
//     $_REQUESt->execute();
//     $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//     return json_encode($_REQUESt);
//   }

//   public function typeA(){
//     $_REQUESt = $this->db->prepare("SELECT * FROM `type_agriculture`");
//     $_REQUESt->execute();
//     $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//     return json_encode($_REQUESt); 
//   }


//   public function GetService($service){
//     switch ($service) {
//       case "listT1":
//           return $this->listT1();         
//         break;
//       case "listT2":
//           return $this->listT2();              
//         break;
//       case "menu":
//           return $this->menu();              
//         break;
//       case "typeA":
//           return $this->typeA();        
//         break;
//       default:             
//     }
//   }



// }




// if(isset($data)){
//         $service = json_decode($data)->service;
//         switch ($service) {
//             case "listT1":
//                 $_REQUESt = $db->prepare("SELECT * FROM `culture` ORDER BY Nom_culture");
//                 $_REQUESt->execute();
//                 $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//                 print_r(json_encode($_REQUESt));              
//               break;
//             case "listT2":
//                 $_REQUESt = $db->prepare("SELECT * FROM `elevage` ORDER BY Nom_animal");
//                 $_REQUESt->execute();
//                 $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//                 print_r(json_encode($_REQUESt));              
//               break;
//             case "menu":
//                 $_REQUESt = $db->prepare("SELECT * FROM `menu`");
//                 $_REQUESt->execute();
//                 $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//                 print_r(json_encode($_REQUESt));              
//               break;
//             case "typeA":
//                 $_REQUESt = $db->prepare("SELECT * FROM `type_agriculture`");
//                 $_REQUESt->execute();
//                 $_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
//                 print_r(json_encode($_REQUESt));              
//               break;
//             default:             
//           }
// }

?>