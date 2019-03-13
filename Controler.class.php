<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			// Si le paramètre est envoyé
			if (isset($_REQUEST['requete'])) {

				switch ($_REQUEST['requete']) {
					case 'listeBouteille':
						$this->listeBouteille();
						break;
					case 'autocompleteBouteille':
						$this->autocompleteBouteille();
						break;
					case 'ajouterNouvelleBouteilleCellier':
						$this->ajouterNouvelleBouteilleCellier();
						break;
					case 'ajouterBouteilleCellier':
						$this->ajouterBouteilleCellier();
						break;
					case 'modifierBouteilleCellier':
							$id = $_GET["id"];
							$this->modifierBouteilleCellier($id);
							break;
					case 'sauvegarder':
					if (isset($_POST['id'],$_POST['nom'], $_POST['date_achat'], $_POST['notes'], $_POST['quantite'], $_POST['garde_jusqua'], $_POST['prix_saq'], $_POST['pays'],$_POST['millesime'], $_POST['description'], $_POST['type'], $_POST['format'])){

							$this->sauvegardeModifierCellier($_POST['id'], $_POST['nom'], $_POST['date_achat'], $_POST['notes'], $_POST['quantite'], $_POST['garde_jusqua'], $_POST['prix_saq'], $_POST['pays'], $_POST['millesime'], $_POST['description'], $_POST['type'], $_POST['format']);
						}
							break;		
					case 'boireBouteilleCellier':
						$this->boireBouteilleCellier();
						break;
					default:
						$this->accueil();
						break;
				}
			}
			// Sinon on affiche l'accueil
			else{
				$this->accueil();
			}		
		}

		private function accueil()
		{
			$bte = new Bouteille();
            $data = $bte->getListeBouteilleCellier();
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
                  
		}
		

		private function listeBouteille()
		{
			$bte = new Bouteille();
            $cellier = $bte->getListeBouteilleCellier();
            
            echo json_encode($cellier);
                  
		}
		
		private function autocompleteBouteille()
		{
			$bte = new Bouteille();
			//var_dump(file_get_contents('php://input'));
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
            $listeBouteille = $bte->autocomplete($body->nom);
            
            echo json_encode($listeBouteille);
                  
		}
		private function ajouterNouvelleBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				
				//var_dump($data);
				$resultat = $bte->ajouterBouteilleCellier($body);
				echo json_encode($resultat);
			}
			else{
				include("vues/entete.php");
				include("vues/ajouter.php");
				include("vues/pied.php");
			}
			
            
		}
		
		private function boireBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
			// Fair appel à la fonction de récupération de la quantité
			$resultat = $bte->recupererQuantite($body->id);
			echo json_encode($resultat);
		}

		private function ajouterBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
			// Fair appel à la fonction de récupération de la quantité
			$resultat = $bte->recupererQuantite($body->id);
			echo json_encode($resultat);
		}
		/**
		* Fonction modifier cellier
		* 
		* @param $id id de la bouteille cellier
		*/
		private function modifierBouteilleCellier($id)
		{	
			$bte = new Bouteille();
			// Récupérer la bouteille par id
			$data = $bte->RecupererCellierParId($id);
			$data['types'] = $bte->RecupererTypes();
            include("vues/entete.php");
            // Afficher la vue modifier
			include("vues/modifier.php");
			include("vues/pied.php");       
		}
		/**
		* Fonction sauvgarder modifier cellier
		* 
		* @param $id id de la bouteille cellier
		* @param $nom nom de la bouteille cellier
		* @param $dateachat la date d'achat de la bouteille cellier
		* @param $notes la note de la bouteille cellier
		* @param $quantite la quantite de la bouteille cellier
		* @param $Garde Garde de la bouteille cellier
		* @param $prix prix de la bouteille cellier
		* @param $mille année de la bouteille cellier
		* @param $description la description de la bouteille cellier
		* @param $type_id le id de type de la bouteille cellier
		*/
		private function sauvegardeModifierCellier($id, $nom,$dateachat, $notes, $quantite, $Garde, $prix, $pays, $mille, $description , $type_id, $format)
		{
			$bte = new Bouteille();
			// Faire appel à la fonction de sauvegarde
			$data = $bte->sauvegarderModife($id, $nom, $dateachat, $notes, $quantite, $Garde, $prix, $pays, $mille ,$description, $type_id, $format);
			// Afficher l'accueil
			$this->accueil();
		}
		
}
?>















