<?php
  require 'head.php';
  require 'Controllers/ControllerRec.php';
?>
 <figure >
     <img src="images/book.jpg" alt="" class="book">
 </figure>
 <div class="container-fluid noir">
     <div class="row ">
         <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 tx">
              <p class="text-justify al">Apprendre des nouvelles </p><br> 
              <p class=" text-center al">choses</p> <br> 
              <p class="al1"></p>
              <p class="al2">Améliorez-vous et apprenez de nouvelles choses grâce en participant à formations en développement , programmation , . . .
               </p>
               <button class="btn10 visible">Inscription</button>
               <button class="btn20 visible">Formation</button>
         </div>
         <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 visible">
            <figure class="centre">
                <img src="images/ordina.png" alt="" class="ordina">
                <img src="images/ra.png" alt="" class="para">
                <p class="belchi">Afri<span>kode</span></p>
             </figure>
         </div>
     </div>
 </div>
 <div class="container">
     <span class="pan">Dernières publications</span>
     <section class="row">
        <?php foreach($recuperation as $toto){?>
         <aside class="col-lg-3 col-md-4 col-sm-6 col-xs-12 xl">
                      <a href="<?php echo separer($toto["titre"]).'-'.$toto["id"]?>">
                          <div class="crep">
                            <figure> 
                               <img src="images/<?php echo $toto["photo"]?>" alt="image-bloc" class="image-bloc">
                            </figure>
                            <div class="noir-image"></div>
                              <figure>
                                  <img src="images/afrikode.jpg" alt="" class="logo-afrikode">
                              </figure>
                            <p><?php echo $toto["titre"]?></p>
                            <span> <?php echo temps(date("Y-m-d H:i:s"),$toto['date_pub']);?> | par carlos</span>
                        </div>
                        </a> 
          </aside>
          <?php }?>
     </section>
     <p class="confre">Voici ce que disent vos confrères...</p>
     <section class="row">
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Ceni">
                 <figure>
                     <img src="images/j.jpg" alt="" class="im-confre">
                 </figure>
                 <span>Christian Kalaki</span>
                 <p class="vote text-justify">
                 Je vous remercie vraiment pour tout. En peu de temps, 
                   j’ai compris plus de choses
                  avec vos cours qu’avec n’importe quel livre. 
                 </p>
            </aside>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Ceni">
                  <figure>
                     <img src="images/t.jpg" alt="" class="im-confre">
                 </figure>
                 <span>Syntiche Mbelu</span>
                 <p class="vote text-justify">
                 Vous êtes le meilleur ! J'avais failli abandonner
                  la programmation et grâce à un ami qui m'a fait connaitre votre site,
                  je m'en sors maintenant. Merci à vous. Que Dieu vous bénisse.  
                 </p>
            </aside>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Ceni">
                  <figure>
                     <img src="images/pu.jpg" alt="" class="im-confre">
                 </figure>
                 <span>Souley Man</span>
                 <p class="vote text-justify">
                 Je tiens à vous remercier pour vos formations.
                  J'apprends beaucoup plus que ce que 
                 j'ai appris à l'université. Prenez soin de vous.   
                 </p>
            </aside>
     </section>
 </div>
<?php
  require 'footer.php';
?>