<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Foudil Benzaid, Galina Prima, Okba Benaissa, Jordan Williams
 * @version 1.0
 * @update 2019-03-15
 * 
 */

/*=============================================
=                Classe Usager                =
=============================================*/
class Usager extends Modele {
	const TABLE = 'vino_usagers';
    

	/**
	* Fonction d'authentification 
	* 
	* @param $username le nom de l'usager
	* @param $password le mot de passe de l'usager
	* @return $rangee ou false le mot de passe de l'usager
	*/
	public function Authentification($username, $password)
	{
		
		$requete = "SELECT * from vino_usagers WHERE username = '" . $username . "' AND password = '".md5($password)."'";
		
		$res = $this->_db->query($requete);
 		$rangee= $res->fetch_assoc();
        
		if($rangee)
		{
			return $rangee;
		}
		else
		{
			return false;
		}
	}

	/**
	* Fonction d'enregistrement
	* 
	* @param $username le nom d'utilisateur de l'usager
	* @param $password le mot de passe de l'usager
	* @param $nom le nom de l'usager
	* @param $prenom le prénom de l'usager
	* @return $resultat résultat de la requête
	*/
	public function Enregistrer($username, $password, $nom, $prenom)
	{
		$password = md5($password);
		$requete = "INSERT into vino_usagers(username, password, nom, prenom) VALUE ('$username', '$password', '$nom', '$prenom')";
		
        $resultat = $this->_db->query($requete);
        if($resultat) {
        	$resultat = $this->_db->query('SELECT * FROM `vino_usagers` WHERE `id`= LAST_INSERT_ID()');
        	$resultat = $resultat->fetch_assoc();
        }
        return $resultat;
	}

	/**
	* Fonction pour récupérer la liste de celliers par usager
	* 
	* @param $idUsager l'id de l'usager
	* @return $rangees résultat de la requête
	*/
	public function getCellier($idUsager)
	{
		$rangees = array();
        $requete = "SELECT 
        			vino_bouteille.id as id_bouteille_cellier,
					vino_bouteille.nom,
					vino_bouteille.image,
					vino_bouteille.code_saq,
					vino_bouteille.pays,
					vino_bouteille.description,
					vino_bouteille.prix_saq,
					vino_bouteille.url_saq,
					vino_bouteille.url_img,
					vino_bouteille.format,
					vino_bouteille.garde_jusqua,
					vino_bouteille.millesime,
					vino_bouteille.quantite,
					vino_bouteille.date_achat,
					vino_bouteille.notes,
					vino_type.type 
        			from vino_bouteille 
        			JOIN vino_cellier ON vino_bouteille.cellier_id=vino_cellier.id 
        			JOIN vino_type ON vino_type.id = vino_bouteille.type_id 
        			JOIN vino_usagers ON vino_usagers.id=vino_cellier.usager_id 

        			WHERE vino_cellier.usager_id = ".$idUsager;
 		//die($requete);
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($rangee = $res->fetch_assoc())
				{
					$rangee['nom'] = trim(utf8_encode($rangee['nom']));
					$rangees[] = $rangee;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 
		}

		return $rangees;
	}
	/**
	* Fonction pour récupérer nombre d'usager avec ce nom d'usager
	* 
	* @param $usager nom de l'utilisateur
	* @return $rangees résultat de la requête
	*/
	public function testUser($usager)
	{
			
	//		$requete = "SELECT * from vino_cellier JOIN vino_bouteille ON vino_cellier.id_bouteille=vino_bouteille.id WHERE vino_cellier.id_usager = ".$_SESSION["UserID"];
	       			
			$requete = "SELECT COUNT(id) as c FROM vino_usagers WHERE username= '".$usager."'";
			$resultat = $this->_db->query($requete);
	        $rangee = $resultat->fetch_assoc();
			return $rangee;

	}
	public function ChangerMotDePass($usager, $password, $passwordNouveau)
	{
		$requete = "SELECT * from vino_usagers WHERE username = '" . $usager . "' AND password = '".md5($password)."'";

		
		$res = $this->_db->query($requete);
 		$rangee= $res->fetch_assoc();
        
		if($rangee)
		{
			$requete = "UPDATE vino_usagers SET password = '".md5($passwordNouveau)."' WHERE username= '".$usager."'";
			$this->_db->query($requete);
			return $rangee;
		}
		else
		{
			return false;
		}
	}


}



?>