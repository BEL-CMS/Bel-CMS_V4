if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}
(function ($) {
    "use strict";

    if ($("textarea").hasClass("bel_cms_textarea_simple")) {
        _initTinymceSimple();
    }

    if ($("textarea").hasClass("bel_cms_textarea_full")) {
        _initTinymceFull();
    }

    $('.DataTableBelCMS').DataTable({
        language:
        {
            "sEmptyTable": "Aucune donnée disponible dans le tableau",
            "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
            "sInfoThousands": ",",
            "sLengthMenu": "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "sZeroRecords": "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "%d lignes sélectionnées",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            },
            pageLength: 50,
            paging: true
        },
        order: [[0, 'asc']]
    });
    console.log("Chargement BEL-CMS script Ok");
});