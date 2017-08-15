$(function() {
      $('tr').each(function(){

        var quantite = $(this).attr("data-quantite");

        if( quantite < 5 && quantite >= 3){
                $(this).css('background-color', '#FAB861');
            }

            if( quantite <3){
                $(this).css('background-color', '#F66060');
            }


      });
    });