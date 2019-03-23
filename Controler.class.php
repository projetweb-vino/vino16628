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

					case 'cellierParid':
						$this->cellierParid();
						break;

					case 'bouteilleParCellier':
						$this->bouteilleParCellier($_REQUEST['id'], empty($_REQUEST['filter']) ? array() : $_REQUEST['filter']);
						break;

					case 'ajouterCellier':
						$this->ajouterCellier($_REQUEST['nomCellier']);
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
						break;

					case 'sauvegarderBouteilleCellier':
						// Tester si les paramêtres sont envoyés
						if (isset($_REQUEST['cellier'],$_REQUEST['bouteille'],$_REQUEST['quantite'], $_REQUEST['date_achat'] )){

							$this->sauvegarderBouteilleCellier($_REQUEST['cellier'], $_REQUEST['bouteille'], $_REQUEST['quantite'], $_REQUEST['date_achat'],$_REQUEST['notes'] );
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
		        	case "ChangerMotDePass":
		        		$error = '';
		        		if(isset($_REQUEST["password"]) && isset($_REQUEST["passwordNouveau"]) && isset($_REQUEST["passwordRepeat"]) && ($_REQUEST["passwordNouveau"] == $_REQUEST["passwordRepeat"]))
			        	{	
			        		 if(strlen($_REQUEST['username']) < 3 or strlen($_REQUEST['username']) > 30)
	                        {
	                            $err[] .= "Login dois avoir plus au moin du 3 simboles et pas plus 30";
	                        }
	                        
			        		$usager = new Usager();	
			        		if(!$usager->ChangerMotDePass($_SESSION["UserName"],$_REQUEST["password"], $_REQUEST["passwordNouveau"])) {
			        			$error = 'Invalid password';
			        		}
			        		else{
			        			header('Location: '.URL_ROOT.'index.php?requete=cellier');
			        			exit;
			        		}

			        	}	else {
			        		$error = 'Invalid data';
			        	}
			        	require_once(__DIR__."/vues/changerMotDepass.php");
		        	    break;
		        		
		        	case "Enregistrer":
			        	
	                    $err = array();
	                   	if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["passwordRepeat"]) && isset($_REQUEST["nom"]) && isset($_REQUEST["prenom"]) && !isset($_SESSION["UserID"]))
			        	{
			        		if(!preg_match("/^[a-zA-Z0-9]+$/",$_REQUEST['username']))
	                        {
	                            $err[] = "Login peut avoir seulement de lettre et chifres";
	                        }
	                        if(($_REQUEST["passwordRepeat"]) != ($_REQUEST['password']))
	                        {
	                            $err[] .= "Mot de pass pas idantiques"."</br>";
	                        }
	                        if(strlen($_REQUEST['username']) < 3 or strlen($_REQUEST['username']) > 30)
	                        {
	                            $err[] .= "Login dois avoir plus au moin du 3 simboles et pas plus 30";
	                        }
	                        if(!preg_match("/^[a-zA-Z]+$/",$_REQUEST['nom']))
	                        {
	                            $err[] .= "Nom dois avoir que des lettres "."</br>";
	                        }
	                        if(!preg_match("/^[a-zA-Z]+$/",$_REQUEST['prenom']))
	                        {
	                            $err[] .= "Prenom dois avoir que des lettres"."</br>";
	                        }
	                        	                       
	                        $usager = new Usager();
							// Faire appel à la fonction de sauvegarde
							$resultat = $usager->testUser($_REQUEST['username']);
				
	                        if($resultat['c'] > 0)
	                        {
	                            $err[] = "Usager avec la meme nom existe";
	                        }
	                        
	                        if(count($err) == 0)
	                        {
	                        	$enregistrer = $usager->Enregistrer($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['nom'], $_REQUEST['prenom']);
	                  
	                            if($enregistrer) 
	                            { 

                                   $_SESSION["UserID"] = $enregistrer["id"];
					        	   $_SESSION["prenom"] = $_REQUEST["prenom"];
	                               $_SESSION["UserName"] = $_REQUEST["username"];

			                       $this->cellierUsager($_SESSION["UserID"]);
	                            }
	                        }
	                        else{
	                            $messageErreur = implode(' ', $err);
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
				$dat = $bte->getListeBouteille();
				$datas = $bte->RecupererTypes();

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
		private function modifierBouteilleCellier($id, $message='')
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
            $data = $bte->getCellier($idUsager);
            $cellier = new Bouteille();
            // Récupérer les cellier par usager authentifié
            $dat['cellier'] = $cellier->CellierParUsager($idUsager);
            $dat['nomCellier'] = $cellier->cellierParId($id=1);
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
    	}

    	/**
		* Fonction de modification de la quantité dans le cellier
		* 
		* @return $resultat Sous format json
		*/
		private function bouteilleParCellier($id, $filter = array())
		{
			// $body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$data = $bte->RecupererBouteilleParCellier($id, $filter);
			$dat['cellier'] = $bte->CellierParUsager($_SESSION["UserID"] );
			$dat['nomCellier'] = $bte->cellierParId($id);
			
			$pays = $bte->GetPays();
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
		* Fonction d'ajout d'un cellier
		* 
		* @param $nomCellier le nom du cellier
		*/
		private function ajouterCellier($nomCellier)
		{
			// $body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$existe = $bte->chercherCellier($nomCellier);
			
			if ($existe ==null)  {
				$data = $bte->sauvegarderCellier($nomCellier, $_SESSION['UserID']);
				
			}
			else
    		{
    			$messageErreur = "Un cellier portant ce nom existe déjà !";
    			
    		}
			$dat['cellier'] = $bte->CellierParUsager($_SESSION["UserID"] );
			// $dat['cellier'] = $bte->CellierParUsager($_SESSION["UserID"] );
			include("vues/entete.php");
			include("vues/cellier.php");
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
		private function retirerBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->retirerBouteilleCellier($body->id);
			
			echo ($resultat);
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

		
}
?>















