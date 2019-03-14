<html>
	<head>
		<meta charset="UTF-8">
		<title>Login sur la base</title>
		<style>
			*{
				text-decoration: none;
				list-style: none;
			}
            .all{
                width: 500px;
                border: 2px solid;
                background-color: antiquewhite;
                color: #444242;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
            }
            h1, h2{
            	text-align: center;
                color: #444242;
            }
            li{
                padding: 15px;
                flex-grow: 1;
            }
           input{
               margin: 10px;
           }
           input:nth-child(5){
               width: 75px;
               margin-left: 200px;
           }
            form{
                margin-left: 150px;
            }
        </style>
	</head>
	<body class="main">
		<div class="all">
			<h1>Bienvenu dans notre site!</h1>
			<h2>Entrez votre nom d’usager et mot de passe </h2>
			<?php
				if(!isset($_SESSION["UserID"]))
				{
			?>
			<form method="POST" action="<?php echo URL_ROOT; ?>index.php">
				Username d'usager : <input type="text" name="username" required/><br>
				Mot de passe : <input type="password" name="password" required/><br>
				Nom d'usager : <input type="text" name="nom" required/><br>
				Prenom d'usager : <input type="text" name="prenom" required/><br>
				<input type="submit"  value="Enregistrer"/>
				<input type="hidden" name="requete" value="Enregistrer">
			</form>
		<?php
				}
				else
				{
					echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
					echo "<a href='index.php?requete=Logout'>Se déconnecter</a>";
				}
			if(isset($messageErreur))
				echo "<p>$messageErreur</p>";
		?>	
	</div>
	</body>
</html>