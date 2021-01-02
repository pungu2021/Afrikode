<?php 
      require 'vue'.DIRECTORY_SEPARATOR.'header.php';
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
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Titre de l'article</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Titre de l'article">
                    </div>
                
                    <div class="form-group">
                      <label for="exampleSelectGender">Categorie d'article</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>programmation</option>
                          <option>Graphisme</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Télécharger une photo</label>
                      <input type="file" name="img[]" class="form-control file-upload-info">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Article</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Publier</button>
                    <button class="btn btn-light">Annuler</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Article recents</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Categorie</th>
                            <th>Image</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td>4</td>
                            <td>Jeremy Ortega</td>
                            <td>Levelled up</td>
                            <td>Catalinaborough</td>
                            <td><button class="btn btn-primary btn-rounded">modifier</button></td>
                            <td><button class="btn btn-danger btn-rounded">supprimer</button></td>
                        </tr>
                        <tr>
                        <td>4</td>
                            <td>Alvin Fisher</td>
                            <td>Ui design completed</td>
                            <td>East Mayra</td>
                            <td><button class="btn btn-primary btn-rounded">modifier</button></td>
                            <td><button class="btn btn-danger btn-rounded">supprimer</button></td>
                        </tr>
                        <tr>
                        <td>4</td>
                            <td>Emily Cunningham</td>
                            <td>support</td>
                            <td>Makennaton</td>
                            <td><button class="btn btn-primary btn-rounded">modifier</button></td>
                            <td><button class="btn btn-danger btn-rounded">supprimer</button></td>
                        </tr>
                        <tr>
                        <td>4</td>
                            <td>Minnie Farmer</td>
                            <td>support</td>
                            <td>Agustinaborough</td>
                            <td><button class="btn btn-primary btn-rounded">modifier</button></td>
                            <td><button class="btn btn-danger btn-rounded">supprimer</button></td>
                        </tr>
                        <tr>
                        <td>4</td>
                            <td>Betty Hunt</td>
                            <td>Ui design not completed</td>
                            <td>Lake Sandrafort</td>
                            <td><button class="btn btn-primary btn-rounded">modifier</button></td>
                            <td><button class="btn btn-danger btn-rounded">supprimer</button></td>
                        </tr>
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
