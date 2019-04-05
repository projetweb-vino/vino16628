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

					case 'bouteilleParId':
						$this->bouteilleParId();
						break;

					case 'bouteille':
						$id = $_GET["id"];
						$this->bouteille($id);
						break;

					case 'autocompleteBouteille':
						$this->autocompleteBouteille();
						break;

					case 'ajouterBouteilleSAQ':
						//tester si usager est authentifié
						if (isset($_SESSION["UserID"])) {
							$this->ajouterBouteilleSAQ($_POST['id_cellier'], $_POST['nom'], $_POST['image'], $_POST['code_saq'], $_POST['pays'], $_POST['description'], $_POST['prix_saq'], $_POST['url_saq'], $_POST['url_img'], $_POST['format'], $_POST['type_id'], $_POST['quantite'], $_POST['notes'], $_POST['garde_jusqua'],  $_POST['notes'], $_POST['millesime']);
						}
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
						break;

					case 'ajouterNouvelleBouteilleCellier':
						//tester si usager est authentifié
						if (isset($_SESSION["UserID"])) {
							$this->ajouterNouvelleBouteilleCellier();
						}else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
						break;
						

					case 'ajouterBouteilleCellier':
						//tester si usager est authentifié
						if (isset($_SESSION["UserID"])) {
							$this->ajouterBouteilleCellier();
						}else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
						break;

					case 'ajouterBouteilleNonListe':
						//tester si usager est authentifié
						if (isset($_SESSION["UserID"])) {
							// Déclarer un tableau
							$message = array();
							
							// Validation de formulaire
                            $message = $this->valideFormAjout($_REQUEST['nom'], $_REQUEST['millesime'], $_REQUEST['quantite'], $_REQUEST['pays'], $_REQUEST['prix_saq'], $_REQUEST['format'], $_REQUEST['date_achat'], $_REQUEST['garde_jusqua'], $_REQUEST['id_formulaire'], $_REQUEST['description'], $_REQUEST['notes'], $_REQUEST['image']);

							if(count($message) ==0){
								//tester si la bouteille existe déja
								$bouteilleNonlistee = $this->verifierbouteille($_REQUEST['nom'],$_REQUEST['cellier_id']);
								
								if($bouteilleNonlistee == ''){
																
								$this->ajouterBouteilleNonListe($_REQUEST['cellier_id'], $_REQUEST['nom'], $_REQUEST['type_id'], $_REQUEST['millesime'], $_REQUEST['quantite'], $_REQUEST['pays'], $_REQUEST['prix_saq'], $_REQUEST['notes'], $_REQUEST['format'], $_REQUEST['date_achat'], $_REQUEST['garde_jusqua'], $_REQUEST['image'], $_REQUEST['description'], $_REQUEST['code_saq'], $_REQUEST['url_saq'], $_REQUEST['url_img']);
								$this->accueil();
								}else{
									if (isset($_REQUEST['id_formulaire'])) {

										$message['vide1'] = "la bouteille existe déjà";
									}else{
										$message['vide2'] = "la bouteille existe déjà";
									}
									
			        				$this->afficheformulaireMessages($message,$_REQUEST['nom'],$_REQUEST['nom'], $_REQUEST['millesime'], $_REQUEST['quantite'], $_REQUEST['pays'], $_REQUEST['prix_saq'], $_REQUEST['format'], $_REQUEST['date_achat'], $_REQUEST['garde_jusqua'], $_REQUEST['id_formulaire'], $_REQUEST['description'], $_REQUEST['notes'], $_REQUEST['image']);
								}
							}else{
								$this->afficheformulaireMessages($message,$_REQUEST['nom'], $_REQUEST['millesime'], $_REQUEST['quantite'], $_REQUEST['pays'], $_REQUEST['prix_saq'], $_REQUEST['format'], $_REQUEST['date_achat'], $_REQUEST['garde_jusqua'], $_REQUEST['id_formulaire'], $_REQUEST['description'], $_REQUEST['notes'], $_REQUEST['image']);
							}
						}else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
						break;


					case 'modifierBouteilleCellier':

						$id = $_GET["id"];
						$this->modifierBouteilleCellier($id);
						break;

					case 'CellierParUsager':
						$this->accueil();
						break;

					case 'cellierParid':
						$this->cellierParid();
						break;

					case 'monCompte':
						$this->monCompte();
						break;

					case 'bouteilleParCellier':
						$this->bouteilleParCellier($_REQUEST['id'], empty($_REQUEST['filter']) ? array() : $_REQUEST['filter']);
						break;

					case 'ajouterCellier':
						$this->ajouterCellier($_REQUEST['nomCellier']);
						break;

					case 'importer':
					   
						
						// $debut = $_REQUEST['debut'];
						$nombreProduit = $_REQUEST['nombre'];
				        require_once(__DIR__."/dataconf.php");
				        require_once(__DIR__."/config.php");
				
						$saq = new SAQ();
						$nombre = $saq->getProduits($nombreProduit,0);
				        $this->accueil();
						break;

					case 'sauvegarder':
						//tester si usager est connecté 
						if (isset($_SESSION["UserID"])) {
							// Tester si les paramêtres sont envoyés
							if (isset($_REQUEST['id'],$_REQUEST['nom'], $_REQUEST['date_achat'], $_REQUEST['notes'], $_REQUEST['quantite'], $_REQUEST['garde_jusqua'], $_REQUEST['prix_saq'], $_REQUEST['pays'],$_REQUEST['millesime'], $_REQUEST['description'], $_REQUEST['type'], $_REQUEST['format']))
							{
								// Déclarer un tableau
								$message = array();

								// Valider que les paramètres sont valides
	                            $message = $this->valideFormModif($_REQUEST['nom'], $_REQUEST['date_achat'], $_REQUEST['quantite'], $_REQUEST['garde_jusqua'], $_REQUEST['prix_saq'], $_REQUEST['pays'],$_REQUEST['millesime'], $_REQUEST['description'], $_REQUEST['format']);
	                            
	                            // Si le message est vide
	                            // Ce qui signifie qu'il y'a pas eu d'erreurs
	                            if(count($message) ==0)
	                            {
	                            	// On procède à la modification
									$this->sauvegardeModifierCellier($_REQUEST['id'], $_REQUEST['nom'], $_REQUEST['date_achat'], $_REQUEST['notes'], $_REQUEST['quantite'], $_REQUEST['garde_jusqua'], $_REQUEST['prix_saq'], $_REQUEST['pays'], $_REQUEST['millesime'], $_REQUEST['description'], $_REQUEST['type'], $_REQUEST['format']);
								}
								// Sinon on affiche le formulaire de modification avec l'ensemble des erreurs
								else{
									$this->modifierBouteilleCellier($_REQUEST['id'], $message);

								}
							}
						}
						else{
							require_once(__DIR__."/vues/login.php");

						}
						break;

					case 'sauvegarderBouteilleCellier':
						//tester si usager est connecté 
						if (isset($_SESSION["UserID"])) {
							// Tester si les paramêtres sont envoyés
							if (isset($_REQUEST['cellier'],$_REQUEST['bouteille'],$_REQUEST['quantite'], $_REQUEST['date_achat'] )){

								$this->sauvegarderBouteilleCellier($_REQUEST['cellier'], $_REQUEST['bouteille'], $_REQUEST['quantite'], $_REQUEST['date_achat'],$_REQUEST['notes'] );
							}
						}
						else{
							require_once(__DIR__."/vues/login.php");

						}

						break;	

					case 'boireBouteilleCellier':
						$this->boireBouteilleCellier();
						break;

					case 'retirerBouteilleCellier':
						$this->retirerBouteilleCellier();
						break;

					case "Login":
					                           
			        	if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
			        	{
			        		$usager = new Usager();
	           				$data = $usager->Authentification($_REQUEST["username"],$_REQUEST["password"]);
			        		// Si l'authentification est effectuée avec succès
			        		if($data)
			        		{
			        			// Initialiser les variables session
			        			$_SESSION["UserID"] = $data["id"];
			        			$_SESSION["nom"] = $data["nom"];
			        			$_SESSION["prenom"] = $data["prenom"];
			        			$_SESSION["admin"] = $data["admin"];
	                            $_SESSION["UserName"] = $_REQUEST["username"];

			        			$this->cellierUsager($_SESSION["UserID"]);
			        		}
			        		// Sinon on affiche un message d'erreur dans la page login
			        		else
			        		{
			        			$messageErreur = "Nom d'utilisateur ou mot de passe invalide";
			        			require_once(__DIR__."/vues/login.php");
			        		}
			        	}
			        	else
			        	{
			        		require_once(__DIR__."/vues/login.php");
			        	}
		        		break; 

		        	case "ChangerMotDePass":

		        		//tester si un usager est authentifié
						if (isset($_SESSION["UserID"])) {
		        	    
			        	    if(isset($_REQUEST["password"]) && isset($_REQUEST["nom"]) && isset($_REQUEST["prenom"]) && isset($_REQUEST["username"]) && isset($_REQUEST["passwordNouveau"]) && isset($_REQUEST["passwordRepeat"]) )
				        	{

				        		// Déclarer un tableau
								$message = array();

								// Valider les paramètres
	                            $message = $this->valideFormModifierUsager($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['username'], $_REQUEST['passwordNouveau'], $_REQUEST['passwordRepeat'], $_REQUEST['password']);
	                                       
	                            // Si le message est vide
	                            // Ce qui signifie qu'il y'a pas eu d'erreurs
	                            // On procède à la modification des informations
	                            if(count($message) ==0)
		                        {
		                        		                        	
		                        	$usager = new Usager();

		                        	$data = $usager->modifierUsager($_SESSION["UserID"], $_REQUEST['username'], $_REQUEST['passwordNouveau'], $_REQUEST['nom'], $_REQUEST['prenom']);
		                        	
		                  
		                            if($data) 
		                            { 
		                            	// Initialiser les variables session
	                                    $_SESSION["UserID"] = $data["id"];
	                                    $_SESSION["nom"] = $_REQUEST["nom"];
				        			    $_SESSION["prenom"] = $_REQUEST["prenom"];
						        	    $_SESSION["UserName"] = $_REQUEST["username"];
		                                $_SESSION["admin"] = 'non';

				                       	$nombreSAQ = $this->nombreSAQ();
				                        require_once(__DIR__."/vues/entete.php");
			        				    require_once(__DIR__."/vues/monCompte.php");
			        				    require_once(__DIR__."/vues/pied.php");
				                       
		                            }
		                        }
		                        else{
		                          	$nombreSAQ = $this->nombreSAQ();
		                            require_once(__DIR__."/vues/entete.php");
			        				require_once(__DIR__."/vues/monCompte.php");
			        				require_once(__DIR__."/vues/pied.php");
		                        }
			                }
			                else
			                {
			                	$nombreSAQ = $this->nombreSAQ();
			                    $this->monCompte();
			                }
			            }
			        	else
			        	{
			        		require_once(__DIR__."/vues/login.php");
			        	}

				    	break;
		        		
		        	case "Enregistrer":
		        		
	                   	if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["passwordRepeat"]) && isset($_REQUEST["nom"]) && isset($_REQUEST["prenom"]) && !isset($_SESSION["UserID"]))
			        	{
			        		// Déclarer un tableau
							$message = array();

							// Valider les paramètres
                            $message = $this->valideFormEnregistrer($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['username'], $_REQUEST['password'], $_REQUEST['passwordRepeat']);
                     	                        
	                        
	                        // Si le message est vide
                            // Ce qui signifie qu'il y'a pas eu d'erreurs
                            // On procède à l'enregistrement
                            if(count($message) ==0)
	                        {
	                        	
	                        	$usager = new Usager();

	                        	$enregistrer = $usager->Enregistrer($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['nom'], $_REQUEST['prenom']);
	                  
	                            if($enregistrer) 
	                            { 
	                               // Initialiser les variables session
                                   $_SESSION["UserID"] = $enregistrer["id"];
                                   $_SESSION["nom"] = $_REQUEST["nom"];
			        			   $_SESSION["prenom"] = $_REQUEST["prenom"];
					        	   $_SESSION["UserName"] = $_REQUEST["username"];
	                               $_SESSION["admin"] = 'non';

			                       $this->cellierUsager($_SESSION["UserID"]);
	                            }
	                        }
	                        else{
	                            
	                            require_once(__DIR__."/vues/formEnregistrer.php");
	                        }
		                }
		                else
		                {
		                    require_once(__DIR__."/vues/formEnregistrer.php");
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
						require_once("vues/login.php");
						break;
					// Par défaut afficher l'accueil (login ou cellier)
					default:
						$this->accueil();
						break;

					// Statistiques
					case 'statistiques':
						// Si l'usager est authentifié et Administrateur
						if (isset($_SESSION["UserID"]) &&  $_SESSION["admin"] =='oui') {
							$this->statistiques();
						}
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
						break;

					case 'listeUsagers':
						// Si l'usager est authentifié et Admnistrateur
						if (isset($_SESSION["UserID"]) &&  $_SESSION["admin"] =='oui') {
	                        $usager = new Usager();	
			        		$data = $usager->listeUsagers();
			        		$nombreSAQ = $this->nombreSAQ();
			        		require_once(__DIR__."/vues/entete.php");
			        		require_once(__DIR__."/vues/pageUsagers.php");
			        		require_once(__DIR__."/vues/pied.php");
							break;
						}
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}

					// Gestion des usagers
					case 'supprimerUsagers':
						// Si l'usager est authentifié et Admnistrateur
						if (isset($_SESSION["UserID"]) &&  $_SESSION["admin"] =='oui') {
                        	$this->supprimerUsagers();
                        }
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
                        break;
                    // la page de formulaire pour indiquer une erreur
					case 'indiquer':
						// Si l'usager est authentifié 
						if (isset($_SESSION["UserID"])) {
                        	$this->formulaireErreur();
                        }
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
                        break;
                    // le sauvgarde de l'indication qui la laisser l'usager
					case 'sauvagrdeindication':
						// Si l'usager est authentifié 
						if (isset($_SESSION["UserID"]) &&  $_SESSION["admin"] =='non') {

							if (isset($_SESSION ['nom']) && isset($_SESSION ['prenom'])) {
								// var_dump($_SESSION ['nom'], $_SESSION ['prenom'],$_REQUEST["titre"], $_REQUEST["texteerreurs"]);
                        		$this->sauvagrdeindication($_SESSION ['nom'], $_SESSION ['prenom'],$_REQUEST["titre"], $_REQUEST["texteerreurs"]);
							}
                        }
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
                        break;    
                    // la liste des erreurs
					case 'listeerreurs':
						// Si l'usager est authentifié et Admnistrateur
						if (isset($_SESSION["UserID"]) &&  $_SESSION["admin"] =='oui') {
                        	$this->ListeErreur();
                        }
						else{
							// Sinon on affiche le login
							require_once(__DIR__."/vues/login.php");
						}
                        break;        

                    case "vote":
				    	$this->vote();
				    	break;

				    case "nombreBouteillesBu":
				    	$this->nombreBouteillesBue();
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
		* Fonction d'affichage des détails d'une bouteille par id
		* 
		*/
		private function bouteilleParId()
		{
			$bte = new Bouteille();
			$body = json_decode(file_get_contents('php://input'));
			$Bouteille = $bte->bouteilleParId($body->id);
            
            echo json_encode($Bouteille);
                  
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
			if (isset($_SESSION["UserID"])) {
			$body = json_decode(file_get_contents('php://input'));
				if(!empty($body)){
					$bte = new Bouteille();
					$resultat = $bte->ajouterBouteilleCellier($body);
					echo json_encode($resultat);
				}
				else{
					$bte = new Bouteille();
					// Récupérer la liste des celliers par usager
					$data = $bte->CellierParUsager($_SESSION["UserID"] );
					// Récupérer la liste des bouteilles
					$dataSAQ = $bte->ListeBouteilleSAQ();
					// $dat = $bte->getListeBouteille();
					// Récupérer les types
					$datas = $bte->RecupererTypes();
					$nombreSAQ = $this->nombreSAQ();

					include("vues/entete.php");
					include("vues/ajouter.php");
					include("vues/pied.php");
				}
			}else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
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
			// Calculer le nombre de bouteilles bu dans un temps donné
			$champ = 'nombreBu';
			$nombreBouteillesBu = $bte->nombreBouteillesBu($champ);
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
			// Calculer le nombre de bouteilles ajoutées dans un temps donné
			$champ = 'nombreAjoute';
			$nombreBouteillesBu = $bte->nombreBouteillesBu($champ);
			// Fair appel à la fonction de récupération de la quantité
			$resultat = $bte->recupererQuantite($body->id);
			echo json_encode($resultat);
		}

		/**
		* Fonction de modification d'une bouteille dans un cellier
		* 
		* @param $id id de la bouteille cellier
		*/
		private function modifierBouteilleCellier($id, $message='')
		{
			if (isset($_SESSION["UserID"])) {	
				$bte = new Bouteille();
				$compteur = $bte->RecupererBouteillesParUsager($id);
				if ($compteur[0]['nombreBouteilles'] != 0) {
									
					// Récupérer la bouteille par id
					$data = $bte->RecupererCellierParId($id);
					$data['types'] = $bte->RecupererTypes();
					$nombreSAQ = $this->nombreSAQ();
		            include("vues/entete.php");
		            // Afficher la vue modifier
					include("vues/modifier.php");
					include("vues/pied.php"); 
				}
				else{
					$this->accueil();
				}
			} 
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}

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
		* Fonction sauvegarder bouteille dans un cellier
		* 
		* @param $cellier_id id du cellier
		* @param $bouteille_id id de la bouteille
		*/
		private function sauvegarderBouteilleCellier($cellier_id, $bouteille_id,$quantite, $date_achat, $notes)
		{
			$bte = new Bouteille();
			// Faire appel à la fonction de sauvegarde
			$data = $bte->sauvegarderBouteilleCellier($cellier_id, $bouteille_id, $quantite, $date_achat, $notes);
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
            $cellier = new Bouteille();
            // Récupérer les cellier par usager authentifié
            $dat= $cellier->CellierParUsager($idUsager);
            // Récupérer le nombre de bouteilles SAQ importées
            $nombreSAQ = $this->nombreSAQ();

			include("vues/entete.php");
			include("vues/mesCelliers.php");
			include("vues/pied.php");
    	}

    	/**
		* Fonction d'affichage des détails d'une bouteille par id
		* 
		*/
		private function bouteille($id)
		{
			$bte = new Bouteille();
			// $body = json_decode(file_get_contents('php://input'));
			$bouteille = $bte->bouteilleParId($id);
			// var_dump($data);
			// include("vues/entete.php");
			include("vues/bouteille.php");
			// include("vues/pied.php");
            
                  
		}

    	/**
		* Fonction de gestion d'un compte
		* 
		* @param $idUsager id de l'usager
		*/
		private function monCompte()
		{
			if (isset($_SESSION["UserID"])) {
			
		
				$bte = new Usager();
				$data = $bte->obtenirUsager($_SESSION['UserID']);
	                  
				$nombreSAQ = $this->nombreSAQ();
				include("vues/entete.php");
				include("vues/monCompte.php");
				include("vues/pied.php");
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
    	}

    	/**
		* Fonction de modification de la quantité dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function bouteilleParCellier($id, $filter = array())
		{
			// Si l'usager est authentifié
			if (isset($_SESSION["UserID"])) {
				$bte = new Bouteille();
				$data = $bte->RecupererBouteilleParCellier($id, $filter);
				$dat['nomCellier'] = $bte->cellierParId($id);
							
				$pays = $bte->GetPays();
				$nombreSAQ = $this->nombreSAQ();
				include("vues/entete.php");
				include("vues/cellier.php");
				include("vues/pied.php");
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
		}
		/**
		* Fonction Pour vérifier si la bouteille si existe ou non dans le cellier
		* 
		* @return $data
		*/
		private function verifierbouteille($nom, $cellier_id)
		{
				
			$bte = new Bouteille();
			$data = $bte->verifierbouteilleNonlistee($nom, $cellier_id);
			return $data ;
			
		}

		/**
		* Fonction d'ajout d'une bouteille non listées et listées
		* 
		* @return $resultat Sous format json
		*/
		private function ajouterBouteilleNonListe($cellier_id, $nom, $type_id, $millesime, $quantite, $pays, $prix_saq, $notes, $format, $date_achat, $garde_jusqua, $image_uploads, $description, $code_saq, $url_saq, $url_img)
		{
				
			$bte = new Bouteille();
			$data = $bte->ajouterBouteilleNonListe($cellier_id, $nom, $type_id, $millesime, $quantite, $pays, $prix_saq, $notes, $format, $date_achat, $garde_jusqua, $image_uploads, $description, $code_saq, $url_saq, $url_img);
		}
		/**
		* Fonction affiche les deux formulaires avec les messages d'erreurs et les valeurs des champs
		* 
		*/
		private function afficheformulaireMessages($erreurs, $nom, $millesime , $quantite, $pays, $prix, $format, $date_achat, $garde_jusqua, $id_formulaire, $description, $notes, $image)
		{	
			$message = array();
			$champs = array();
			$message = $erreurs;
			$champs['nom'] = $nom;
			$champs['millesime'] = $millesime;
			$champs['quantite'] = $quantite;
			$champs['pays'] = $pays;
			$champs['prix'] = $prix;
			$champs['format'] = $format;
			$champs['date_achat'] = $date_achat;
			$champs['garde_jusqua'] = $garde_jusqua;
			$champs['description'] = $description;
			$champs['notes'] = $notes;
			$champs['image'] = $image;
			$champs['id_formulaire'] =$id_formulaire;
			$bte = new Bouteille();
			// Récupérer la liste des celliers par usager
			$data = $bte->CellierParUsager($_SESSION["UserID"] );
			// Récupérer la liste des bouteilles
			// $dat = $bte->ListeBouteilleSAQ();
			$dat = $bte->getListeBouteille();
			// Récupérer les types
			$datas = $bte->RecupererTypes();
			$nombreSAQ = $this->nombreSAQ();
			require_once(__DIR__."/vues/entete.php");
		    require_once(__DIR__."/vues/ajouter.php");
		    require_once(__DIR__."/vues/pied.php");
    	}

		/**
		* Fonction d'ajout d'un cellier
		* 
		* @param $nomCellier le nom du cellier
		*/
		private function ajouterCellier($nomCellier)
		{
			$bte = new Bouteille();
			$existe = $bte->chercherCellier($nomCellier);
			
			if ($existe ==null)  {
				$data = $bte->sauvegarderCellier($nomCellier, $_SESSION['UserID']);
				
			}
			else
    		{
    			$messageErreur = "Un cellier portant ce nom existe déjà !";
    			
    		}
			$dat = $bte->CellierParUsager($_SESSION["UserID"] );
			$nombreSAQ = $this->nombreSAQ();
			include("vues/entete.php");
			include("vues/mesCelliers.php");
			include("vues/pied.php");
		}

		/**
		* Fonction d'ajout d'une bouteille dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function cellierParid()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->cellierParId($body->id);
			
			echo json_encode($resultat);
		}

		/**
		* Fonction d'ajout d'une bouteille dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function ajouterBouteilleSAQ($id_cellier, $nom, $image, $code_saq, $pays, $description, $prix_saq, $url_saq, $url_img, $format, $type_id, $quantite, $notes, $garde_jusqua, $millesime)
		{
			
			
			$bte = new Bouteille();
			
			$resultat = $bte->ajouterBouteilleSAQ($id_cellier, $nom, $image, $code_saq, $pays, $description, $prix_saq, $url_saq, $url_img, $format, $type_id, $quantite, $notes, $garde_jusqua,  $notes, $millesime);
			
			$this->accueil();
		}

		/**saqParID
		* Fonction d'ajout d'une bouteille dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function retirerBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->retirerBouteilleCellier($body->id);
			
			echo ($resultat);
		}
		
		/**
		* Fonction affiche le formulaire avec les données
		* 
		*/
		private function formulaireErreur()
		{
			if (isset($_SESSION["UserID"])) {
				include("vues/entete.php");
				include("vues/indiqueerreur.php");
				include("vues/pied.php");
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
		}
		
		/**
		* Fonction affiche le liste des erreurs
		* 
		*/
		private function ListeErreur()
		{
			if (isset($_SESSION["UserID"])) {
				$bte = new Bouteille();
				$data = $bte->RecupererErreurs();
				$nombreSAQ = $this->nombreSAQ();
				include("vues/entete.php");
				include("vues/Listeerreurs.php");
				include("vues/pied.php");
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
		}
		/**
		* Fonction sauvegarder indication des erreurs
		* 
		* @param $nom de l'usager
		* @param $prenom de l'usager
		* @param $titre de l'indication 
		* @param $texte de l'indication 
		*/
		private function sauvagrdeindication($nom, $prenom,$titre, $texte)
		{

			// Si l'usager est authentifié
			if (isset($_SESSION["UserID"])) {
				$btte = new Bouteille();
				// Faire appel à la fonction de sauvegarde
				$data = $btte->SauvagrdIndication($nom, $prenom,$titre, $texte);
				// Afficher l'accueil
				$this->accueil();
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
		}
		/**
		* Fonction de validation de modification d'une bouteille
		* 
		* @param $nom nom de la bouteille cellier
		* @param $dateachat la date d'achat de la bouteille cellier
		* @param $quantite la quantité de la bouteille cellier
		* @param $Garde à garder jusqu'à quand la bouteille cellier
		* @param $prix prix de la bouteille cellier
		* @param $pays pays de la bouteille cellier
		* @param $mille année de la bouteille cellier
		* @param $description la description de la bouteille cellier
		* @param $format le format de la bouteille cellier
		* @return $msgErreur messages d'erreur
		*/
        public function valideFormModif($nom, $dateachat, $quantite, $Garde, $prix, $pays, $millesime ,$description, $format)
        {
        	// Si l'usager est authentifié
			if (isset($_SESSION["UserID"])) {
				$msgErreur = array();
           
	            // Trimer les variables
	            $nom = trim($nom);
	            $pays = trim($pays);
	            $format = trim($format);
	            $prix = trim($prix);
	            $quantite = trim($quantite);

	            // Validation du nom de la bouteille
	            if($nom == ""){
	                $msgErreur['erreur_nom'] = "Le nom ne peut être vide !";
	            }
	            
	            // Validation date d'achat
	            if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i", $dateachat)) {
				    $msgErreur['erreur_date_achat'] = "La date est invalide !";
				}
	            
	            // Validation quantité
	            if(!is_numeric($quantite) || !preg_match("/^([1-9]|[1-9]\d|[1-9]\d\d)$/i", $quantite) ){
	                $msgErreur['erreur_quantite']= "La quantité est invalide !";
	            }
	            // Validation garder jusqu'à
	            if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i", $Garde)) {
				    $msgErreur['erreur_garde_jusqua'] = "La date est invalide !";
				}

				// Validation du millesime (année)
	            if (!preg_match("/^[12][0-9]{3}$/i", $millesime)) {
				    $msgErreur['erreur_millesime'] = "La date est invalide !";
				}

				// Validation du prix
				if(!is_float($prix) && !is_numeric($prix)){
	                $msgErreur['erreur_prix'] = "Le prix n'est pas valide !";
				}

				// Validation du pays
				if(!preg_match("/^[a-zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?[a-zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zàáâäçèéêëìíîïñòóôöùúûü]+$/i", $pays)){
	                $msgErreur['erreur_pays'] = "Le pays ne peut être vide ou il est invalide !<br>";
	            }
	            
           		// Retourner un message d'erreur
           		return $msgErreur;
			}
			else{
				// Sinon on affiche le login
				require_once(__DIR__."/vues/login.php");
			}
            
        }
        /**
		* Fonction de validation d'ajout d'une bouteille listées et non listées
		* 
		* @param $nom nom de la bouteille cellier
		* @param $date_achat la date d'achat de la bouteille cellier
		* @param $quantite la quantité de la bouteille cellier
		* @param $garde_jusqua à garder jusqu'à quand la bouteille cellier
		* @param $prix prix de la bouteille cellier
		* @param $pays pays de la bouteille cellier
		* @param $millesime année de la bouteille cellier
		* @param $format le format de la bouteille cellier
		* @param $description la description de la bouteille cellier
		* @param $notes les notes de la bouteille cellier
		* @param $image l'image de la bouteille cellier
		* @return $msgErreur messages d'erreur
		*/
        public function valideFormAjout($nom, $millesime , $quantite, $pays, $prix, $format, $date_achat, $garde_jusqua, $id_formulaire, $description, $notes, $image)
        {
            $msgErreur = array();
           
            // Trimer les variables
            $nom = trim($nom);
            $pays = trim($pays);
            $format = trim($format);
            $prix = trim($prix);
            $quantite = trim($quantite);
            $millesime = trim($millesime);
            if ($id_formulaire == '1') {
            
	            // Validation du nom de la bouteille
	            if($nom == ""){
	                $msgErreur['erreur_nom'] = "Le nom ne peut être vide !";
	            }
	            // Validation du description de la bouteille
	            if($description == ""){
	                $msgErreur['erreur_description'] = "La description ne peut être vide !";
	            }
	            // Validation du image de la bouteille
	            if($image == ""){
	                $msgErreur['erreur_image'] = "L'image ne peut être vide !";
	            }
	            // Validation du notes de la bouteille
	             if($notes == ""){
	                $msgErreur['erreur_notes'] = "les notes ne peut être vide !";
	            }
	             // Validation du format
				if ($format == "") {
				    $msgErreur['erreur_format'] = "La format est invalide !";
				}
					            
	            // Validation date d'achat
	            if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i", $date_achat)) {
				    $msgErreur['erreur_date_achat'] = "La date est invalide !";
				}
	            
	            // Validation quantité
	            if(!is_numeric($quantite) || !preg_match("/^([1-9]|[1-9]\d|[1-9]\d\d)$/i", $quantite) ){
	                $msgErreur['erreur_quantite']= "La quantité est invalide !";
	            }
	            // Validation garder jusqu'à
	            if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i", $garde_jusqua)) {
				    $msgErreur['erreur_garde_jusqua'] = "La date est invalide !";
				}

				// Validation du millesime (année)
	            if (!preg_match("/^[12][0-9]{3}$/i", $millesime)) {
				    $msgErreur['erreur_millesime'] = "La date est invalide !";
				}

				// Validation du prix
				if(!is_float($prix) && !is_numeric($prix)){
	                $msgErreur['erreur_prix'] = "Le prix n'est pas valide !";
				}

				// Validation du pays
				// if(!preg_match("/^[a-zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?[a-zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zàáâäçèéêëìíîïñòóôöùúûü]+$/i", $pays)){
				if($pays == ""){
	                $msgErreur['erreur_pays'] = "Le pays est invalide !<br>";
	            }

	           if ($format =='') {
				    $msgErreur['erreur_format'] = "La format est invalide !";
				}

			   if ($id_formulaire == '2') {
            
	            // Validation du nom de la bouteille
	            if($nom == ""){
	                $msgErreur['erreur_nom2'] = "Le nom ne peut être vide !";
	            }
	            // Validation du description de la bouteille
	            if($description == ""){
	                $msgErreur['erreur_description2'] = "La description ne peut être vide !";
	            }
	            // Validation du image de la bouteille
	            if($image == ""){
	                $msgErreur['erreur_image2'] = "L'image ne peut être vide !";
	            }
	            // Validation du notes de la bouteille
	             if($notes == ""){
	                $msgErreur['erreur_notes2'] = "les notes ne peut être vide !";
	            }
	             // Validation du format
				if ($format == "") {
				    $msgErreur['erreur_format2'] = "La format est invalide !";
				}
	            
	            // Validation date d'achat
	            if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i", $date_achat)) {
				    $msgErreur['erreur_date_achat2'] = "La date d'achat est invalide !";
				}
	            
	            // Validation quantité
	            if(!is_numeric($quantite) || !preg_match("/^([1-9]|[1-9]\d|[1-9]\d\d)$/i", $quantite) ){
	                $msgErreur['erreur_quantite2']= "La quantité est invalide !";
	            }
	            // Validation garder jusqu'à
	            if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i", $garde_jusqua)) {
				    $msgErreur['erreur_garde_jusqua2'] = "La date est invalide !";
				}

				// Validation du millesime (année)
	            if (!preg_match("/^[12][0-9]{3}$/i", $millesime)) {
				    $msgErreur['erreur_millesime2'] = "La date est invalide !";
				}

				// Validation du prix
				if(!is_float($prix) && !is_numeric($prix)){
	                $msgErreur['erreur_prix2'] = "Le prix n'est pas valide !";
				}

				// Validation du pays
				if($pays == ""){
	                $msgErreur['erreur_pays2'] = "Le pays est invalide !<br>";
	            }

	            // Validation du format
				if ($format =='') {
				    $msgErreur['erreur_format2'] = "La format est invalide !";
				}

			}
            
            // Retourner un message d'erreur
            return $msgErreur;
        }

        /**
		* Fonction de validation du formulaire d'enregistrement
		* 
		* @param $nom nom de l'usager
		* @param $prenom le prénom de l'usager
		* @param $nomUsager le nom d'utilisateur
		* @param $motDePasse le mot de passe
		* @param $motDePasseConfirm le mot de passe de confirmation
		* @return $msgErreur messages d'erreur
		*/
        public function valideFormEnregistrer($nom, $prenom, $nomUsager, $motDePasse, $motDePasseConfirm)
        {
            $msgErreur = array();
           
            // Trimer les variables
            $nom = trim($nom);
            $prenom = trim($prenom);
            $nomUsager = trim($nomUsager);
            $motDePasse = trim($motDePasse);
            $motDePasseConfirm = trim($motDePasseConfirm);

            // Validation du nom
            if($nom == "" || !preg_match("/^[a-zA-Z]+$/i", $nom)){
                $msgErreur['erreur_nom'] = "Le nom doit avoir que des lettres !";
            }

            // Validation du prénom
            if($prenom == "" || !preg_match("/^[a-zA-Z]+$/i", $prenom)){
                $msgErreur['erreur_prenom'] = "Le prénom doit avoir que des lettres !";
            }

            // Validation du nom d'usager 
            if($nomUsager == "" || !preg_match("/^[A-Za-z][A-Za-z0-9_]{5,29}$/i", $nomUsager)){
                $msgErreur['erreur_nomUsager'] = "Le nom d'usager doit avoir minimum 5 lettres et ne doit pas commencer par un chiffre !";
            }
                            
            // Validation du mot de passe
            if($motDePasse == '' || !preg_match("/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,20}$/i", $motDePasse) ){
                $msgErreur['erreur_motDePasse']= "Le mot de passe doit avoir minimum une lettre, un chiffre et doit être d'une longueur minimum de 6 caractères !";
            }

            // Validation du mot de passe de confirmation
            if($motDePasse != $motDePasseConfirm){
                $msgErreur['erreur_motDePasseConfirm']= "Le mot de passe doit être identique !";
            }

            // Verifier si un usager portant le même nom d'utilisateur existe déjà
            $usager = new Usager();
			// Faire appel à la fonction de sauvegarde
			$resultat = $usager->testUser($nomUsager);

            if($resultat['c'] > 0)
            {
                $msgErreur['erreur_existe'] = "Ce nom d'utilisateur existe déjà !";
            }

            // Retourner un message d'erreur
            return $msgErreur;
        }

        /**
		* Fonction de validation du formulaire de modification des informations d'un usager
		* 
		* @param $nom nom de l'usager
		* @param $prenom le prénom de l'usager
		* @param $nomUsager le nom d'utilisateur
		* @param $motDePasse le mot de passe (facultatif)
		* @param $motDePasseConfirm le mot de passe de confirmation (facultatif)
		* @param $motDePasseActuel le mot de passe actuel (facultatif)
		* @return $msgErreur messages d'erreur
		*/
        public function valideFormModifierUsager($nom, $prenom, $nomUsager, $motDePasse='', $motDePasseConfirm='', $motDePasseActuel = '')
        {
            $msgErreur = array();
           
            // Trimer les variables
            $nom = trim($nom);
            $prenom = trim($prenom);
            $nomUsager = trim($nomUsager);
            $motDePasse = trim($motDePasse);
            $motDePasseConfirm = trim($motDePasseConfirm);
            $motDePasseActuel = trim($motDePasseActuel);


            // Validation du nom
            if($nom == "" || !preg_match("/^[a-zA-Z]+$/i", $nom)){
                $msgErreur['erreur_nom'] = "Le nom doit avoir que des lettres !";
            }

            // Validation du prénom
            if($prenom == "" || !preg_match("/^[a-zA-Z]+$/i", $prenom)){
                $msgErreur['erreur_prenom'] = "Le prénom doit avoir que des lettres !";
            }

            // Validation du nom d'usager 
            if($nomUsager == "" || !preg_match("/^[A-Za-z][A-Za-z0-9_]{5,29}$/i", $nomUsager)){
                $msgErreur['erreur_nomUsager'] = "Le nom d'usager doit avoir minimum 5 lettres et ne doit pas commencer par un chiffre !";
            }

            // Ne pas prendre en compte les erreurs si les champs concernant le mot de passe 
            // sont vides
	        if ($motDePasse !='' || $motDePasseConfirm !='' || $motDePasseActuel !='') {
	                           
	            // Validation du mot de passe
	            if($motDePasse == '' || !preg_match("/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,20}$/i", $motDePasse) ){
	                $msgErreur['erreur_motDePasse']= "Le mot de passe doit avoir minimum une lettre, un chiffre et doit être d'une longueur minimum de 6 caractères !";
	            }

	            // Validation du mot de passe de confirmation
	            if($motDePasse != $motDePasseConfirm){
	                $msgErreur['erreur_motDePasseConfirm']= "Le mot de passe doit être identique !";
	            }

	            // Validation du mot de passe actuel
	            $usager = new Usager();	
	    		if(!$usager->Authentification($_SESSION["UserName"],$motDePasseActuel)) {
	    			$msgErreur['erreur_invalide']= 'Mot de passe invalide !';
	    		}
            }

            // Retourner un message d'erreur
            return $msgErreur;
        }

        /**
		* Fonction d'affichage des statistiques
		* 
		*/
		private function statistiques()
		{	
			
			$bte = new Usager();
			// Récupérer la liste des bouteilles par cellier que possède un usager authentifié
            $data = $bte->getCellier($_SESSION['UserID']);
            $cellier = new Bouteille();
            // Récupérer les cellier par usager authentifié
            $dat['cellier'] = $cellier->CellierParUsager($_SESSION['UserID']);



            // $dat['nomCellier'] = $cellier->cellierParId($id=1);
            $dat['nomCellier'] = $cellier->RecupererCellierParUsager($_SESSION['UserID']);

            // Le nombre d'usagers
            $nombreUsagers = $bte->nombreUsagers();

            // Le nombre de celliers
            $nombreCelliers = $cellier->nombreCelliers();

			// Le nombre de celliers par usager
            $nombreCelliersParUsagers = $cellier->nombreCelliersParUsager();

            // Le nombre de bouteilles par cellier
            $nombreBouteillesParCellier = $cellier->nombreBouteillesParCellier();

            // Le nombre de bouteilles par usager
            $nombreBouteillesParUsager = $cellier->nombreBouteillesParUsager();

            // La valeur totale des bouteilles
            $valeurBouteilleTous = $cellier->valeurBouteilleTous();

            // La valeur des bouteilles par usager
            $valeurBouteilleParUsager = $cellier->valeurBouteilleParUsager();

            // Les dates
            $dates = $cellier->stats();

            $nombreSAQ = $this->nombreSAQ();
            include("vues/entete.php");
            // Afficher la vue statistiques
			include("vues/statistiques.php");
			include("vues/pied.php");       
		}

		/**
		* Fonction supprimerUsagers, l'Admin peux supprimer des usagers avec ses celliers
		* 
		* @return $resultat Sous format json
		*/

        private function supprimerUsagers()
		{
			if(strtolower($_SESSION['admin']) != 'oui') die ('Accès refusé');
			$body = json_decode(file_get_contents('php://input'));
			$usager = new Usager(); 
			$resultat = $usager->supprimerUsagers($body->id);			
			
			echo json_encode($resultat);
		}
		
		/**
		* Fonction voter, on peux mettre des etoiles apres boire la bouteille
		* 
		* @return $resultat Sous format json
		*/
		private function vote()
		{
			$body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$vote = (int)$body->vote;
			if($vote < 1 || $vote > 5) return;
			$resultat = $bte->vote($body->id, $vote);
			echo json_encode($resultat);
		}

		/**
		* Fonction de récupération du nombre de bouteille de la SAQ importées
		* 
		*/
		private function nombreSAQ()
		{
			
            $cellier = new Bouteille();
           
            // Récupérer le nombre de bouteilles SAQ importées
            $nombreSAQ = $cellier->nombreBouteillesSAQimporte();

            return $nombreSAQ;

    	}
    	
    	/**
		* Fonction qui récupère le nombre de bouteilles bu à une date donnée
		* 
		* @return $resultat Sous format json
		*/
		private function nombreBouteillesBue()
		{
			$body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			// $vote = (int)$body->vote;
			// if($vote < 1 || $vote > 5) return;
			$resultat = $bte->nombreBouteillesBuParDate($body->id);
			echo json_encode($resultat);
		}
}
?>















