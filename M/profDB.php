<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = "SELECT *  
		FROM professeur 
		WHERE login_prof='%s' AND pass_prof='%s'";
		
		$queryFinale = sprintf($queryIdent, $login, $pwd);
		
		$res = mysqli_query($link, $queryFinale)	
		or die (utf8_encode("erreur de requête de recuperation du professeur") /*. $queryFinale*/); 
		
		// Si le prof existe renvoie true
		if(mysqli_num_rows ($res) > 0) {
			
			// Récupère le profil du professeur
			$profil = mysqli_fetch_assoc($res);
            
            // Inscris dans la base que le professeur est connecté
            $queryIdentOK = sprintf("UPDATE professeur SET bConnect = 1 WHERE login_prof='%s' AND pass_prof='%s'", $login, $pwd);
            mysqli_query($link, $queryIdentOK) 
				or die (utf8_encode("erreur de requête de connexion du professeur") /*. $queryIdentOK*/);
			
			return true;
		} 
		else {
			$profil = null;
			return false;
		}
	}

	function deconnectDB($login, $pwd) {
        require("./M/connect_db.php");
        
        $queryDeco = "UPDATE professeur 
        SET bConnect = 0 
        WHERE login_prof='%s' AND pass_prof='%s'";
        
        $queryFinale = sprintf($queryDeco, $login, $pwd);
        mysqli_query($link, $queryFinale)
            or die(utf8_encode("erreur de requête de deconnexion du professeur") /*. $queryFinale*/);
    }

    function fetchTests($idProf) {
        require("./M/connect_db.php");
        
        $queryTests = "SELECT * FROM test WHERE id_prof=%d;";
        $queryTests = sprintf($queryTests, $idProf);
        
        $resultQueryTests = mysqli_query($link, $queryTests)
            or die (utf8_encode("Erreur de requête de récuperation des tests") /*. $queryTests*/);
        
        
        $listeTests = array();
        
        while($listeTests[] = mysqli_fetch_assoc($resultQueryTests)) {
        }
        
        return $listeTests;
    }

    function activerTest($idTest) {
        require("./m/connect_db.php");
        
        $queryActiveTest = "UPDATE test SET bActif = 1 WHERE id_test = %d;";
        $queryActiveTest = sprintf($queryActiveTest, $idTest);
        
        mysqli_query($link, $queryActiveTest)
            or die(utf8_encode("Erreur de requête : activer test"));
    }

    function fetchQuestions() {
        require("./M/connect_db.php");
        
        $queryQuestions = "SELECT * FROM question;";
        
        $resultQueryQuest = mysqli_query($link, $queryQuestions)
            or die(utf8_encode("Erreur de requête de récupération des questions"));
        
        $questions = array();
        
        while($questions[] = mysqli_fetch_assoc($resultQueryQuest)) {
        }
        
        return $questions;
    }

    function fetchReponses() {
        require("./M/connect_db.php");
        
        $queryReponses = "SELECT * FROM reponse;";
        
        $resultQueryRep = mysqli_query($link, $queryReponses)
            or die(utf8_encode("Erreur de requête de récupération des réponses"));
        
        $reponses = array();
        
        while($reponses[] = mysqli_fetch_assoc($resultQueryRep)) {
        }
        
        return $reponses;
    }

    function fetchTest($idTest) {
        require("./M/connect_db.php");
        
        $queryTest = "SELECT * FROM test WHERE id_test = %d;";
        $queryTest = sprintf($queryTest, $idTest);
        
        $resultQueryTest = mysqli_query($link, $queryTest)
            or die(utf8_encode("Erreur de requête de récupération d'un test"));
        $test = mysqli_fetch_assoc($resultQueryTest);
        
        return $test;
    }

    function fetchQuestion($idQuest) {
        require("./M/connect_db.php");
        
        // Récupère la question
        $queryQuest = "SELECT * FROM question WHERE id_quest = %d;";
        $queryQuest = sprintf($queryQuest, $idQuest);
        
        $resultQueryQuest = mysqli_query($link, $queryQuest)
            or die(utf8_encode("Erreur de requête de récupération d'une question"));
        $question = mysqli_fetch_assoc($resultQueryQuest);
        
        // Récupère les réponses de la question
        $queryReps = "SELECT * FROM reponse WHERE id_quest = %d;";
        $queryReps = sprintf($queryReps, $idQuest);
        
        $resultQueryReps = mysqli_query($link, $queryReps)
            or die(utf8_encode("Erreur de requête de récupération des réponses de la question"));
        
        $question['reponses'] = array();
        
        while($question['reponses'][] = mysqli_fetch_assoc($resultQueryReps)) {
        }
        
        return $question;
    }

    function changeQuestion($idQuest, $titre, $texte) {
        require("./M/connect_db.php");
        
        $queryChangeQuest = "UPDATE question SET titre = '%s', texte = '%s' WHERE id_quest = %d;";
        $queryChangeQuest = sprintf($queryChangeQuest, $titre, $texte, $idQuest);
        
        mysqli_query($link, $queryChangeQuest)
            or die(utf8_encode("Erreur de requête de update de question"));
    }

    function changeReponse($idRep, $texte_rep) {
        require("./M/connect_db.php");
        
        $queryChangeRep = "UPDATE reponse SET texte_rep = '%s' WHERE id_rep = %d;";
        $queryChangeRep = sprintf($queryChangeRep, $texte_rep, $idRep);
        
        mysqli_query($link, $queryChangeRep)
            or die(utf8_encode("Erreur de requête de update de reponse"));
    }

    function fetchQuestionsDuTest($idTest) {
        require("./M/connect_db.php");
        
        $queryQuests = "SELECT question.id_quest, question.id_theme, question.titre, question.texte, question.bmultiple 
        FROM question, qcm
        WHERE question.id_quest = qcm.id_quest
        AND qcm.id_test = %d;";
        $queryQuests = sprintf($queryQuests, $idTest);
        
        $resultQuests = mysqli_query($link, $queryQuests)
            or die(utf8_encode("Erreur de requête fetch questions de test"));
        
        $questions = array();
        
        while($questions[] = mysqli_fetch_assoc($resultQuests)) {
        }
        
        return $questions;
    }

    function changeTest($idTest, $titre, $groupe) {
        require("./M/connect_db.php");
        
        $queryChangeTest = "UPDATE test SET titre_test = '%s', num_grpe = %d WHERE id_test = %d;";
        $queryChangeTest = sprintf($queryChangeTest, $titre, $groupe, $idTest);
        
        mysqli_query($link, $queryChangeTest)
            or die(utf8_encode("Erreur de requête de update de test"));
    }
?>
