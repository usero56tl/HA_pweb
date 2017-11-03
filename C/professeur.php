<?php
/* prof.php
 * Controller des professeurs
 */
	function ident() {
		$loginIdent=isset($_POST['user'])?trim($_POST['user']):'';
		$pwdIdent=isset($_POST['pwd'])?trim($_POST['pwd']):'';
		$msg='';
		$profil = array();
		
		require("./M/profDB.php");
		require("./C/utilisateur.php");
		
		if(count($_POST) == 0) {
            // Charge le formulaire au début
			require("./V/accueil.tpl");
		}
		else {
            // Vérifie la syntaxe des entrées
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err)) {
                
                // Vérifie si l'utilisateur est dans la base
				if(verifIdent($loginIdent, $pwdIdent, $profil)) {
					$_SESSION['profil'] = $profil;
					$_SESSION['statut'] = "professeur";
					$nextURL = "index.php?controle=professeur&action=bienvenue";
					header("Location:" . $nextURL);
				}
				else {
					$msg = "Mot de passe ou identifiant incorrect";
                    require("./V/accueil.tpl");
				}
			}
			else {
				$msg = $err;
                // Réaffiche la page de login en cas d'erreur
				require("./V/accueil.tpl");
			}
		}
	}

	function deconnectProf() {
        require("./M/profDB.php");
        // Déconnexion de lu professeur de la base
        deconnectDB($_SESSION['profil']['login_prof'], $_SESSION['profil']['pass_prof']);
        
        // Déconnexion de l'utilisateur
        $nextURL = "index.php?controle=utilisateur&action=deconnect";
        header("Location:" . $nextURL);
    }

    function bienvenue() {
        require("./V/accueil.tpl");
    }

	function questions() {
		if(count($_POST) == 0) {
            require("./M/profDB.php");
            
            // Recupere les questions et leurs réponses
            $questions = fetchQuestions();
            $reponses = fetchReponses();
            
            // Affichage des questions
            require("./V/accueil.tpl");
        }
        else {
            // Bouton modifier cliqué
            
            // Récupère l'id de la question à modifier
            $questionAModif = array_keys($_POST);
            $nextURL = "index.php?controle=professeur&action=modifQuestion&quest=" . $questionAModif[0];
            header("Location:" . $nextURL);
        }
	}

    function modifQuestion() {
        require("./M/profDB.php");
        
        // Récupère la question à modifier via l'url
        $idQuestionAModif = $_GET['quest'];
        $question = fetchQuestion($idQuestionAModif);
        
        if(count($_POST) == 0) {
            // Charge la question
            require("./V/accueil.tpl");
        }
        else {
            // Bouton modifier cliqué
            
            // change la question dans la bdd
            changeQuestion($idQuestionAModif,
                           (isset($_POST['questTitre'])?trim($_POST['questTitre']):$question['titre']), 
                          (isset($_POST['questTexte'])?trim($_POST['questTexte']):$question['texte']));
            
            // Change les réponses dans la bdd
            $i = 0;
            while($question['reponses'][$i] != null) {
                if(isset($_POST[$question['reponses'][$i]['id_rep']]) && $_POST[$question['reponses'][$i]['id_rep']] != "") {
                    changeReponse($question['reponses'][$i]['id_rep'], trim($_POST[$question['reponses'][$i]['id_rep']]));
                }
                
                $i++;
            }
            
            $nextURL = "index.php?controle=professeur&action=questions";
            header("Location:" . $nextURL);
        }
        
    }

	function tests() {
        
        if(count($_POST) == 0) {
            require("./M/profDB.php");
            $tests = fetchTests($_SESSION['profil']['id_prof']);
            require("./V/accueil.tpl");
        }
        else {
            // Bouton modifier cliqué
            $testSelected = array_keys($_POST);
            $nextURL = "index.php?controle=professeur&action=modifTest&test=" . $testSelected[0];
            header("Location:" . $nextURL);
        }
	}

    function modifTest() {
        require("./M/profDB.php");
        
        // Récupère le test à modifier via l'url
        $idTestModif = $_GET['test'];
        $test = fetchTest($idTestModif);
        $test['questions'] = fetchQuestionsDuTest($idTestModif);
        
        if(count($_POST) == 0) {
            // Charge le test à changer
            require("./V/accueil.tpl");
        }
        else {
            $titre = ($_POST['testTitre'] != "")?trim($_POST['testTitre']):$test['titre_test'];
            $groupe = ($_POST['testGrpe'] != "")?trim($_POST['testGrpe']):$test['num_grpe'];
            
            changeTest($idTestModif, $titre, $groupe);
            
            $nextURL = "index.php?controle=professeur&action=tests";
            header("Location:" . $nextURL);
        }
    }

	function lancerTest() {
        
        if(count($_POST) == 0) {
            // Aucun test selectionné
            
            require("./M/profDB.php");
            $tests = fetchTests($_SESSION['profil']['id_prof']);
            require("./V/accueil.tpl");
        }
        else {
            // Bouton d'un test cliqué
            
            // Récupère l'id du test à lancer
            $testSelected = array_keys($_POST);
            $nextURL = "index.php?controle=professeur&action=suivreTest&test=" . $testSelected[0];
            header("Location:" . $nextURL);
        }
	}

	function suivreTest() {
        // Récupère l'id du test selectionné
        $testEnCours = $_GET['test'];
        
        require("./M/ProfDB.php");
        // Active le test dans la BDD
        activerTest($testEnCours);
        
		require("./V/accueil.tpl");
	}

	function consultResult() {
		
	}
?>
