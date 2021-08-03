function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

$("#connexion").click(function() {
    var user = $("#mail").val();
    var password = $("#password").val();

    if (user != '' && password != '') {
        $.ajax({
            url: '../api/api.php',
            method: 'POST',
            data: {
                connexion: 'true',
                user: user,
                password: password
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.mail == user) {
                    setCookie("id", data.id, 1)
                    setCookie("nom", data.nom, 1)
                    setCookie("prenom", data.prenom, 1)
                    setCookie("adresse", data.adresse, 1)
                    setCookie("cp", data.cp, 1)
                    setCookie("ville", data.ville, 1)
                    setCookie("mail", data.mail, 1)
                    setCookie("password", data.password, 1)
                    $(location).attr('href', 'profil.php');
                } else {
                    $("#response").html(data)
                }
            }
        })
    } else {
        $("#response").html('Remplissez tout les champs')
    }
})

$("#valid-connexion").click(function() {

    var inscriptionNom = $("#nom").val();
    var inscriptionPrenom = $("#prenom").val();
    var inscriptionTel = $("#telephone").val();
    var inscriptionAdresse = $("#adresse").val();
    var inscriptionCp = $("#cp").val();
    var inscriptionVille = $("#ville").val();
    var inscriptionMail = $("#mail").val();
    var inscriptionPassword = $("#password").val();
    var inscriptionConfirm = $("#valid-password").val();

    if (inscriptionNom != '' && inscriptionPrenom != '' && inscriptionTel != '' && inscriptionAdresse != '' &&
        inscriptionCp != '' && inscriptionVille != '' && inscriptionMail != '' && inscriptionPassword != '' && inscriptionConfirm != '') {
        if (inscriptionPassword == inscriptionConfirm) {
            $.ajax({
                url: '../api/api.php',
                method: 'POST',
                data: {
                    inscription: 'true',
                    nom: inscriptionNom,
                    prenom: inscriptionPrenom,
                    telephone: inscriptionTel,
                    adresse: inscriptionAdresse,
                    cp: inscriptionCp,
                    ville: inscriptionVille,
                    mail: inscriptionMail,
                    password: inscriptionPassword
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data == 'Bienvenue !') {
                        $(location).attr('href', 'connexion.html');
                    } else($("#response").html(data));
                }
            })
        } else {
            $("#response").html('Les mots de passes ne sont pas identiques')
        }
    } else {
        $("#response").html('Remplissez tout les champs')
    }
})

$('#deconnexion').click(function() {
    document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "nom=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "prenom=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "telephone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "adresse=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "cp=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "ville=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "mail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    $(location).attr('href', '../index.html');
})