$(document).ready(function() {



    var catgoriesContainer = $('.categories-labels');

    $.get('/index.php/wp-json/wp/v2/categories', function(data) {
        console.log(data);

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


});
