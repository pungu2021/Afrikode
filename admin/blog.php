<?php 
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
      require 'Controllers'.DIRECTORY_SEPARATOR.'ControllerInsertion.php';
  
       ?>
         <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title display-2">Publiez des articles</h4>
                  <p class="card-description display-5">
                   lorem ipsum lorem ipsum  lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                   lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                   lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                   lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                  </p>
                  <form class="forms-sample" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Titre de l'article</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Titre de l'article" name="titre" value="<?php if(!empty($rec)) echo $rec[0]['titre'] ?>"> 
                    </div>
                
                    <div class="form-group">
                      <label for="exampleSelectGender">Categorie d'article</label>
                        <select class="form-control" id="exampleSelectGender" name="categorie" value="<?php if(!empty($rec)) echo $rec[0]['categorie'] ?>">
                          <option>programmation</option>
                          <option>Graphisme</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Télécharger une photo</label>
                      <input type="file" name="img" class="form-control file-upload-info <?php if(isset($_GET["id"])) echo "visible-false"; else echo "visible-true"?>">
                      <input type="text" name="photo" class="form-control file-upload-info <?php if(isset($_GET["id"])) echo "visible-true"; else echo "visible-false"?> " value="<?php if(!empty($rec)) echo $rec[0][3] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Article</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="contenu" ><?php if(!empty($rec)) echo $rec[0][2] ?></textarea>
                    </div>
                    <button  class="btn btn-primary mr-2"  name="publier">Publier</button>
                    <button class="btn btn-light" type="reset">Annuler</button>
                    <button class="btn btn-primary mr-2"  name="modifier_valide" value="modifier">modification_valide</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12  stretch-card">
              <div class="card ">
                <div class="card-body ">
                  <p class="card-title">Article recents</p>
                  <div class="table-responsive ">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Categorie</th>
                            <th>Image</th>
                            <th>date_publication</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($recuperation as $toto){?>
                        <tr>
                            <td><?php echo$toto['id'];?></td>
                            <td><?php echo$toto['titre'];?></td>
                            <td><?php echo$toto['categorie'];?></td>
                            <td><?php echo$toto['photo'];?></td>
                             <td> <?php echo temps(date("Y-m-d H:i:s"),$toto['date_pub']);?></td>
                            <td><a href="blog.php?id=<?php echo $toto['id'];?>"><button class="btn btn-primary btn-rounded" name="modifier">modifier</button></a></td>
                            <td><button class="btn btn-danger btn-rounded">supprimer</button></td>
                        </tr>
                        <?php }?>
                        <tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
            </div>

      
      
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
