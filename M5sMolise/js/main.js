$(document).ready(function() {

    var catgoriesContainer = $('.categories-labels');

    $.get('/index.php/wp-json/wp/v2/categories', function(data) {
        console.log(data);

        $.each(data, function(index, value){

          var $name = JSON.stringify(value.name);

          $(catgoriesContainer).append('<li>'+
            $name +
            '</li>');
        });

    });

    // var newsGrid = $('.news-grid');
    //
    // $.get('/index.php/wp-json/wp/v2/posts?filter[category_name]= acqua', function(data) {
    //     console.log(data);
    //
    //     $.each(data, function(index, value){
    //
    //       var $parent = JSON.stringify(value.id);
    //
    //       //$(newsGrid).find('.main').append(JSON.stringify(value.type));
    //     });
    //
    // });

});
