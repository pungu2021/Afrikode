<?php
  require 'Controllers/ControllerAffichage.php';
  require 'head.php';
?>
        <div class="top">
            <div class="container " >
                <span class="blog-titre">Tous les tutoriels</span>
            </div>
        </div>
        <div class="container top-up">
                <section class="row">
                    <aside class="col-lg-8">
                    <p class="ac"> Avez-vous besoin d'apprendre des nouvelles choses , maitriser les 
                        nouvelles technologies et devenir un développeur ou développeuse hautement
                         qualifier , capable de créer des choses nouvelles , alors vous etes au bon endroit.
                     </p>
                    </aside>
                    <aside class="col-lg-4">
                       <div class="blog-recherche"> 
                           <div class="rec">Recherche</div>
                           <form class="form-inline">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                                aria-label="Search">
                            </form> 
                       </div>
                    </aside>
                </section>
                <section class="row espace-top">
                    <?php foreach($recuperation as $toto){?>
                    <aside class="col-lg-3 col-md-4 col-sm-6 col-xs-12 xl">
                      <a href="<?php echo separer($toto["titre"]).'-'.$toto["id"]?>">
                          <div class="crep">
                            <figure> 
                               <img src="img/<?php echo $toto["photo"]?>" alt="image-bloc" class="image-bloc">
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
               <div class="paginate"> <p class="pagi"> <?=$pagina?> </p></div>       
         </div>
<?php
  require 'footer.php';
?>