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
        console.log(data);

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


}); // End of document.ready
