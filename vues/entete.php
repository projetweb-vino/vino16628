<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vino</title>
    <!-- Police Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- Style Normalize -->
    <link rel="stylesheet" href="./css/normalize.css" type="text/css" media="screen">
    <!-- Style Base -->
    <link rel="stylesheet" href="./css/base_h5bp.css" type="text/css" media="screen">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Notre style css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <!-- BASEURL -->
    <base href="<?php echo BASEURL; ?>">

    <!-- Le script -->
    <script src="./js/main.js"></script>
</head>
	
<body class="text-center">

    <!-- Barre de navigation -->
	<nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <!-- Le logo -->
            <a class="navbar-brand" href="?requete=CellierParUsager">
                <img src="images/vino_logo.png" style="width: 80px;">
            </a>
            <!-- Le bouton toggle -->
            <button id="toggle" class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>
            <!-- Le menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">

                    <!-- Les celliers -->
                    <li class="nav-item">
                        <a class="nav-link active" id="celliers"  href="?requete=CellierParUsager">
                        	<img src="images/winery.png">
                                Celliers
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <!-- Ajouter une bouteille -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" id="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus"><i class="fas fa-wine-bottle"></i></i>
                            <span>
                                Ajouter une bouteille 
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Daily Report</a>
                            <a class="dropdown-item" href="#">Weekly Report</a>
                            <a class="dropdown-item" href="#">Yearly Report</a>
                        </div>
                    </li>

                    <!-- On affiche le menu Statistiques uniquement pour l'administrateur -->
                    <?php 
                    if ($_SESSION['admin']=='oui') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?requete=statistiques" id="statistiques">
                            <i class="fa fa-chart-bar" title="Statistiques"></i>
                            Statistiques
                        </a>
                    </li>
                    <?php 
                    }
                    ?>
                    
                    <!-- Mon compte -->
                    <li class="nav-item">
                        <a class="nav-link" href="?requete=monCompte" id="monCompte">
                            <i class="far fa-user"></i>
                            Mon compte
                        </a>
                    </li>

                    <!-- On affiche le menu Paramètres uniquement pour l'administrateur -->
                    <?php 
                    if ($_SESSION['admin']=='oui') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?requete=listeUsagers" id="parametres">
                            <i class="fas fa-cog"></i>
                                Paramètres
                        </a>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>

                 <!-- Menu d'importation -->
                <ul class="navbar-nav">
                    <!-- On affiche le menu importation SAQ uniquement pour l'administrateur -->
                    <?php 
                    if ($_SESSION['admin']=='oui') {
                    ?>
                    <li class="nav-item">
                        
                        <span id="nombreSAQ" class="badge">
                        <?php
                            echo $nombreSAQ['nombreSAQ']; 
                        ?>
                        </span>
                        

                        <a class="nav-link d-block" href="#">
                       
                        <img id="myBtn" src="images/Logo-SAQ.png" style="width: 30px;">
                        </a>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>

                <!-- Menu déconnexion -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-block" href="index.php?requete=Logout">
                        <?php if (isset($_SESSION ['nom']) && isset($_SESSION ['prenom'])):
                         ?>
                        <?php    echo $_SESSION ['nom']. ' ' . $_SESSION ['prenom']  ?> 
                        
                            , <b>Se déconnecter</b>
                        <?php endif ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- Fin du menu -->

    <!-- Le modal-->
    <div id="myModal" class="modal">

      <!-- Le contenu du modal -->
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="tm-block-title text-white"><i class="fas fa-file-import"></i> Importation depuis la SAQ</h2>
          <span class="close">&times;</span>
          
        </div>
        <div class="modal-body">
            <form method='GET'>
                <div class="row tm-content-row">
                    <div class="form-group col-md-6">
                        <label for="type">Nombre de Bouteilles</label>
                        <input type="number" name="nombre" id="debut" class="form-control validate"   required>
                        
                    </div>
                                                      
                </div>
                <div class="form-row">
                    <div class="option form-group col-md-4">
                        <button type='submit' class="btn btn-primary btn-block text-uppercase"><i class="fas fa-file-import"></i> Importer</button>
                        <input type="hidden" name="requete" value='importer'>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>

    </div>
    

			