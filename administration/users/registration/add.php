<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

include ROOT . DS . 'assets/country.php';
$password = Common::randomString(8);
?>
<form action="registration/adduser?admin&option=users" method="post">
    <div class="row">
        <div class="col-12 col-xl-6 mt-3">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert"><i class="bi bi-info-circle-fill me-2"></i> La création manuelle de compte ne permet pas de saisir toutes les informations.</div>
                    <div class="row gy-4 mb-4">
                        <div class="col-xl-6">
                            <label for="first-name" class="form-label">Nom d'utilisateur</label>
                            <input type="text" name="username" class="form-control" id="first-name" placeholder="Nom / Pseudonyme" required>
                        </div>
                        <div class="col-xl-6">
                            <label for="email" class="form-label">E-mail personnelles :</label>
                            <input type="email" name="mail" class="form-control" id="email" placeholder="e-mail de connexion" required>
                        </div>
                        <div class="col-xl-6">
                            <label for="last-name" class="form-label">Prénom réel :</label>
                            <input type="text" class="form-control" id="last-name" placeholder="Prochainement" disabled="">
                        </div>
                        <div class="col-xl-6">
                            <label for="user-name" class="form-label">Nom réel :</label>
                            <input type="text" class="form-control" id="user-name" placeholder="Prochainement" disabled="">
                        </div>
                        <div class="col-xl-6">
                            <label for="user-name" class="form-label">Code Postal :</label>
                            <input type="text" class="form-control" id="user-name" placeholder="Prochainement" disabled="">
                        </div>
                        <div class="col-xl-6">
                            <label for="user-name" class="form-label">Ville :</label>
                            <input type="text" class="form-control" id="user-name" placeholder="Prochainement" disabled="">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label">Pays :</label>
                            <input type="text" id="demo-autocomplete" name="country" autocomplete="array:pays" class="form-control" value="">
                        </div>
                        <div class="col-xl-6">
                            <label for="user-tel" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="user-tel" placeholder="Prochainement" disabled="">
                        </div>
                        <div class="col-xl-12">
                            <div class="alert svg-primary alert-primary alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
                                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2>"></i> Les informations personnelles ne seront jamais rendues publiques. (hash_key / e-mail)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mt-3">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="tab-pane active show" id="man-password" role="tabpanel" tabindex="0" aria-labelledby="man-password-tab">
                        <div>
                            <div class="alert alert-info" role="alert">Le mot de passe doit être au minimum de <b class="text-success">8 Caractères</b></div>
                            <div class="mb-2">
                                <label for="new-password" class="form-label">Nouveau mot de passe</label>
                                <input type="text" name="password" id="password_new" minlength="8" maxlength="16" class="form-control" id="new-password" placeholder="Nouveau mot de passe" required>
                            </div>
                            <div class="mb-4">
                                <label for="confirm-password" class="form-label">Confirmez le mot de passe</label>
                                <input type="password" name="password_repeat" autocomplete="off" minlength="8" maxlength="16" class="form-control" id="confirm-password" data-character-set="a-z,A-Z,0-9,#" placeholder="Confirmez le mot de passe" required>
                            </div>
                            <div class="mb-5">
                                <button onclick="javascript:generer_password('password_new');" type="button" class="btn rounded-pill btn-light getNewPass">
                                    <span class="fa fa-refresh">Générer un mot de passe aléatoirement.</span>
                                </button>
                            </div>
                            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                <i class="bi bi-check-circle-fill flex-shrink-0 me-2"></i> Un email sera envoyé automatiquement avec le mot de passe.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-12 mt-3 mb-5"><button type="submit" class="btn btn-primary">Créé</button></div>
</form>
<script>
    var cAutocomplete = {
        sDescription: "autcomplete class"
    };
    cAutocomplete.complete = function(hEvent) {
        if (hEvent == null) {
            var hEvent = window.hEvent
        }
        var hElement = (hEvent.srcElement) ? hEvent.srcElement : hEvent.originalTarget;
        var sAA = hElement.getAttribute("autocomplete").toString();
        if (sAA.indexOf("array:") >= 0) {
            hArr = eval(sAA.substring(6))
        } else {
            if (sAA.indexOf("list:") >= 0) {
                hArr = sAA.substring(5).split("|")
            }
        }
        if (hEvent.keyCode == 16) {
            return
        }
        var sVal = hElement.value.toLowerCase();
        if (hEvent.keyCode == 8 || hEvent.keyCode == 46) {
            sVal = sVal.substring(0, sVal.length - 1)
        }
        if (sVal.length < 1) {
            return
        }
        for (var nI = 0; nI < hArr.length; nI++) {
            sMonth = hArr[nI];
            nIdx = sMonth.toLowerCase().indexOf(sVal, 0);
            if (nIdx == 0 && sMonth.length > sVal.length) {
                hElement.value = hArr[nI];
                if (hElement.createTextRange) {
                    hRange = hElement.createTextRange();
                    hRange.findText(hArr[nI].substr(sVal.length));
                    hRange.select()
                } else {
                    hElement.setSelectionRange(sVal.length, sMonth.length)
                }
                return
            }
        }
    };
    cAutocomplete.init = function() {
        var a = 0;
        var c = document.getElementsByTagName("INPUT");
        for (var a = 0; a < c.length; a++) {
            if (c[a].type.toLowerCase() == "text") {
                var b = c[a].getAttribute("autocomplete");
                if (b) {
                    if (document.attachEvent) {
                        c[a].attachEvent("onkeyup", cAutocomplete.complete)
                    } else {
                        if (document.addEventListener) {
                            c[a].addEventListener("keyup", cAutocomplete.complete, false)
                        }
                    }
                }
            }
        }
    };
    if (window.attachEvent) {
        window.attachEvent("onload", cAutocomplete.init)
    } else {
        if (window.addEventListener) {
            window.addEventListener("load", cAutocomplete.init, false)
        }
    };
    var pays = ["Afghanistan", "Afrique-du-Sud", "Albanie", "Algérie", "Allemagne", "Andorre", "Angola", "Anguilla", "Antarctique", "Antigua-et-Barbuda", "Arabie-saoudite", "Argentine", "Arménie", "Aruba", "Australie", "Autriche", "Azerbaïdjan", "Bahamas", "Bahreïn", "Bangladesh", "Barbade", "Belgique", "Belize", "Bénin", "Bermudes", "Bhoutan", "Biélorussie", "Bolivie", "Bosnie-Herzégovine", "Botswana", "Brésil", "Brunéi-Darussalam", "Bulgarie", "Burkina-Faso", "Burundi", "Cambodge", "Cameroun", "Canada", "Cap-Vert", "Ceuta-et-Melilla", "Chili", "Chine", "Chypre", "Colombie", "Comores", "Congo-Brazzaville", "Congo-Kinshasa", "Corée-du-Nord", "Corée-du-Sud", "Costa-Rica", "Côte-d’Ivoire", "Croatie", "Cuba", "Curaçao", "Danemark", "Diego-Garcia", "Djibouti", "Dominique", "Égypte", "El-Salvador", "Émirats-arabes-unis", "Équateur", "Érythrée", "Espagne", "Estonie", "État-de-la-Cité-du-Vatican", "États-fédérés-de-Micronésie", "États-Unis", "Éthiopie", "Fidji", "Finlande", "France", "Gabon", "Gambie", "Géorgie", "Ghana", "Gibraltar", "Grèce", "Grenade", "Groenland", "Guadeloupe", "Guam", "Guatemala", "Guernesey", "Guinée", "Guinée-équatoriale", "Guinée-Bissau", "Guyana", "Guyane-française", "Haïti", "Honduras", "Hongrie", "Île-Christmas", "Île-de-l’Ascension", "Île-de-Man", "Île-Norfolk", "Îles-Åland", "Îles-Caïmans", "Îles-Canaries", "Îles-Cocos", "Îles-Cook", "Îles-Féroé", "Îles-Géorgie-du-Sud-et-Sandwich-du-Sud", "Îles-Malouines", "Îles-Mariannes-du-Nord", "Îles-Marshall", "Îles-mineures-éloignées-des-États-Unis", "Îles-Salomon", "Îles-Turques-et-Caïques", "Îles-Vierges-britanniques", "Îles-Vierges-des-États-Unis", "Inde", "Indonésie", "Irak", "Iran", "Irlande", "Islande", "Israël", "Italie", "Jamaïque", "Japon", "Jersey", "Jordanie", "Kazakhstan", "Kenya", "Kirghizistan", "Kiribati", "Kosovo", "Koweït", "La-Réunion", "Laos", "Lesotho", "Lettonie", "Liban", "Libéria", "Libye", "Liechtenstein", "Lituanie", "Luxembourg", "Macédoine", "Madagascar", "Malaisie", "Malawi", "Maldives", "Mali", "Malte", "Maroc", "Martinique", "Maurice", "Mauritanie", "Mayotte", "Mexique", "Moldavie", "Monaco", "Mongolie", "Monténégro", "Montserrat", "Mozambique", "Myanmar", "Namibie", "Nauru", "Népal", "Nicaragua", "Niger", "Nigéria", "Niue", "Norvège", "Nouvelle-Calédonie", "Nouvelle-Zélande", "Oman", "Ouganda", "Ouzbékistan", "Pakistan", "Palaos", "Panama", "Papouasie-Nouvelle-Guinée", "Paraguay", "Pays-Bas", "Pays-Bas-caribéens", "Pérou", "Philippines", "Pitcairn", "Pologne", "Polynésie-française", "Porto-Rico", "Portugal", "Qatar", "R.A.S.-chinoise-de-Hong-Kong", "R.A.S.-chinoise-de-Macao", "République-centrafricaine", "République-dominicaine", "République-tchèque", "Roumanie", "Royaume-Uni", "Russie", "Rwanda", "Sahara-occidental", "Saint-Barthélemy", "Saint-Christophe-et-Niévès", "Saint-Marin", "Saint-Martin-(partie-française)", "Saint-Martin-(partie-néerlandaise)", "Saint-Pierre-et-Miquelon", "Saint-Vincent-et-les-Grenadines", "Sainte-Hélène", "Sainte-Lucie", "Samoa", "Samoa-américaines", "Sao-Tomé-et-Principe", "Sénégal", "Serbie", "Seychelles", "Sierra-Leone", "Singapour", "Slovaquie", "Slovénie", "Somalie", "Soudan", "Soudan-du-Sud", "Sri-Lanka", "Suède", "Suisse", "Suriname", "Svalbard-et-Jan-Mayen", "Swaziland", "Syrie", "Tadjikistan", "Taïwan", "Tanzanie", "Tchad", "Terres-australes-françaises", "Territoire-britannique-de-l’océan-Indien", "Territoires-palestiniens", "Thaïlande", "Timor-oriental", "Togo", "Tokelau", "Tonga", "Trinité-et-Tobago", "Tristan-da-Cunha", "Tunisie", "Turkménistan", "Turquie", "Tuvalu", "Ukraine", "Uruguay", "Vanuatu", "Venezuela", "Vietnam", "Wallis-et-Futuna", "Yémen", "Zambie", "Zimbabwe"];
    cAutocomplete.init();
</script>
<script>
    function generer_password(champ_cible) {
    var ok = '@#*/€azertyupqsdfghjkmwxcvbn2345@#*/6789AZERTYUPQSDFGHJKMW@#*/XCVBN';
    var pass = '';
    longueur = 8;
    for(i=0;i<longueur;i++){
        var wpos = Math.round(Math.random()*ok.length);
        pass+=ok.substring(wpos,wpos+1);
    }
    document.getElementById(champ_cible).value = pass;
}
</script>