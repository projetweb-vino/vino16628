<!DOCTYPE HTML>
<html>
	
	<head>
		<meta charset="UTF-8" />	
	</head>
	<body>
<?php
	require("dataconf.php");
	require("config.php");
	$debut = 0;
	$nombreProduit = 10;
	
	$saq = new SAQ();
	$nombre = $saq->getProduits($nombreProduit,$debut);

	
	
	

?>
</body>
</html>