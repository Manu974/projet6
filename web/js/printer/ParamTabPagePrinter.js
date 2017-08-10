$(document).ready( function () {
    $('#tablePrinter').DataTable({
       "language": {
            "lengthMenu": "Afficher _MENU_ imprimantes par tableau",
            "zeroRecords": "Aucune imprimante en stock",
            "info": "Imprimante de _START_ à _END_ sur _TOTAL_ imprimantes",
            "infoEmpty": "Pas de résultats disponibles",
            "search":         "Rechercher:",
            "infoFiltered": "( Filtré sur _MAX_ imprimantes au total)",
            "paginate": {
                "first":      "Début",
                "last":       "Fin",
                "next":       "Suivant",
                "previous":   "Précédent"
              }
        },

        "lengthMenu": [ 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 75, 100 ]
    });
} );