<?php 
session_start();
date_default_timezone_set('Africa/Kinshasa');
 function afrikode($class){
       require './class/'.$class.'.classe.php';
  }
   spl_autoload_register('afrikode');
   $objet=new Afrikode;
   if(isset($_POST["publier"])){
       $mod="";
    $objet->pdf_insertion($_POST["desc"],$_POST["poid"],$_FILES["fichier"]);
   }
   if(isset($_GET["id"])){
    $mod=$objet->pdf_rec($_GET["id"]);
   }
   if(isset($_POST["modifier_valide"])){
    $objet->pdf_modifier($_POST["desc"],$_POST["poid"],$_FILES["fichier"],$_GET["id"]);
   }
   if(isset($_GET["para"])&& !empty($_GET["para"])){
    $objet->pdf_suppression($_GET["id"]);
   }
   $recuperation=$objet->pdf_recuperation();
   function temps($date_now,$date_enre){
      // declaration de deux variables date
     $date1=strtotime($date_now);
     $date2=strtotime($date_enre);
     // ici on a fait la difference de dates
     $date_difference=abs($date1-$date2);
     if($date_difference>=31536000){
          return 'il ya '.floor($date_difference/31536000).' ans';
      }
      else if($date_difference!=0 and $date_difference>=2592000){
          return 'il ya '.floor($date_difference/2592000).' mois';
      }
      else if( $date_difference>=604800 and $date_difference<2592000){
            if(floor($date_difference/604800) >=2)
              return 'il ya '.floor($date_difference/604800).' semaines';
          else
              return 'il ya '.floor($date_difference/604800).' semaine';
      }
      else if($date_difference >=86400 and $date_difference<2592000){
          if(floor($date_difference/86400) >=2)
          return 'il ya '.floor($date_difference/86400).' jours';
          else
          return 'il ya '.floor($date_difference/86400).' jour';
       }  
      else if($date_difference>=3600 and $date_difference<86400){ 
          return 'il ya '.floor($date_difference/3600).' h';
      }
      else if($date_difference<3600){
          return 'il ya '.floor($date_difference/60).' min';
      }
    }