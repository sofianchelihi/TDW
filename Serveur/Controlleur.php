<?php
require './Model.php';


class controlleur{
    
    public function connect($d){
        $admin = new Admin(json_decode($d)->username,json_decode($d)->password);
        if($admin->UserExist()){
            return $admin->connect();
        }
    }


    public function verifierConnexion($d){
        $service = new ServiceLogin(json_decode($d)->id_user,json_decode($d)->hashcode);
        return $service->verfieLogin();
    }

    public function deconnect($d){
        $service = new ServiceLogin(json_decode($d)->id_user,null);
        $service->deconnect();

    }

    public function listT1(){
        $service = new ServicelistT1();
        return $service->listT1();
    }

    public function inserEelemntT1($d){
        $service = new ServicelistT1();
        return $service->inserEelemntT1(json_decode($d)->Nom_culture,json_decode($d)->Superficie,json_decode($d)->Production);
    }

    public function supEelemntT1($d){
        $service = new ServicelistT1();
        return $service->supEelemntT1(json_decode($d)->num_sup_culture);
    }

    public function editEelemntT1($d){
        $service = new ServicelistT1();
        return $service->editEelemntT1(json_decode($d)->edit_culture,json_decode($d)->edit_Superficie,json_decode($d)->edit_Production,json_decode($d)->num_edit_culture);
    }

    public function listT2(){
        $service = new ServicelistT2();
        return $service->listT2();
    }

    public function inserEelemntT2($d){
        $service = new ServicelistT2();
        return $service->inserEelemntT2(json_decode($d)->Nom_animal,json_decode($d)->Nombre_tete);
    }

    public function supEelemntT2($d){
        $service = new ServicelistT2();
        return $service->supEelemntT2(json_decode($d)->num_sup_Espece);
    }

    public function editEelemntT2($d){
        $service = new ServicelistT2();
        return $service->editEelemntT2(json_decode($d)->edit_Espece,json_decode($d)->edit_Nombre,json_decode($d)->num_edit_Espece);
    }

    public function AfficherMenu(){
        $user = new User();
        return $user->GetService("menu");
    }

    public function typeA(){
        $user = new User();
        return $user->GetService("typeA");
    }
}
?>