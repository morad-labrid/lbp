<?php
if (!isset($_COOKIE['mail'])) {
    header('location:connexion.html');
};
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Site Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="vente produits seconde main annonces entre particuliers bon plan voitures produits ménagers immobiliers">
    <meta name="description" content="site de petites annonces entre particuliers, plus écologiques et franchement moins cher ">
    <meta name="author" content="Nadir Ziane, Morad Labrid">
    <meta property="og:title" content="La Bonne Plateforme_" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="Assets/img/" />
    <meta property="og:description" content="Oishi Sushi, restaurant de spécialité Japonaise à Marseille 13003" />
    <meta property="og:site_name" content="La Bonne Plateforme_" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="Assets/img/" type="image/x-icon" />
    <link rel="icon" href="Assets/img/" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style-connexion.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>La Bonne Plateforme_</title>
</head>

<body>
    <header>

    </header>
    <main>
        <section class="centrer">
            <img class="logo-jaune" src="../Assets/img/plateforme-logo-jaune.svg" alt="logo jaune laplateforme_">
        </section>
        <section class="centrer1">
            <div class="cadre-information">
                <p class="coordonnees">mail : <?php echo $_COOKIE['mail']?></p><br>
                <p class="coordonnees">nom : <?php echo $_COOKIE['nom']?></p><br>
                <p class="coordonnees">rénom : <?php echo $_COOKIE['prenom']?></p><br>
                <p class="coordonnees">adresse : <?php echo $_COOKIE['adresse']?></p>
            </div>
        </section>
        <section class="centrer2">
            <button class="sbmt" id="deconnexion">Déconnexion</button>
        </section>
    </main>
    <footer>

    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../Assets/js/script-connexion-inscription.js"></script>

</html>