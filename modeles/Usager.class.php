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
		
        $resultat = mysqli_query($connexion, $requete);
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
		
		$rows = Array();
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
					vino_contient.quantite,
					vino_contient.date_achat,
					vino_contient.notes,
					vino_type.type 
        			from vino_cellier 
        			JOIN vino_contient ON vino_cellier.id=vino_contient.cellier_id 
        			JOIN vino_bouteille ON vino_contient.bouteille_id=vino_bouteille.id 
        			JOIN vino_type ON vino_type.id = vino_bouteille.type_id 
        			WHERE vino_cellier.usager_id = ".$idUsager;
 
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
	* Fonction pour récupérer la liste de celliers par usager et avec le filtre et la recherche
	* 
	* @param $idUsager l'id de l'usager
	* @param $nom le nom de boueille 
	* @param $type le type de bouteille 
	* @param $pays le pays de bouteuille
	* @param $millesime l'annee 
	* @param $quantite la quantite
	* @param $prix_saq le prix de bouteille
	* @param $filtre variable de filtre 
	* @return $rangees résultat de la requête

	*/
	public function getCellierFiltre($idUsager, $nom ="", $type ="", $pays="", $millesime="", $quantite=0, $prix_saq=0.0, $filtre="")
	{
		$rangees=Array();
		$rows = Array();
		
		$recherche ='vino_cellier.usager_id ='.$idUsager;
		// si le variable existe alors on concatine la chaine 
		if( !empty($nom))
		   $recherche.=" AND vino_bouteille.nom LIKE '".$nom."'";
		if( !empty($type))
		   $recherche.=" AND vino_type.type LIKE '".$type."'";
		if( !empty($pays))
		   $recherche.=" AND vino_bouteille.pays LIKE '".$pays."'";
		if( !empty($millesime))
		   $recherche.=" AND vino_bouteille.millesime LIKE ".$millesime."";
		if( !empty($code_saq))
		   $recherche.=" AND vino_bouteille.code_saq =".$code_saq."";
		if( !empty($quantite))
		   $recherche.=" AND vino_contient.quantite =".$quantite."";
		if( !empty($notes))
		   $recherche.=" AND vino_contient.notes LIKE '".$notes."'";
		if( !empty($prix_saq))
		   $recherche.=" AND vino_bouteille.prix_saq =".$prix_saq."";
		//variable par defaut de tri
		$Tri ='vino_bouteille.nom';
		//teste de variable pour le triage 
		if( $filtre == 'nom')
		   $Tri ="  vino_bouteille.nom";
		if( $filtre == 'type')
		   $Tri ="  vino_type.type";
		if( $filtre == 'pays')
		   $Tri ="  vino_bouteille.pays ";
		if( $filtre == 'millesime')
		   $Tri ="  vino_bouteille.millesime";
		if( $filtre == 'date_achat')
		   $Tri ="  vino_contient.date_achat";
		if( $filtre == 'code_saq')
		   $Tri ="  vino_bouteille.code_saq";
		if( $filtre == 'quantite')
		   $Tri ="  vino_contient.quantite ";
		if( $filtre == 'notes')
		   $Tri ="  vino_contient.notes ";
		if( $filtre == 'prix_saq')
		   $Tri ="  vino_bouteille.prix_saq ";
		// var_dump($Tri);
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
					vino_contient.quantite,
					vino_contient.date_achat,
					vino_contient.notes,
					vino_type.type 
        			from vino_cellier 
        			JOIN vino_contient ON vino_cellier.id=vino_contient.cellier_id 
        			JOIN vino_bouteille ON vino_contient.bouteille_id=vino_bouteille.id 
        			JOIN vino_type ON vino_type.id = vino_bouteille.type_id 
        			WHERE ".$recherche." ORDER BY ".$Tri." ASC";
        			
 
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

}



?>