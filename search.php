<?php
require 'Controllers/Controllecherche.php';
require 'head.php';
?>
<div class="container txto">
<p class="trou"><?php if($total!=0)echo 'Recherhe trouver pour '; ?><span><?php if($total!=0)echo $_GET["q"]?></span></p>
<p class="colo"> <?php if($total!=0)echo $total.' Tutoriels'?></p>
 <?php
   if($total==0)
      echo '
      <p class="pas"> Aucun contenu ne correspond à '.$_GET["q"].' </p>
      <p class="mai">Mais vous pouvez retenter votre chance avec d\'autres termes</p>
      ';
 ?>
<section class="row espace-top">
                    <?php foreach($toko as $tokos){?>
                    <aside class="col-lg-3 col-md-4 col-sm-6 col-xs-12 xl">
                      <a href="<?php echo separer($tokos["titre"]).'-'.$tokos["id"]?>">
                          <div class="crep">
                            <figure> 
                               <img src="images/<?php echo $tokos["photo"]?>" alt="image-bloc" class="image-bloc">
                            </figure>
                            <div class="noir-image"></div>
                              <figure>
                                  <img src="images/afrikode.jpg" alt="" class="logo-afrikode">
                              </figure>
                            <p><?php echo $tokos["titre"]?></p>
                            <span> <?php echo temps(date("Y-m-d H:i:s"),$tokos['date_pub']);?> | par carlos</span>
                        </div>
                        </a>  
                   </aside>
                    <?php }?>
                </section>  
               <div class="paginate"> <p class="pagi"> <?=$pagina?> </p></div>       
         </div>
<?php
require 'footer.php';
?>