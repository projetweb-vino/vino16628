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
class Usager extends Modele {
	const TABLE = 'vino_usagers';
    

	/**
	* Fonction d'authentification 
	* 
	* @param $username le nom de l'usager
	* @param $password le mot de passe de l'usager
	* @param $nom le nom de l'usager
	* @param $prenom le prenom de l'usager
	* @return $row ou false le mot de passe de l'usager
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
	public function Enregistrer($username, $password, $nom, $prenom)
		{
			$password = md5($password);
			$requete = "INSERT into vino_usagers(username, password, nom, prenom) VALUE ('$username', '$password', '$nom', '$prenom')";
			$res = $this->_db->query($requete);
 		}
	public function getCellier($idUsager, $filter = array())
		{
			global $connexion;
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
			
	//		$requete = "SELECT * from vino_cellier JOIN vino_bouteille ON vino_cellier.id_bouteille=vino_bouteille.id WHERE vino_cellier.id_usager = ".$_SESSION["UserID"];
	        $requete = "SELECT * from vino_cellier JOIN vino_contient ON vino_cellier.id=vino_contient.cellier_id JOIN vino_bouteille ON vino_contient.bouteille_id=vino_bouteille.id JOIN vino_type ON vino_type.id = vino_bouteille.type_id WHERE vino_cellier.usager_id = ".$idUsager.' AND '.$where;
	        //echo $requete;
	        $resultat = mysqli_query($connexion, $requete);
			$rangees = array();
	        while($rangee = mysqli_fetch_assoc($resultat))
			{
				$rangees[] = $rangee;
			}
			return $rangees;
		}
	
	public function testUser($username)
	{
			global $connexion;
	//		$requete = "SELECT * from vino_cellier JOIN vino_bouteille ON vino_cellier.id_bouteille=vino_bouteille.id WHERE vino_cellier.id_usager = ".$_SESSION["UserID"];
	       			
			$requete = "SELECT COUNT(id) as c FROM vino_usagers WHERE username= '".$username."'";
			$res = $this->_db->query($requete);
	        $row = $res->fetch_assoc();
			return $row;
	}
}




?>