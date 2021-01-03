<?php

  /**
   * creation de la classe  Afrikode
   */
  class Afrikode{
      // declaration des attributs
    private $_cnx="mysql:host=localhost;dbname=rlab";
    private  $_user="root";
    private $_pass="";
    private $_con;
    public static $paginate="";
    private const APRES_AVANT=4;
    private $reche;
    public static $rayan;
    // declaration du construteur 
    public function __construct(){
      /**
       * Gestion d'erreur , elle permet d'afficher un message en cas d'echec
       */
        try{
          // connexion avec la base de donnée
            $this->_con= new PDO($this->_cnx,$this->_user,$this->_pass);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        // si la connexion à echouer
        catch(PDOException $e){
          // message d'erreur
        $msg='Erreur de connexion avec la base de donnée '.$e->Message();
              die($msg);
        }
    }
    /**
     * insertion de données dans la base de données rlab
     *
     * @param [type] $titre
     * @param [type] $contenu
     * @param [type] $photo
     * @return void
     */
    public function Insertion($titre,$contenu,$photo,$categorie){
      // suppression de caractere illegaux
        $titre=htmlspecialchars($titre);
        $contenu_photo=htmlspecialchars(trim($photo['name']));
        $temporaire=$photo['tmp_name'];
        // verification si les parametre passer existe et ils ne sont pas nuls
        if(isset($titre) and !empty($titre) and isset($contenu) and !empty($contenu) and isset($contenu_photo) and !empty($contenu_photo)){
            // verification de format de fichier envoyé avec regex 
          if(preg_match('#.jpg$|.png$#i',$contenu_photo)){
            // requete pour resortir les données
                $req=$this->_con->query('SELECT id from articles');
                // connaitre les nombre d'enregistrement
                $nbre_enregistrement= $req->rowCount();
                $i=$nbre_enregistrement+1;
                // remplacer le point par le dernier numero id et concatener avec le point
                $contenu_photo=str_replace('.',$i.'.',$contenu_photo);
                // deplacement de l'image vers notre projet dans le dossier image
                  move_uploaded_file($temporaire,'../images/'.$contenu_photo);
                // prepation d'insertion de données
                $prepare_requete=$this->_con->prepare('INSERT INTO articles(titre,contenu,photo,categorie,date_pub) VALUES(?,?,?,?,NOW())');
                $prepare_requete->execute(array($titre,$contenu,$contenu_photo,$categorie));
             }
        }
         }
     /**
      * modification de donnée dans la base de données
      *
      * @param [type] $titre
      * @param [type] $contenu
      * @param [type] $photo
      * @param [type] $id
      * @return void
      */
     public function  Modification($titre,$contenu,$photo,$categorie,$id){
        // suppression de caractere illegaux
      $titre=htmlspecialchars($titre);
      $contenu_photo=htmlspecialchars(trim($photo));
      $id=(int)$id;
      // verification si les parametre passer existe et ils ne sont pas nuls
      if(isset($titre) and !empty($titre) and isset($contenu) and !empty($contenu) and isset($contenu_photo) and !empty($contenu_photo)and is_numeric($id) and !empty($id)){
         // modification de donnée dans la base de donnée
              $prepare_requete=$this->_con->prepare('UPDATE articles SET titre=?,contenu=?,photo=?,categorie=?,date_pub=NOW() WHERE id=?');
              $prepare_requete->execute(array($titre,$contenu,$contenu_photo,$categorie,$id));
      }
     }
      /**
       *suppression des de données dans la base de données
       */
    public  function Suppression($id){
      if(isset($id) and is_numeric($id) and !empty($id)){
        $id=(int)$id;
        // Suppression de donnée dans la base de donnée
             $prepare_requete=$this->_con->prepare('DELETE FROM articles WHERE id=?');
             $prepare_requete->execute(array($id));
     }
    }
    //recuperation pour la modification
    public function recuperation($id){
      $id=(int)$id;
      $req=$this->_con->prepare('SELECT * from articles WHERE id=?');
      $req->execute(array($id));
      return $req->fetchAll();
    }
    // affichage des elements
    public function Affichage(){
      $req=$this->_con->query('SELECT * from articles');
        return $req->fetchAll();
    }
    // la fonction de pagination du site
    public  function pagination($nombre,$nombre_par_page){
      $nombre=(int)$nombre;
      $req=$this->_con->query('SELECT * from articles');
      // compter les nombres dess enregistrement
      $nombre_enregistrement=$req->rowCount();
      // recuperation de la partie entierer de resultat de la division 
      $last_page=ceil($nombre_enregistrement/$nombre_par_page);
      $num=1;
      if(isset($nombre) and is_numeric($nombre)){
               if($nombre<=0){
                 $num=1;
               }
                 else if($nombre>=$last_page){
                    $num=$last_page;
                 } 
                 else
                 $num=$nombre;
              if(!is_numeric($nombre))
                    $num=1;
      }
      else{
        $num=1;
      }
      // la formule pour trouver la limite qui av sortir
      $limit='LIMIT '.(($num*$nombre_par_page)-$nombre_par_page).','.$nombre_par_page ;
      $pre=$this->_con->query("SELECT * FROM articles ORDER BY id DESC $limit");
       self::$paginate='';
       // creation de pagination 
      if($last_page>1){
        // verification de liens precedents
            if($num>1){
              $precedent=$num-1; 
              self::$paginate.='<a href="page-'.$precedent.'"><span class="next">precedent</span></a>';
               for($i=$num-self::APRES_AVANT;$i<$num;$i++){
                 if($i>0){
                  self::$paginate.='<a href="page-'.$i.'"><span class="lien">'.$i.'</span></a>';
                 }
               }
            }
            // lien du milieu du pagination
            self::$paginate.='<span>'.$num.'</span>';
           // verification de liens suivants
           if($num<$last_page){
             $suivant=$num+1;
             for($i=$num+1;$i<$num+self::APRES_AVANT;$i++){
               if($i>=$last_page){
                     break;
                  }
                self::$paginate.='<a href="page-'.$i.'"><span class="lien">'.$i.'</span></a>';
               }
               self::$paginate.='<a href="page-'.$suivant.'"><span class="next">suivant</span></a>'; 
             }
         // fin condition last_page
           }

      return $pre->fetchAll();    
    }
    public function recupe_commentaire($id){
      $id=(int)$id;
      $req=$this->_con->prepare('SELECT * from commentaire WHERE id_article=?');
      $req->execute(array($id));
      return $req->fetchAll();
    }
    public function recupe_reponse($id){
      $id=(int)$id;
      $req=$this->_con->prepare('SELECT * from repondre WHERE id=?');
      $req->execute(array($id));
      return $req->fetchAll();
    }
    public function derniers_articles(){
      $req=$this->_con->query("SELECT * FROM articles ORDER BY id DESC limit 0,12 ");
      return $req->fetchAll();
    }
    public function lire($id){
      $id=(int)$id;
      if(isset($id)and !empty($id)and is_numeric($id)){
        $req=$this->_con->prepare('SELECT * from articles WHERE id=?');
        $req->execute(array($id));
        if($req->rowCount()==0){
          header("location:../afri/error.php");
        }
        else{
          return $req->fetchAll();
        }
      }
      else{
        header("location:../afri/error.php");
      }
    }
    public function Recherche($key,$nombre,$nombre_par_page){
       if(isset($key) and !empty($key)){

         $this->_reche=htmlspecialchars(strip_tags($key));
        $req=$this->_con->query ('SELECT * from articles WHERE CONCAT(titre,contenu) LIKE "%'.$key.'%" ORDER BY id DESC ');
        // pagination de recherche 
        $nombre=(int)$nombre;
        // compter les nombres dess enregistrement
        $nombre_enregistrement=$req->rowCount();
        self::$rayan= $nombre_enregistrement;
        // recuperation de la partie entierer de resultat de la division 
        $last_page=ceil($nombre_enregistrement/$nombre_par_page);
        $num=1;
        if(isset($nombre) and is_numeric($nombre)){
                 if($nombre<=0){
                   $num=1;
                 }
                   else if($nombre>=$last_page and $last_page>0){
                      $num=$last_page;
                   } 
                   else{
                   $num=$nombre;
                   }
                if(!is_numeric($nombre))
                      $num=1;
                   
        }
        else{
          $num=1;
        }
        // la formule pour trouver la limite qui av sortir
        $limit='LIMIT '.(($num*$nombre_par_page)-$nombre_par_page).','.$nombre_par_page ;
        $pre=$this->_con->prepare("SELECT id,titre,contenu,photo,date_pub FROM articles  WHERE CONCAT(titre,contenu) LIKE ? ORDER BY id DESC $limit  ");
        $pre->execute(array('%'.$this->_reche.'%'));
        self::$paginate='';
         // creation de pagination 
        if($last_page>1){
          // verification de liens precedents
              if($num>1){
                $precedent=$num-1; 
                self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$precedent.'"><span class="next">precedent</span></a>';
                 for($i=$num-self::APRES_AVANT;$i<$num;$i++){
                   if($i>0){
                    self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$i.'"><span class="lien">'.$i.'</span></a>';
                   }
                 }
              }
              // lien du milieu du pagination
              self::$paginate.='<span>'.$num.'</span>';
             // verification de liens suivants
             if($num<$last_page){
               $suivant=$num+1;
               for($i=$num+1;$i<$num+self::APRES_AVANT;$i++){
                 if($i>=$last_page){
                       break;
                    }
                  self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$i.'"><span class="lien">'.$i.'</span></a>';
                 }
                 self::$paginate.='<a href="search.php?q='.$_GET["q"].'&page='.$suivant.'"><span class="next">suivant</span></a>'; 
               }
           // fin condition last_page
             }
             return $pre->fetchAll();
       }
    }
  }

