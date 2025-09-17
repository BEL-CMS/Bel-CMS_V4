if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}
var cAutocomplete={sDescription:"autcomplete class"};cAutocomplete.complete=function(hEvent){if(hEvent==null){var hEvent=window.hEvent}var hElement=(hEvent.srcElement)?hEvent.srcElement:hEvent.originalTarget;var sAA=hElement.getAttribute("autocomplete").toString();if(sAA.indexOf("array:")>=0){hArr=eval(sAA.substring(6))}else{if(sAA.indexOf("list:")>=0){hArr=sAA.substring(5).split("|")}}if(hEvent.keyCode==16){return}var sVal=hElement.value.toLowerCase();if(hEvent.keyCode==8||hEvent.keyCode==46){sVal=sVal.substring(0,sVal.length-1)}if(sVal.length<1){return}for(var nI=0;nI<hArr.length;nI++){sMonth=hArr[nI];nIdx=sMonth.toLowerCase().indexOf(sVal,0);if(nIdx==0&&sMonth.length>sVal.length){hElement.value=hArr[nI];if(hElement.createTextRange){hRange=hElement.createTextRange();hRange.findText(hArr[nI].substr(sVal.length));hRange.select()}else{hElement.setSelectionRange(sVal.length,sMonth.length)}return}}};cAutocomplete.init=function(){var a=0;var c=document.getElementsByTagName("INPUT");for(var a=0;a<c.length;a++){if(c[a].type.toLowerCase()=="text"){var b=c[a].getAttribute("autocomplete");if(b){if(document.attachEvent){c[a].attachEvent("onkeyup",cAutocomplete.complete)}else{if(document.addEventListener){c[a].addEventListener("keyup",cAutocomplete.complete,false)}}}}}};if(window.attachEvent){window.attachEvent("onload",cAutocomplete.init)}else{if(window.addEventListener){window.addEventListener("load",cAutocomplete.init,false)}};
var pays=["Afghanistan","Afrique-du-Sud","Albanie","Algérie","Allemagne","Andorre","Angola","Anguilla","Antarctique","Antigua-et-Barbuda","Arabie-saoudite","Argentine","Arménie","Aruba","Australie","Autriche","Azerbaïdjan","Bahamas","Bahreïn","Bangladesh","Barbade","Belgique","Belize","Bénin","Bermudes","Bhoutan","Biélorussie","Bolivie","Bosnie-Herzégovine","Botswana","Brésil","Brunéi-Darussalam","Bulgarie","Burkina-Faso","Burundi","Cambodge","Cameroun","Canada","Cap-Vert","Ceuta-et-Melilla","Chili","Chine","Chypre","Colombie","Comores","Congo-Brazzaville","Congo-Kinshasa","Corée-du-Nord","Corée-du-Sud","Costa-Rica","Côte-d’Ivoire","Croatie","Cuba","Curaçao","Danemark","Diego-Garcia","Djibouti","Dominique","Égypte","El-Salvador","Émirats-arabes-unis","Équateur","Érythrée","Espagne","Estonie","État-de-la-Cité-du-Vatican","États-fédérés-de-Micronésie","États-Unis","Éthiopie","Fidji","Finlande","France","Gabon","Gambie","Géorgie","Ghana","Gibraltar","Grèce","Grenade","Groenland","Guadeloupe","Guam","Guatemala","Guernesey","Guinée","Guinée-équatoriale","Guinée-Bissau","Guyana","Guyane-française","Haïti","Honduras","Hongrie","Île-Christmas","Île-de-l’Ascension","Île-de-Man","Île-Norfolk","Îles-Åland","Îles-Caïmans","Îles-Canaries","Îles-Cocos","Îles-Cook","Îles-Féroé","Îles-Géorgie-du-Sud-et-Sandwich-du-Sud","Îles-Malouines","Îles-Mariannes-du-Nord","Îles-Marshall","Îles-mineures-éloignées-des-États-Unis","Îles-Salomon","Îles-Turques-et-Caïques","Îles-Vierges-britanniques","Îles-Vierges-des-États-Unis","Inde","Indonésie","Irak","Iran","Irlande","Islande","Israël","Italie","Jamaïque","Japon","Jersey","Jordanie","Kazakhstan","Kenya","Kirghizistan","Kiribati","Kosovo","Koweït","La-Réunion","Laos","Lesotho","Lettonie","Liban","Libéria","Libye","Liechtenstein","Lituanie","Luxembourg","Macédoine","Madagascar","Malaisie","Malawi","Maldives","Mali","Malte","Maroc","Martinique","Maurice","Mauritanie","Mayotte","Mexique","Moldavie","Monaco","Mongolie","Monténégro","Montserrat","Mozambique","Myanmar","Namibie","Nauru","Népal","Nicaragua","Niger","Nigéria","Niue","Norvège","Nouvelle-Calédonie","Nouvelle-Zélande","Oman","Ouganda","Ouzbékistan","Pakistan","Palaos","Panama","Papouasie-Nouvelle-Guinée","Paraguay","Pays-Bas","Pays-Bas-caribéens","Pérou","Philippines","Pitcairn","Pologne","Polynésie-française","Porto-Rico","Portugal","Qatar","R.A.S.-chinoise-de-Hong-Kong","R.A.S.-chinoise-de-Macao","République-centrafricaine","République-dominicaine","République-tchèque","Roumanie","Royaume-Uni","Russie","Rwanda","Sahara-occidental","Saint-Barthélemy","Saint-Christophe-et-Niévès","Saint-Marin","Saint-Martin-(partie-française)","Saint-Martin-(partie-néerlandaise)","Saint-Pierre-et-Miquelon","Saint-Vincent-et-les-Grenadines","Sainte-Hélène","Sainte-Lucie","Samoa","Samoa-américaines","Sao-Tomé-et-Principe","Sénégal","Serbie","Seychelles","Sierra-Leone","Singapour","Slovaquie","Slovénie","Somalie","Soudan","Soudan-du-Sud","Sri-Lanka","Suède","Suisse","Suriname","Svalbard-et-Jan-Mayen","Swaziland","Syrie","Tadjikistan","Taïwan","Tanzanie","Tchad","Terres-australes-françaises","Territoire-britannique-de-l’océan-Indien","Territoires-palestiniens","Thaïlande","Timor-oriental","Togo","Tokelau","Tonga","Trinité-et-Tobago","Tristan-da-Cunha","Tunisie","Turkménistan","Turquie","Tuvalu","Ukraine","Uruguay","Vanuatu","Venezuela","Vietnam","Wallis-et-Futuna","Yémen","Zambie","Zimbabwe"];cAutocomplete.init();

function generer_password(champ_cible) {
    var ok = '@#*/€azertyupqsdfghjkmwxcvbn2345@#*/6789AZERTYUPQSDFGHJKMW@#*/XCVBN';
    var pass = '';
    longueur = 6;
    for(i=0;i<longueur;i++){
        var wpos = Math.round(Math.random()*ok.length);
        pass+=ok.substring(wpos,wpos+1);
    }
    document.getElementById(champ_cible).value = pass;
}
(function($) {
    "use strict";

    $(".active_img").click(function(event) {
        event.preventDefault();
        var img = $(this).data('file');

        $.ajax({
            url: "/User/ActiveAvatar",
            type: "POST",
            data: {
                avatar: img,
            },
            success: function(response) {
                setTimeout(
                function()  {
                    window.location.replace("/User/profils");
                }, 500);
            },
            error: function() {
                alert("error Ajax");
            }
        });
    });

    $(".delete_img").click(function(event) {
        event.preventDefault();
        var img = $(this).data('file');

        $.ajax({
            url: "/User/deleteAvatar",
            type: "POST",
            data: {
                avatar: img,
            },
            success: function(response) {
                setTimeout(
                function()  {
                    window.location.replace("/User/profils");
                }, 500);
            },
            error: function() {
                alert("error Ajax");
            }
        });
    });

    $(document).on('click','#requestTokenBt',function(){
        var mail = $("#email").val();
        if (!mail) {
            alert("Veuillez entrer votre adresse e-mail avant de demander le token.");
        } else {
            $.ajax({
                url: "/User/sendToken?echo",
                type: "GET",
                data: {
                    data: mail,
                },
                success: function(response) {
                    $('#requestTokenBt span').empty().append('<div class="spinner"></div>');
                    setTimeout(
                    function()  {
                        $('#requestTokenBt span').empty().append('<div class="spinner"></div>');
                        if (response == 'true') {
                            $('#requestTokenBt span').empty().append('Le courriel concernant la réinitialisation a été correctement expédié.');
                        } else {
                            $('#requestTokenBt span').empty().append(response);
                        }
                    }, 1500);
                },
                error: function() {
                    alert("error Ajax");
                }
            });
        }
    });

})(jQuery);