<?php

class BonnePlateformeA
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
        public function setAnnonce($titre, $description, $prix, $categorie, $file, $id_user)
        {
            $date = date("Y-m-d H:i:s");
            //La requete pour envoyer les informations dans la table produit
            $insert = $this->db->prepare("INSERT INTO `produit`(`titre`, `prix`, `id_categorie`, `date`, `image`, `id_user`, `description`) 
                                        VALUES (:titre, :prix, :id_categorie, :date, :image, :id_user, :description)");
            $insert->bindParam('titre', $titre);
            $insert->bindParam('prix', $prix);
            $insert->bindParam('id_categorie', $categorie);
            $insert->bindParam('date', $date);
            $insert->bindParam('image', $image);
            $insert->bindParam('id_user', $id_user);
            $insert->bindParam('description', $description);
            $insert->execute();
            $last_id = $this->db->lastInsertId();//Le ID du dernier prdouit inserer dans la base de donnée
            /*//////////////////////////////////////////////////////////////*/


            //La requete pour envoyer les images concernant le produit ajouté dans la table images
            for ($y=1; $y <= count($file); $y++) {
            $fileName = $file["image$y"]['name'];
            $fileTmpName = $file["image$y"]['tmp_name'];
            $fileSize = $file["image$y"]['size'];
            $fileError = $file["image$y"]['error'];
            $fileType = $file["image$y"]['type'];  

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed  = array('jpg', 'jpeg', 'png');


            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = '../Asset/Images/produit/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $insertimage = $this->db->prepare("INSERT INTO images (nom_image, id_produit) VALUES (:image, :id_produit)");
            $insertimage->bindParam('image', $fileNameNew);
            $insertimage->bindParam('id_produit', $last_id);
            $insertimage->execute();
            $this->msg = 200; //Collection a bien ete modifier
        }
        }
    }
?>
