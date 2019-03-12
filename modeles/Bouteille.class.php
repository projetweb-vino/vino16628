<?php
/**
 * Class Bouteille
 * Cette classe possède les fonctions de gestion des bouteilles dans le cellier et des bouteilles dans le catalogue complet.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Bouteille extends Modele {
	const TABLE = 'vino_bouteille';
    
	public function getListeBouteille()
	{
		
		$rows = Array();
		$res = $this->_db->query('Select * from '. self::TABLE);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
		}
		
		return $rows;
	}
	
	public function getListeBouteilleCellier()
	{
		
		$rows = Array();
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
				while($row = $res->fetch_assoc())
				{
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 //$this->_db->error;
		}
		
		
		
		return $rows;
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
		
		$rows = Array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/","%" , $nom);
		 
		//echo $nom;
		$requete ='SELECT id, nom FROM vino_bouteille where LOWER(nom) like LOWER("%'. $nom .'%") LIMIT 0,'. $nb_resultat; 
		//var_dump($requete);
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
					
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de données", 1);
			 
		}
		
		
		//var_dump($rows);
		return $rows;
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
			
		$requete = "SELECT quantite From vino_contient WHERE bouteille_id = $id";
		$res = $this->_db->query($requete);
        $row = $res->fetch_assoc();
		return $row;
		
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
		//TODO : Valider les données.
		//var_dump($data);	
		
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
			
			
		$requete = "UPDATE vino_contient SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE bouteille_id = ". $id;
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
						vino_contient.quantite,
						vino_contient.date_achat,
						vino_contient.notes,
						vino_type.type

						from vino_bouteille
						INNER JOIN vino_contient ON vino_contient.bouteille_id = vino_bouteille.id
						INNER JOIN vino_cellier ON vino_contient.cellier_id = vino_cellier.id
						INNER JOIN vino_type ON vino_bouteille.type_id = vino_type.id
						WHERE vino_bouteille.id = ". $id;
		$res = $this->_db->query($requete);
        $row = $res->fetch_assoc(); 	
		return $row;
	
	}
	/**
	* Fonction sauvegarderModife Pour souvgrader les modification sur le cellier
	* 
	* @param $id id de la bouteille cellier
	* @param $dateachat date d'achat de la bouteille cellier
	* @param $notes notes
	* @param $quantite quantités
	* @param $Garde à garder jusqu'à ? (date)
	* @param $prix prix
	* @param $mille millesime
	 */
	public function sauvegarderModife($id, $nom, $dateachat, $notes, $quantite, $Garde, $prix, $mille ,$description, $type_id)
	{
		
		$requete = "UPDATE vino_bouteille SET nom = '$nom', description = '$description' , garde_jusqua = '$Garde' , prix_saq = $prix,  millesime = $mille ,  type_id = $type_id  WHERE id = $id";
		//echo $requete;
        $res = $this->_db->query($requete);

        $requete = "UPDATE vino_contient SET quantite = $quantite, date_achat = '$dateachat' ,  notes = '$notes' WHERE bouteille_id = $id";
        //echo $requete;
        $res = $this->_db->query($requete);
       	
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
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
		}
		
		return $rows;
	
	}
}





?>