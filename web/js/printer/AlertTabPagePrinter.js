$(function() {
      $('td').each(function(){

        var quantite = $(this).attr("data-remplacement");

        if( quantite >= 3){
                $(this).css('background-color', '#FAB861');
        }

      });
    });