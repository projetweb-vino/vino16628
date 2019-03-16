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

					case "Login":
						// var_dump('login');                            
			        	if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
			        	{
			        		$usager = new Usager();
	           				$data = $usager->Authentification($_REQUEST["username"],$_REQUEST["password"]);
			        		
			        		if($data)
			        		{
			        			$_SESSION["UserID"] = $data["id"];
	                            $_SESSION["UserName"] = $_REQUEST["username"];
	//                            $_SESSION["Role"] = $user['idRole'];
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


		        	case "Enregistrer":
			        	// var_dump(($_REQUEST["username"]), ($_REQUEST["password"]),($_REQUEST["nom"]), ($_REQUEST["prenom"]) ,($_SESSION["UserID"]));
	                    $err = array();

			        	if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["nom"]) && isset($_REQUEST["prenom"]) && !isset($_SESSION["UserID"]))
			        	{
			        		if(!preg_match("/^[a-zA-Z0-9]+$/",$_REQUEST['username']))
	                        {
	                            $err[] = "Login peut etre seulement de lettre et chifres";
	                        }
	                        if(strlen($_REQUEST['username']) < 3 or strlen($_REQUEST['username']) > 30)
	                        {
	                            $err[] = "Login dois avoir plus au moin du 3 simboles et pas plus 30";
	                        }

	                          # on verifi, si existe usager avec la meme nom
	                        
	                        // $requete = "SELECT COUNT(id) as c FROM vino_usagers WHERE username='".$_REQUEST['username']."'";
	                       
	                        // $resultat = $resultat->fetch_assoc(); 
	                        $usager = new Usager();
							// Faire appel à la fonction de sauvegarde
							$resultat = $usager->testUser($_REQUEST['username']);
							
							var_dump($resultat['c']);
	                        if($resultat['c'] > 0)
	                        {
	                            $err[] = "Usager avec la meme nom existe";
	                        }
	                        if(count($err) == 0)
	                        {
	                        	$Enregistrer = $usager->Enregistrer($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['nom'], $_REQUEST['prenom']);
	                            if($Enregistrer) 
	                            { 
	                                $_SESSION["UserID"] = $_REQUEST["username"];
	                                $this->cellierUsager($_SESSION["UserID"]);
	                            }
	                        }
	                        else{
	                            $messageErreur = implode(',', $err);
	                            require_once(__DIR__."/vues/formEnregistrer.php");
	                        }
		                }
		                else
		                {
		                        require_once(__DIR__."/vues/formEnregistrer.php");
		                }
				    	break;


				    	case 'cellier': 
						    $this->cellierUsager($_SESSION["UserID"], isset($_GET['filter']) && is_array($_GET['filter']) ? $_GET['filter'] : array());
		                    require_once(__DIR__."/vues/cellier.php");
						break; 
			         	case "Logout":                           
						//delete la session en lui assignant un tableau vide
						        	$_SESSION = array();
						//delete le cookie de session en créant un nouveau cookie avec la date d'expiration dans le passé
						        	if(isset($_COOKIE[session_name()]))
						        	{
						        		setcookie(session_name(), '', time() - 3600);
						        	}
						//détruire la session
						        	session_destroy();
						        require_once(__DIR__."/vues/login.php");
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

		private function cellierUsager($idUsager, $filter = array())
		{
			$bte = new Usager();
            $data = $bte->getCellier($idUsager, $filter);
            $cbte = new Bouteille();
            $dat['cellier'] = $cbte->CellierParUsager($idUsager);
            $pays = $cbte->GetPays();
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















