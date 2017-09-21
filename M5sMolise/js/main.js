$(document).ready(function() {



    var catgoriesContainer = $('.categories-labels');

    $.get('/wp-json/wp/v2/categories', function(data) {

        $.each(data, function(index, value){

          var $name = value.name.split(" ");
          var $slug = value.slug;
          var $href = value.link;

          $(catgoriesContainer).append('<li class="'+
            $slug+
            '">'+
            '<a href="'+
            $href+'">'+
            $name[0] +
            '</a></li>');
        });

    });

    var comunicatiStampa = $('.comunicati-stampa');

    $.get('/wp-json/wp/v2/comunicato-stampa', function(data) {

        $.each(data, function(index, value){

          var $title = value.title.rendered;
          var $slug = value.slug;
          var $href = value.link;

          $(comunicatiStampa).append('<li class="'+
            $slug+
            '">'+
            '<a href="'+
            $href+'">'+
            $title +
            '</a></li>');
        });

    });

    var restituzioneWidget = $('.restituzione-widget');

    $.get('/wp-json/wp/v2/restituzione/1797', function(data) {

      var $date = data.acf.data;
      var $amount = data.acf.cifra_restituita;

        $(restituzioneWidget).append('<article><p>Dati aggiornati al: '+
          $date+
          '</p><h2>Ad oggi abbiamo restituito ai cittadini:</h2>'+
          '<h2 class="restituzione__amount">'+
          $amount+'</h2><span>#TIRENDICONTO</span>'+
          '</article>');


    });


}); // End of document.ready
