<!DOCTYPE html>
<html lang="fr">
<head>
<?php  
 if(!isset($_SESSION["login"]) && empty($_SESSION["login"]))
 {
  header("location:index.php");
  }
 ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afrikode admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.php"><span>afrikode</span></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="recherchez maintenat" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="element.php">element</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Blog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newsletter.php">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Newsletter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pub.php">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Pub</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="commentaire.php">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Commentaires</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="repondre.php">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">reponse</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="compte_admin.php">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">compte_admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dec.php">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Deconnexion</span>
            </a>
          </li>
        </ul>
      </nav>