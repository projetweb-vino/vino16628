<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>List d'usagers</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <script src="./js/admin.js"></script>
  </head>
  <body class="text-center">
  	<div class="container">
  		<div class="col-md-12 mx-auto">
  			<h2>List d'usagers</h2>
            <table class="d-flex justify-content-center">
              <tr>
                <th>Nom d'utilisateure</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Sellier d'usager</th>
                <th>Supprimer usager</th>
              </tr>
              <?php foreach ($data as $i => $usager) { ?>
                <tr>
                  <th><?php echo $usager['username']; ?></th>
                  <th><?php echo $usager['nom']; ?></th>
                  <th><?php echo $usager['prenom']; ?></th>
                  <th><?php echo $usager['cnom']; ?></th>
                  <th><button data-id="<?php echo $usager['id']; ?>" class="btnModifier btn-remove-user btn btn-sm btn-outline-danger">Supprimer</button></th>
                </tr> 
              <?php } ?>
              
            </table>
            </div>
    </div>  
  </body>
</html>
