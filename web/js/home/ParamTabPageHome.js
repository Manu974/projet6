 $(document).ready( function () {
    $('#tablePrinterHome').DataTable({
      "language": {
            "lengthMenu": "Afficher _MENU_ cartouches par tableau",
            "zeroRecords": "Aucune cartouche en stock",
            "info": "Cartouche de _START_ à _END_ sur _TOTAL_ cartouches",
            "infoEmpty": "Pas de résultats disponibles",
            "search":         "Rechercher:",
            "infoFiltered": "( Filtré sur _MAX_ cartouches au total)",
            "paginate": {
                "first":      "Début",
                "last":       "Fin",
                "next":       "Suivant",
                "previous":   "Précédent"
              }
        },

        "lengthMenu": [ 5, 10]
    });
} );