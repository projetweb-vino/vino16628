<?php
  /**
   * Faire l'assignation des variables ici avec les isset() ou !empty()
   */
   
   
	if(empty($_REQUEST["requete"])) {
	$_REQUEST["requete"] = "Login";
	}
	global $connexion;	
	
  	$connexion = mysqli_connect(HOST, USER, PASSWORD, DATABASE); 
	
	
   
   
?>