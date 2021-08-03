<?php

class BonnePlateforme 
    {
        private $_db;


        // //////////////////////////////////////////////////////// METHODE CONNEXION BDD ///////////////

        public function __construct(){
            try {
                $db = new PDO('mysql:host=localhost;dbname=la_bonne_plateforme', "root", "");
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
            $this->_db = $db;
        }

        // //////////////////////////////////////////////////////// METHODE POUR S'INSCRIRE //////////////

        public function inscription($nom, $prenom, $telephone, $adresse, $cp, $ville, $mail, $password)
        {
            $db = $this->_db;
            $msg = '';

            $nom = htmlspecialchars($nom);
            $prenom = htmlspecialchars($prenom);
            $telephone = htmlspecialchars($telephone);
            $adresse = htmlspecialchars($adresse);
            $cp = htmlspecialchars($cp);
            $ville = htmlspecialchars($ville);
            $mail = htmlspecialchars($mail);
            $password = htmlspecialchars($password);

            $_nom = trim($nom);
            $_prenom = trim($prenom);
            $_telephone = trim($telephone);
            $_adresse = trim($adresse);
            $_cp = trim($cp);
            $_ville = trim($ville);
            $_mail = trim($mail);
            $_password = trim($password);
            $cryptage = password_hash($_password, PASSWORD_BCRYPT);

            $verification = $db->prepare("SELECT `email` FROM users WHERE email = '$_mail'");
            $verification->execute();


                    if($verification->fetch(PDO::FETCH_ASSOC) == 0 ){
                            $requete = "INSERT INTO `users` (`nom`, `prenom`, `telephone`, `adresse`, `cp`, `ville`, `mail`, `password`) VALUES ('$_nom', '$_prenom', '$_telephone', '$_adresse', '$_cp', '$_ville', '$_mail', '$cryptage')";
                            $db->query($requete);
                            $msg = 'Bienvenue !';                    
                    }else{
                        $msg = 'Cette E-mail est déjà utilisée';
                    }
        return(json_encode($msg)); 
        }

        ////////////////////////////////////////////////////////// METHODE POUR SE CONNECTER //////////////

        public function connect($login, $password)
        {
            $select = $this->_db->prepare('SELECT * FROM users WHERE mail = :login');
                    $select -> bindParam('login', $login);
                    $select -> execute();

                    $checkuser = $select->rowCount();
                    $data = $select->fetch(PDO::FETCH_OBJ);
                    
                    if ($checkuser == 1) {
                        // VERIFIER SI PASSWORD EST JUSTE
                        $verify = password_verify($password, $data->password);
                        if ($verify == true) {
                            //CREE UNE COOKIE POUR STOCKER L E USER
                            return(json_encode($data));
                        }else {
                            return(json_encode("Mot de passe incorrect"));
                        }
                    }else {
                        return(json_encode('Aucun utilisateurs'));
                    }


        }
    }
?>
