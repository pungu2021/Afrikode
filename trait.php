<?php
session_start();
   try{
    // connexion avec la base de donnée
      $con= new PDO('mysql:host=localhost;dbname=rlab','root','');
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  // si la connexion à echouer
  catch(PDOException $e){
    // message d'erreur
  $ms='Erreur de connexion avec la base de donnée '.$e->getMessage();
        die($ms);
  }

if(isset($_POST['pseudo']) and !empty($_POST['pseudo']) and isset($_POST['gmail']) and !empty($_POST['gmail']) and isset($_POST["message"]) and !empty($_POST['message']) and isset($_POST["art"])and !empty($_POST['art']) )
{
  $pseud=htmlspecialchars(strip_tags($_POST["pseudo"]));
  $gmail=$_POST['gmail'];
  $message=htmlspecialchars(strip_tags($_POST["message"]));
  $art=(int)$_POST["art"];
         $req=$con->prepare("INSERT INTO commentaire(pseudo,gmail,mesage,id_article,pub_mes) VALUES(?,?,?,?,NOW())");
         $req->execute(array($pseud,$gmail,$message,$art));
         $url=$_SESSION["url"];
        header("location:$url");
}
$url=$_SESSION["url"];
header("location:$url");

 