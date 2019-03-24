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

					case 'ajouterBouteilleSAQ':
						$this->ajouterBouteilleSAQ($_POST['id_cellier'], $_POST['nom'], $_POST['image'], $_POST['code_saq'], $_POST['pays'], $_POST['description'], $_POST['prix_saq'], $_POST['url_saq'], $_POST['url_img'], $_POST['format'], $_POST['type_id'], $_POST['quantite'], $_POST['notes'], $_POST['garde_jusqua'],  $_POST['notes'], $_POST['millesime']);
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
					   
						
						$debut = $_REQUEST['debut'];
						$nombreProduit = $_REQUEST['nombre'];
				        require_once(__DIR__."/dataconf.php");
				        require_once(__DIR__."/config.php");
				
						$saq = new SAQ();
						$nombre = $saq->getProduits($nombreProduit,$debut);
				        $this->accueil();
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
		        	    
		        		$erreur = array();
		        		if(isset($_REQUEST["password"]) && isset($_REQUEST["passwordNouveau"]) && isset($_REQUEST["passwordRepeat"]) )
			        	{
			        		if(trim($_REQUEST["passwordNouveau"])  ==  trim($_REQUEST["passwordRepeat"]))
	                        {
	                            $erreur['erreur_identique'] = "Le mot de passe n'est pas identique !";
	                        }	
			        		if(strlen(trim($_REQUEST["passwordNouveau"])) < 6)
	                        {
	                            $erreur['erreur_longueur'] = "Le mot de passe doit avoir au moins 6 caractères.";
	                        }
	                        
			        		$usager = new Usager();	
			        		if(!$usager->ChangerMotDePass($_SESSION["UserName"],$_REQUEST["password"], $_REQUEST["passwordNouveau"])) {
			        			 $erreur['erreur_invalide']= 'Mot de passe invalide';
			        		}
			        		else{
			        			header('Location: '.URL_ROOT.'index.php?requete=cellier');
			        			exit;
			        		}

			        	}	else {
			        		 $erreur['erreur_data']= 'Invalid data';
			        	}
			        	
			        	require_once(__DIR__."/vues/changerMotDePass.php");
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

                                   $_SESSION["UserID"] = $enregistrer["id"];
                                   $_SESSION["nom"] = $_REQUEST["nom"];
			        			   $_SESSION["prenom"] = $_REQUEST["prenom"];
					        	   $_SESSION["UserName"] = $_REQUEST["username"];
	                               $_SESSION["admin"] = 'non';

			                       $this->cellierUsager($_SESSION["UserID"]);
	                            }
	                        }
	                        else{
	                            // $messageErreur = implode(' ', $message);
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
				$dat = $bte->ListeBouteilleSAQ();
				// Récupérer les types
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



            // $dat['nomCellier'] = $cellier->cellierParId($id=1);
            $dat['nomCellier'] = $cellier->RecupererCellierParUsager($idUsager);
                      

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
			
			$bte = new Bouteille();
			$data = $bte->ajouterBouteilleNonListe($id, $nom, $date_achat, $notes, $quantite, $garde_jusqua, $prix_saq, $pays, $millesime, $description, $type, $format);
			
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


		
}
?>















