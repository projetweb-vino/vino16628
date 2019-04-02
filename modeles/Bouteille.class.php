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
=               Classe Bouteille              =
=============================================*/
class Bouteille extends Modele {
	const TABLE = 'vino_bouteille';
    
    /**
	 * Cette méthode récupère la liste des bouteilles
	 * 
	 * 
	 * @return $rangees 
	 */
	public function getListeBouteille()
	{
		
		$rangee = Array();
		$res = $this->_db->query('Select * from '. self::TABLE);
		if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	}
	
	/**
	 * Cette méthode récupère la liste des bouteilles par cellier
	 * 
	 * 
	 * @return $rangees 
	 */
	public function getListeBouteilleCellier()
	{
		
		$rangees = Array();
		$requete ='SELECT 
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

						from vino_bouteille
						INNER JOIN vino_contient ON vino_contient.bouteille_id = vino_bouteille.id
						INNER JOIN vino_cellier ON vino_contient.cellier_id = vino_cellier.id
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						'; 
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
	 * Cette méthode récupère la liste des bouteilles par cellier
	 * 
	 * 
	 * @return $rangees 
	 */
	public function ListeBouteilleSAQ()
	{
		
		$rangees = Array();
		$requete ='SELECT 
						vino_saq.id,
						vino_saq.nom,
						vino_saq.image,
						vino_saq.code_saq,
						vino_saq.pays,
						vino_saq.description,
						vino_saq.prix_saq,
						vino_saq.url_saq,
						vino_saq.url_img,
						vino_saq.format,
						vino_saq.type_id
						

						from vino_saq
						
						'; 
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
	 * Cette méthode récupère la liste des bouteilles par cellier
	 * 
	 * 
	 * @return $rangees 
	 */
	public function saqParID($id)
	{
		
		
		$requete ='SELECT 
						vino_saq.id,
						vino_saq.nom,
						vino_saq.image,
						vino_saq.code_saq,
						vino_saq.pays,
						vino_saq.description,
						vino_saq.prix_saq,
						vino_saq.url_saq,
						vino_saq.url_img,
						vino_saq.format,
						vino_saq.type_id
						

						FROM vino_saq
						WHERE vino_saq.id = $id'; 
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
	}
	/**
	 * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
	 * 
	 * @param string $nom La chaine de caractère à rechercher
	 * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */
       
	public function autocomplete($nom, $nb_resultat=10)
	{
		
		$rangees = Array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/","%" , $nom);
		 
		
		$requete ='SELECT id, nom FROM vino_bouteille where LOWER(nom) like LOWER("%'. $nom .'%") LIMIT 0,'. $nb_resultat; 
		
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
			throw new Exception("Erreur de requête sur la base de données", 1);
			 
		}
	
		return $rangees;
	}

	/**
	 * Cette méthode permet de récupérer la quantité 
	 * 
	 * @param int $id id de la bouteille
	 * 
	 * @return retourne l'occurence.
	 */
	public function recupererQuantite($id)
	{
			
		$requete = "SELECT quantite From vino_bouteille WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}
	
	
	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function ajouterBouteilleCellier($data)
	{
			
		$requete = "INSERT INTO vino_cellier(id_bouteille,date_achat,garde_jusqua,notes,prix,quantite,millesime) VALUES (".
		"'".$data->id_bouteille."',".
		"'".$data->date_achat."',".
		"'".$data->garde_jusqua."',".
		"'".$data->notes."',".
		"'".$data->prix."',".
		"'".$data->quantite."',".
		"'".$data->millesime."')";

        $res = $this->_db->query($requete);
        
		return $res;
	}

	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function ajouterBouteilleSAQ($data)
	{
			
		$requete = "INSERT INTO vino_bouteille(id_cellier, $nom, image, code_saq, pays, description, prix_saq, url_saq, url_img, format, type_id, quantite, notes, garde_jusqua,  notes, millesime, id_saq) VALUES (".
		"'".$data->id_cellier."',".
		"'".$data->nom."',".
		"'".$data->image."',".
		"'".$data->code_saq."',".
		"'".$data->pays."',".
		"'".$data->description."',".
		"'".$data->prix_saq."',".
		"'".$data->url_saq."',".
		"'".$data->url_img."',".
		"'".$data->format."',".
		"'".$data->type_id."',".
		"'".$data->quantite."',".
		"'".$data->notes."',".
		"'".$data->garde_jusqua."',".
		"'".$data->notes."',".
		"'".$data->millesime."')";

        $res = $this->_db->query($requete);
        
		return $res;
	}
	
	
	/**
	 * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
	 * 
	 * @param int $id id de la bouteille
	 * @param int $nombre Nombre de bouteille a ajouter ou retirer
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function modifierQuantiteBouteilleCellier($id, $nombre)
	{
		//TODO : Valider les données.
			
			
		$requete = "UPDATE vino_bouteille SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE id = ". $id;
		//echo $requete;
        $res = $this->_db->query($requete);
        
		return $res;
	}
	/**
	 * Fonction RecupererCellierParId Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id de la bouteille cellier
	 * @return $row détails d'un cellier
	 */
	public function RecupererCellierParId($id)
	{
				
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
						INNER JOIN vino_cellier ON vino_bouteille.cellier_id=vino_cellier.id 
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						WHERE vino_bouteille.id = ". $id;
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc(); 	
		return $rangee;
	
	}
	/**
	* Fonction sauvegarderModife Pour souvgrader les modification dans le cellier
	* 
	* @param $id id de la bouteille cellier
	* @param $dateachat date d'achat de la bouteille cellier
	* @param $notes notes
	* @param $quantite quantités
	* @param $Garde à garder jusqu'à ? (date)
	* @param $prix prix
	* @param $pays
	* @param $mille millesime
	* @param $description description
	* @param $type_id l'id du type
	 */
	public function sauvegarderModife($id, $nom, $dateachat, $notes, $quantite, $Garde, $prix, $pays, $mille ,$description, $type_id, $format)
	{
		
	    $sql = "UPDATE vino_bouteille SET 
    		vino_bouteille.nom=?, 
    		vino_bouteille.description=?, 
    		vino_bouteille.garde_jusqua=?, 
    		vino_bouteille.prix_saq=?,
    		vino_bouteille.pays=?, 
    		vino_bouteille.millesime=?, 
    		vino_bouteille.type_id=?,
    		vino_bouteille.quantite=?,
    		vino_bouteille.date_achat=?,
    		vino_bouteille.notes=?,
    		vino_bouteille.format=?
			
    		WHERE vino_bouteille.id=?";
		$stmt = $this->_db->prepare($sql);
		$stmt->bind_param('sssdssiisssi', $nom, $description, $Garde, $prix, $pays, $mille, $type_id, $quantite, $dateachat, $notes, $format, $id);
		$stmt->execute();
      	
	}
	/**
	* Fonction recuperer les Types
	*
	* @return $row détails d'un cellier
	**/
	public function RecupererTypes()
	{
				
		$requete = "SELECT * FROM vino_type ORDER BY type DESC  ";
		$res = $this->_db->query($requete);
        if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	
	}
	/**
	* Fonction recuperer les pays
	*
	* @return $row détails d'un cellier
	**/
	 public function GetPays()
	{
		$rangees = array();		
		$requete = "SELECT DISTINCT pays FROM vino_bouteille ORDER BY pays";
		$res = $this->_db->query($requete);
        if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee['pays'];
			}
		}
		
		return $rangees;
	
	}

	/**
	 * Fonction RecupererCellierParId Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id de la bouteille cellier
	 * @return $row détails d'un cellier
	 */
	public function CellierParUsager($id)
	{
		$rangees = array();		
		$requete = "SELECT 
					vino_cellier.id,
					vino_cellier.nom

					from vino_cellier
					JOIN vino_usagers ON vino_usagers.id = vino_cellier.usager_id
					
					WHERE vino_usagers.id = ". $id;
		$res = $this->_db->query($requete);
        if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	
	}

	/**
	 * Fonction RecupererCellierParId Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id de la bouteille cellier
	 * @return $row détails d'un cellier
	 */
	public function RecupererCellierParUsager($idUsager)
	{
				
		$requete = "SELECT 
					vino_cellier.id,
					vino_cellier.nom as nomCellier

					from vino_cellier
					JOIN vino_usagers ON vino_usagers.id = vino_cellier.usager_id
					
					WHERE vino_usagers.id =  $idUsager
					LIMIT 1";
		$res = $this->_db->query($requete);
  		
		$rangee = $res->fetch_assoc();
		return $rangee;
	
	}

	/**
	 * Fonction RecupererBouteilleParCellier Pour récupérer les détails d'un cellier par son id 
	 * 
	 * @param $id id du cellier
	 * @return $row détails d'un cellier
	 */
	public function RecupererBouteilleParCellier($id, $filter = array())
	{
		$where = '1';
		if(!empty($filter['year'])) {
			$where .= ' AND vino_bouteille.millesime = "'.$filter['year'].'"';
		}
		if(!empty($filter['name'])) {
			$where .= ' AND vino_bouteille.nom LIKE "%'.$filter['name'].'%"';
		}
		if(!empty($filter['type'])) {
			$where .= ' AND vino_bouteille.type_id = "'.$filter['type'].'"';
		}
		if(!empty($filter['country'])) {
			$where .= ' AND vino_bouteille.pays LIKE "'.$filter['country'].'"';
		}				
		if(!empty($filter['qty-till'])) {
			$where .= ' AND vino_bouteille.quantite <= "'.$filter['qty-till'].'"';
		}
		if(!empty($filter['qty-from'])) {
			$where .= ' AND vino_bouteille.quantite >= "'.$filter['qty-from'].'"';
		}
		//variable par defaut de tri
		$Tri ='vino_bouteille.nom';

		//teste de variable pour le triage
		if (isset($filter['filtre'])) {			

		if( $filter['filtre'] == 'nom')
		   $Tri ="  vino_bouteille.nom";
		if( $filter['filtre'] == 'type')
		   $Tri ="  vino_type.type";
		if( $filter['filtre'] == 'pays')
		   $Tri ="  vino_bouteille.pays ";
		if( $filter['filtre'] == 'millesime')
		   $Tri ="  vino_bouteille.millesime";
		if( $filter['filtre'] == 'date_achat')
		   $Tri ="  vino_bouteille.date_achat";
		if( $filter['filtre'] == 'code_saq')
		   $Tri ="  vino_bouteille.code_saq";
		if( $filter['filtre'] == 'quantite')
		   $Tri ="  vino_bouteille.quantite ";
		if( $filter['filtre'] == 'notes')
		   $Tri ="  vino_contient.notes ";
		if( $filter['filtre'] == 'prix_saq')
		   $Tri ="  vino_bouteille.prix_saq ";
		}
		$requete = "SELECT 
						vino_bouteille.id as id_bouteille_cellier,
						vino_bouteille.nom,
						vino_bouteille.vote,
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
						INNER JOIN vino_cellier ON vino_bouteille.cellier_id=vino_cellier.id 
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						JOIN vino_usagers ON vino_usagers.id = vino_cellier.usager_id
						WHERE vino_usagers.id = " .$_SESSION["UserID"]." AND vino_cellier.id = ". $id . ' AND ' . $where." ORDER BY ".$Tri." ASC";

        $res = $this->_db->query($requete);
        $data = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
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
	public function sauvegarderCellier($nomCellier, $usager_id)
	{
		
		$requete = "INSERT into vino_cellier(nom, usager_id) VALUE (?, ?)";
		
        $stmt = $this->_db->prepare($requete);
		$stmt->bind_param('si', $nomCellier, $usager_id);
		$stmt->execute();
	}

	/**
	* Fonction de sauvegarde d'une bouteille dans un cellier
	* 
	* @param $cellier_id l'id du cellier
	* @param $bouteille_id l'id de la bouteille
	* @param $quantite quantité 
	* @param $date_achat date d'achat de la bouteille
	* @param $notes notes 
	*/
	public function sauvegarderBouteilleCellier($cellier_id, $bouteille_id, $quantite, $date_achat, $notes)
	{
		
		$requete = "INSERT into vino_contient(cellier_id, bouteille_id, quantite, date_achat, notes) VALUE (?, ?, ?, ?, ?)";
		
        $stmt = $this->_db->prepare($requete);
		$stmt->bind_param('iiiss', $cellier_id, $bouteille_id, $quantite, $date_achat, $notes);
		$stmt->execute();
	}

	/**
	 * Cette méthode de chercher un cellier dans la table vino_cellier
	 * @param string $nomCellier nom du cellier
	 * 
	 * @return retourne l'occurence.
	 */
	public function chercherCellier($nomCellier)
	{
			
		$requete = "SELECT nom From vino_cellier WHERE nom = '$nomCellier'";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	/**
	 * Cette méthode de chercher un cellier dans la table vino_cellier
	 * @param integer $id id du cellier
	 * 
	 * @return retourne l'occurence.
	 */
	public function cellierParId($id)
	{
			
		$requete = "SELECT id, nom as nomCellier From vino_cellier WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	/**
	 * Cette méthode permet d'obtenir une bouteille par id
	 * @param integer $id id de la bouteille
	 * 
	 * @return retourne l'occurence.
	 */
	public function bouteilleParId($id)
	{
			
		$requete = "SELECT * From vino_bouteille WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	/**
	 * Cette méthode permet de retirer une bouteille d'un cellier
	 * 
	 * @param int $id id de la bouteille
	 * 
	 * @return retourne l'occurence.
	 */
	public function retirerBouteilleCellier($id)
	{
			
		$requete = "DELETE From vino_bouteille WHERE id = $id";
		$res = $this->_db->query($requete);
        $rangee = $res->fetch_assoc();
		return $rangee;
		
	}

	// LES STATISTIQUES---------------------------------*

	/**
	* Fonction pour récupérer nombre de celliers
	* @return $rangees résultat de la requête
	*/
	public function nombreCelliers()
	{
			       			
		$requete = "SELECT COUNT(id) as nombreCelliers FROM vino_cellier";
		$resultat = $this->_db->query($requete);
        $rangee = $resultat->fetch_assoc();
		return $rangee;

	}

	/**
	* Fonction pour récupérer nombre de bouteilles de SAQ importées
	* @return $rangees résultat de la requête
	*/
	public function nombreBouteillesSAQimporte()
	{
			       			
		$requete = "SELECT COUNT(id) as nombreSAQ FROM vino_saq";
		$resultat = $this->_db->query($requete);
        $rangee = $resultat->fetch_assoc();
		return $rangee;

	}


	/**
	* Fonction pour récupérer nombre de celliers par usager
	* @return $rangees résultat de la requête
	*/
	public function nombreCelliersParUsager()
	{
			       			
		$requete = "SELECT vino_usagers.nom, vino_usagers.prenom,  COUNT(vino_cellier.usager_id) as nombreCelliersParUsager 
					FROM vino_usagers
					LEFT JOIN vino_cellier ON vino_usagers.id = vino_cellier.usager_id
					Group by vino_usagers.id
					Order by nombreCelliersParUsager DESC";

		$resultat = $this->_db->query($requete);
  
		if($resultat->num_rows)
		{
			while($rangee = $resultat->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;

	}

	/**
	* Fonction pour récupérer nombre de bouteilles par cellier et calculer la valeur des bouteilles par cellier
	* @return $rangees résultat de la requête
	*/
	public function nombreBouteillesParCellier()
	{
			       			
		$requete = "SELECT vino_cellier.nom, COUNT(vino_bouteille.id) as nombreBouteillesParCellier, 
					sum(vino_bouteille.prix_saq) as valeurBouteillesParCellier
					FROM vino_cellier
					LEFT JOIN vino_bouteille ON vino_bouteille.cellier_id = vino_cellier.id
					Group by vino_cellier.id
					Order by nombreBouteillesParCellier DESC";

		$resultat = $this->_db->query($requete);
  
		if($resultat->num_rows)
		{
			while($rangee = $resultat->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		 
		return $rangees;

	}

	/**
	* Fonction pour récupérer nombre de bouteilles par usager et calculer la valeur des bouteilles par usager
	* @return $rangees résultat de la requête
	*/
	public function nombreBouteillesParUsager()
	{
			       			
		$requete = "SELECT vino_usagers.nom, vino_usagers.prenom,  

					COUNT(vino_bouteille.cellier_id) as nombreBouteillesParUsager,
					SUM(vino_bouteille.prix_saq) as valeurBouteillesParUsager
					FROM vino_usagers
					LEFT JOIN vino_cellier ON vino_usagers.id = vino_cellier.usager_id
					LEFT JOIN vino_bouteille ON vino_cellier.id = vino_bouteille.cellier_id 
					Group by vino_usagers.id
					Order by nombreBouteillesParUsager DESC";

		$resultat = $this->_db->query($requete);
  
		if($resultat->num_rows)
		{
			while($rangee = $resultat->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;

	}

	/**
	* Fonction pour calculer la valeur de toutes les bouteilles
	* @return $rangees résultat de la requête
	*/
	public function valeurBouteilleTous()
	{
			       			
		$requete = "SELECT sum(vino_bouteille.prix_saq) as valeurBouteilleTous
					FROM vino_bouteille";
		$resultat = $this->_db->query($requete);
        $rangee = $resultat->fetch_assoc();
		return $rangee;

	}


	/**
	* Fonction pour calculer la valeur des bouteilles par usager
	* @return $rangees résultat de la requête
	*/
	public function valeurBouteilleParUsager()
	{
			       			
		$requete = "SELECT vino_usagers.nom, vino_usagers.prenom, sum(vino_bouteille.prix_saq) as valeurBouteilleParUsager
			FROM vino_usagers
			LEFT JOIN vino_cellier ON vino_usagers.id = vino_cellier.usager_id
			LEFT JOIN vino_bouteille ON vino_cellier.id = vino_bouteille.cellier_id 
			Group by vino_usagers.id
			Order by valeurBouteilleParUsager DESC
			";

		$resultat = $this->_db->query($requete);
  
		if($resultat->num_rows)
		{
			while($rangee = $resultat->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;

	}

	/**
	 * Fonction RecupererBouteillesParUsager Pour récupérer la liste des bouteilles par usager
	 * 
	 * @param $id id de la bouteille cellier
	 * @return $row détails d'un cellier
	 */
	public function RecupererBouteillesParUsager($idUsager, $idCellier)
	{
		$rangees = array();		
		$requete = "SELECT 
					count(vino_bouteille.id) as nombreBouteilles
					

					from vino_cellier
					JOIN vino_usagers ON vino_usagers.id = vino_cellier.usager_id
					JOIN vino_bouteille ON vino_cellier.id = vino_bouteille.cellier_id

					
					WHERE vino_usagers.id = ". $id;
		$res = $this->_db->query($requete);
        if($res->num_rows)
		{
			while($rangee = $res->fetch_assoc())
			{
				$rangees[] = $rangee;
			}
		}
		
		return $rangees;
	
	}

	/**
	 * Cette méthode permet de ajouter des vote vers la bouteille 
	 * 
	 * @param int $id id de la bouteille
	 * @param int $vote etoile qu'on a donne pour la bouteille
	 * @return retourne l'occurence.
	 */
	public function vote($id, $vote)
	{
		$requete = "UPDATE vino_bouteille SET vote = '". $vote. "' WHERE id = ". $id;
		$res = $this->_db->query($requete);
        return $res;
	}






}





?>