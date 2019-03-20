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

// On démarre une session
session_start();

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

				// Le switch
				switch ($_REQUEST['requete']) {

					case 'listeBouteille':
						$this->listeBouteille();
						break;
					case 'recherche':

							$this->cellierUsagerFiltre($_SESSION["UserID"], $_POST['nom'],$_POST['type'], $_POST['pays'], $_POST['millesime'], $_POST['quantite'], $_POST['prix_saq'], $_POST['filtre']="");
						break;
					case 'CellierParFiltre':

							$this->cellierUsagerFiltre($_SESSION["UserID"], $_POST['nom']="",$_POST['type']="", $_POST['pays']="", $_POST['millesime']="", $_POST['quantite']=0, $_POST['prix_saq']=0.0, $_POST['filtre']);
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

					case 'ajouterBouteilleNonListe':
						// $this->ajouterBouteilleNonListe();
						// Tester si les paramêtres sont envoyés
						if (isset($_POST['id'],$_POST['nom'], $_POST['date_achat'], $_POST['notes'], $_POST['quantite'], $_POST['garde_jusqua'], $_POST['prix_saq'], $_POST['pays'],$_POST['millesime'], $_POST['description'], $_POST['type'], $_POST['format'])){

							$this->ajouterBouteilleNonListe($_POST['id'], $_POST['nom'], $_POST['date_achat'], $_POST['notes'], $_POST['quantite'], $_POST['garde_jusqua'], $_POST['prix_saq'], $_POST['pays'], $_POST['millesime'], $_POST['description'], $_POST['type'], $_POST['format']);
						}
						break;


					case 'modifierBouteilleCellier':
						$id = $_GET["id"];
						$this->modifierBouteilleCellier($id);
						break;

					case 'CellierParUsager':
						$this->accueil();
						break;

					case 'bouteilleParCellier':
						$this->bouteilleParCellier($_REQUEST['id']);
						break;

					case 'importer':
						require("dataconf.php");
						require("config.php");
						$debut = $_REQUEST['debut'];
						$nombreProduit = $_REQUEST['nombre'];
						
						$saq = new SAQ();
						$nombre = $saq->getProduits($nombreProduit,$debut);
						echo json_encode($nombre);
						break;

					case 'sauvegarder':
						// Tester si les paramêtres sont envoyés
						if (isset($_POST['id'],$_POST['nom'], $_POST['date_achat'], $_POST['notes'], $_POST['quantite'], $_POST['garde_jusqua'], $_POST['prix_saq'], $_POST['pays'],$_POST['millesime'], $_POST['description'], $_POST['type'], $_POST['format'])){

							$this->sauvegardeModifierCellier($_POST['id'], $_POST['nom'], $_POST['date_achat'], $_POST['notes'], $_POST['quantite'], $_POST['garde_jusqua'], $_POST['prix_saq'], $_POST['pays'], $_POST['millesime'], $_POST['description'], $_POST['type'], $_POST['format']);
						}
						break;	

					case 'boireBouteilleCellier':
						$this->boireBouteilleCellier();
						break;

					case "Login":
					                           
			        	if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
			        	{
			        		$usager = new Usager();
	           				$data = $usager->Authentification($_REQUEST["username"],$_REQUEST["password"]);
			        		
			        		if($data)
			        		{
			        			$_SESSION["UserID"] = $data["id"];
			        			$_SESSION["nom"] = $data["nom"];
			        			$_SESSION["prenom"] = $data["prenom"];
			        			$_SESSION["admin"] = $data["admin"];


	                            $_SESSION["UserName"] = $_REQUEST["username"];

			        			$this->cellierUsager($_SESSION["UserID"]);
			        		}
			        		else
			        		{
			        			$messageErreur = "Mauvaise combinaison username/password";
			        			require_once(__DIR__."/vues/login.php");
			        		}
			        	}
			        	else
			        	{
			        		require_once(__DIR__."/vues/login.php");
			        	}
		        		break; 

		        	case "Logout":
						//delete la session en lui assignant un tableau vide
						$_SESSION = array();
						
						//delete le cookie de session en créant un nouveau cookie avec la date d'expiration
						//dans le passé
						if(isset($_COOKIE[session_name()]))
						{
							setcookie(session_name(), '', time() - 3600);
						}
						
						//détruire la session
						session_destroy();
						require_once("vues/Login.php");
						break;
					// Par défaut afficher l'accueil (login ou cellier)
					default:
						$this->accueil();
						break;
				}
			}
			// Sinon on affiche l'accueil (soit login ou les celliers par usager)
			else{
				
				$this->accueil();
			}		
		}

		/**
		* Fonction d'affichage de l'accueil (soit le login, si l'usager n'est pas authentifié sinon la * liste des celliers par usager)
		* 
		*/
		private function accueil()
		{
			// Si l'usager est authentifié
			if (isset($_SESSION["UserID"])) {
				// On affiche la liste des celliers par usager
				$this->cellierUsager($_SESSION["UserID"]);
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
                  
		}
		
		/**
		* Fonction d'affichage de la liste des bouteilles
		* 
		*/
		private function listeBouteille()
		{
			$bte = new Bouteille();
            $cellier = $bte->getListeBouteilleCellier();
            
            echo json_encode($cellier);
                  
		}
		
		/**
		* Fonction d'auto-completion
		* 
		* @return $listeBouteille Sous format json
		*/
		private function autocompleteBouteille()
		{
			$bte = new Bouteille();
			$body = json_decode(file_get_contents('php://input'));
			$listeBouteille = $bte->autocomplete($body->nom);
            
            echo json_encode($listeBouteille);
                  
		}
		/**
		* Fonction d'ajout d'une Bouteille au cellier
		* 
		* @return $resultat Sous format json
		*/
		private function ajouterNouvelleBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$bte = new Bouteille();
				$resultat = $bte->ajouterBouteilleCellier($body);
				echo json_encode($resultat);
			}
			else{
				$bte = new Bouteille();
				// $data = $bte->RecupererBouteilleParCellier($id);
				$data = $bte->CellierParUsager($_SESSION["UserID"] );
				include("vues/entete.php");
				include("vues/ajouter.php");
				include("vues/pied.php");
			}
		}
		
		/**
		* Fonction de modification de la quantité dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function boireBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
			// Fair appel à la fonction de récupération de la quantité
			$resultat = $bte->recupererQuantite($body->id);
			echo json_encode($resultat);
		}

		/**
		* Fonction d'ajout d'une bouteille dans le cellier
		* 
		* @return $resultat Sous format json
		*/
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
		* Fonction de modification d'une bouteille dans un cellier
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
		* @param $Garde à garder jusqu'à quand la bouteille cellier
		* @param $prix prix de la bouteille cellier
		* @param $pays pays de la bouteille cellier
		* @param $mille année de la bouteille cellier
		* @param $description la description de la bouteille cellier
		* @param $type_id le id de type de la bouteille cellier
		* @param $format le format de la bouteille cellier
		*/
		private function sauvegardeModifierCellier($id, $nom,$dateachat, $notes, $quantite, $Garde, $prix, $pays, $mille, $description , $type_id, $format)
		{
			$bte = new Bouteille();
			// Faire appel à la fonction de sauvegarde
			$data = $bte->sauvegarderModife($id, $nom, $dateachat, $notes, $quantite, $Garde, $prix, $pays, $mille ,$description, $type_id, $format);
			// Afficher l'accueil
			$this->accueil();
		}

		/**
		* Fonction de modification d'une bouteille dans un cellier
		* 
		* @param $idUsager id de l'usager
		*/
		private function cellierUsager($idUsager)
		{
			$bte = new Usager();
			// Récupérer la liste des bouteilles par cellier que possède un usager authentifié
            $data = $bte->getCellier($idUsager);
            $cellier = new Bouteille();
            // Récupérer les cellier par usager authentifié
            $dat['cellier'] = $cellier->CellierParUsager($idUsager);
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
    	}

    	/**
		* Fonction de modification de la quantité dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function bouteilleParCellier($id)
		{
			// $body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$data = $bte->RecupererBouteilleParCellier($id);
			$dat['cellier'] = $bte->CellierParUsager($_SESSION["UserID"] );
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
		}

		/**
		* Fonction d'ajout d'une bouteille non listée
		* 
		* @return $resultat Sous format json
		*/
		private function ajouterBouteilleNonListe($id, $nom, $date_achat, $notes, $quantite, $garde_jusqua, $prix_saq, $pays, $millesime, $description, $type, $format)
		{
			// $body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$data = $bte->ajouterBouteilleNonListe($id, $nom, $date_achat, $notes, $quantite, $garde_jusqua, $prix_saq, $pays, $millesime, $description, $type, $format);
			// $dat['cellier'] = $bte->CellierParUsager($_SESSION["UserID"] );
			include("vues/entete.php");
			include("vues/ajouter.php");
			include("vues/pied.php");
		}

		/**
		* Fonction affiche la listes des bouteille par usager et avec le triage et le recherche
		* 
		* @param $idUsager id de l'usager
		* @param $nom nom de bouteille 
		* @param $type type de bouteille 
		* @param $pays pays de fabrication de bouteille
		* @param $millesime annee
		* @param $quantite la quantite des bouteilles
		* @param $prix_saq de bouteille
		* @param $filtre le variable de triage
		*/
		private function cellierUsagerFiltre($idUsager, $nom, $type, $pays, $millesime, $quantite, $prix_saq, $filtre)
		{   
				
			$usg = new Usager();
			
			// Récupérer la liste des bouteilles par usager et avec les variables de recherche et le fariable de triage
            $data = $usg->getCellierFiltre($idUsager, $nom, $type, $pays, $millesime, $quantite, $prix_saq, $filtre);
            $cellier = new Bouteille();
           
            // Récupérer les cellier par usager authentifié
            $dat['cellier'] = $cellier->CellierParUsager($idUsager);
          
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
    	}

}
?>















