<?php
require './Controlleur.php';

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch,X-Auth-Token");
header("Access-ControlAllow-Methods:POST,GET");

$data = file_get_contents("php://input");

class view{
    
    public function connect($donnes){
        $contr = new controlleur();
        print_r( $contr->connect($donnes));
    }


    public function verifierConnexion($d){
        $contr = new controlleur();
        print_r( $contr->verifierConnexion($d));
    }

    public function deconnect($d){
        $contr = new controlleur();
        $contr->deconnect($d);
    }

    public function listT1(){
        $contr = new controlleur();
        print_r( $contr->listT1());
    }

    public function inserEelemntT1($d){
        $contr = new controlleur();
        print_r( $contr->inserEelemntT1($d));
    }


    public function supEelemntT1($d){
        $contr = new controlleur();
        print_r( $contr->supEelemntT1($d));
    }

    public function editEelemntT1($d){
        $contr = new controlleur();
        print_r( $contr->editEelemntT1($d));
    }

    public function listT2(){
        $contr = new controlleur();
        print_r( $contr->listT2());
    }

    public function inserEelemntT2($d){
        $contr = new controlleur();
        print_r( $contr->inserEelemntT2($d));
    }

    public function supEelemntT2($d){
        $contr = new controlleur();
        print_r( $contr->supEelemntT2($d));
    }

    public function editEelemntT2($d){
        $contr = new controlleur();
        print_r( $contr->editEelemntT2($d));
    }

    public function AfficherMenu(){
        $contr = new controlleur();
        $menu =  $contr->AfficherMenu();
        $menuHTML=null;
        foreach($menu as $element){
           $menuHTML.="<li><a href='#'> ".$element["Nom_item_menu"]." </a></li>";
        }
        print_r($menuHTML);
    }

    public function AffichertypeAgricultures(){
        $contr = new controlleur();
        $ta=  $contr->typeA();
        $menuHTML=null;
        foreach($ta as $element){
            $menuHTML.="<li><a href='#'> ".$element['Type_agriculture']." </a></li>";
        }
        print_r($menuHTML);
    }

    public function AfficherDiaporama(){
        print_r(
            "<div class='diaporama'>
                <img class='imga' src='../assets/photo.jpg'  alt='Erreur'>
                <img class='imga' src='../assets/offer-banner.jpg'  alt='Erreur'>
                <img class='imga' src='../assets/g1.jpg'  alt='Erreur'>
                <img class='imga' src='../assets/g2.jpg' alt='Erreur'>
                <img class='imga' src='../assets/photo.jpg'  alt='Erreur'>
            </div>"
        );
    }

    public function AfficherTitre(){
        print_r("Coopérative d’ingénieurs agricoles");
    }

    public function AfficherVideo(){
        print_r("<video src='../assets/Wild_flowers_in_sunset_2.mp4' controls width='50%' height='300px' style='margin-left: 25%;'></video>");
    }

}



if(isset($data)){

    if( json_decode($data)->service=="login"){
        $view = new view();
        $view->connect($data);
    }

    if( json_decode($data)->service=="Vlogin"){
        $view = new view();
        $view->verifierConnexion($data);
    }

    if( json_decode($data)->service=="deconnect"){
        $view = new view();
        $view->deconnect($data);
    }

    if( json_decode($data)->service=="listT1"){
        $view = new view();
        $view->listT1();
    }

    if( json_decode($data)->service=="inserEelemntT1"){
        $view = new view();
        $view->inserEelemntT1($data);
    }

    if( json_decode($data)->service=="supEelemntT1"){
        $view = new view();
        $view->supEelemntT1($data);
    }

    if( json_decode($data)->service=="editEelemntT1"){
        $view = new view();
        $view->editEelemntT1($data);
    }

    if( json_decode($data)->service=="listT2"){
        $view = new view();
        $view->listT2();
    }

    if( json_decode($data)->service=="inserEelemntT2"){
        $view = new view();
        $view->inserEelemntT2($data);
    }

    if( json_decode($data)->service=="supEelemntT2"){
        $view = new view();
        $view->supEelemntT2($data);
    }
   
    if( json_decode($data)->service=="editEelemntT2"){
        $view = new view();
        $view->editEelemntT2($data);
    }
    
    if( json_decode($data)->service=="menu"){
        $view = new view();
        $view->AfficherMenu();
    }

    if( json_decode($data)->service=="typeA"){
        $view = new view();
        $view->AffichertypeAgricultures();
    }  
    
    if( json_decode($data)->service=="diaporama"){
        $view = new view();
        $view->AfficherDiaporama();
    } 

    if( json_decode($data)->service=="title"){
        $view = new view();
        $view->AfficherTitre();
    }

    if( json_decode($data)->service=="video"){
        $view = new view();
        $view->AfficherVideo();
    }
}
?>