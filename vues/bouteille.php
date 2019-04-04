<?php
     $code_saq = $bouteille['code_saq'];
     $nom = $bouteille['nom'];
     $description = $bouteille['description']; 
     $image = $bouteille['image'];
     
?>
<html>
<head>
    <title>Bouteille</title>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2">
        
    </script>
    
    <!-- Personnaliser les Open Graph -->
    <!-- Le chemin brut -->
    <meta property="og:url" content="<?= "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <!-- Le nom de la bouteille -->
    <meta property="og:title" content="<?= $nom ?>"/>
    <!-- Type -->
    <meta property="og:type"          content="website" />
    <!-- Description -->
    <meta property="og:description"   content="<?= $description ?>" />
    <!-- Image : Pour l'afficher je concatene le lien de la SAQ unique avec le code de la SAQ et '_is'¸
    Pour afficher la grande image -->
    <meta property="og:image"         content="http://s7d9.scene7.com/is/image/SAQ/<?= $code_saq ?>_is" />
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
            <a class="navbar-brand" href="#">
                <img src="images/vino_logo.png" style="width: 80px;">
            </a>
           
            </div>
        </div>

    </nav>
    <!-- Fin du menu -->

<div class="container">
     <!-- row -->
    <div class="row tm-content-row">
  
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 tm-block-col bouteilles">

            <!-- Le conteneur overlay -->
            <div class="middle">
                <br>
                <br>
                <!-- Le pays -->
                <h2><small class="pays text-muted">Pays : <?php echo $bouteille['pays'] ?></small></h2>
               
                <!-- Le millesime -->
                <h2><small class="millesime text-muted">Millesime : <?php echo $bouteille['millesime'] ?></small></h2>
            </div>

            <!-- Conteneur de partage sur les réseaux sociaux -->
            <div class="tm-bg-primary-dark tm-block tm-block-taller bouteille" data-quantite="" data-share="<?php echo $bouteille['id'] ?>">

                              

                <!-- Image de la bouteille -->
                <img class="rounded-circle image" src="https:<?php echo $bouteille['image'] ?>">

                

                <!-- Le nom de la bouteille -->
                <p class="tm-block-title text-danger nom"><?php echo $bouteille['nom'] ?></p>
                                       
            </div>
        </div>
        <br>
    </div>
                 
    </div>
    <footer class="tm-footer row tm-mt-small bg-dark">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2019</b> Tous droits réservés. 
                        
                Réalisé par : <a rel="nofollow noopener" href="" class="tm-footer-link">Foudil Benzaid, Okba Benaissa, Galina Prima, Jordan Williams</a>
            </p>
        </div>
    </footer>
    
</body>
</html>