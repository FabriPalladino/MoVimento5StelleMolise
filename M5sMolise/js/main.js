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
            $href+'"><span>'+
            $name[0] +
            '</span></a></li>');
        });

    });

    // var $newsGrid = $('.news-grid');
    //
    // var $newsGridMain = $('.news-grid .main');
    // var $newsGridSide = $('.news-grid  article');
    //
    // $.each($newsGridSide, function(index, value){
    //
    //   $(this).addClass('grid-news-'+index+'');
    //
    // });
    //
    // $.get('/index.php/wp-json/wp/v2/posts', function(data) {
    //
    //
    //     var $gridTitles = [];
    //     var $idS = [];
    //
    //     $.each(data, function(index, value){
    //
    //       var $title = value.title.rendered;
    //       var $id = value.id;
    //
    //       $gridTitles.push($title);
    //       $idS.push($id);
    //
    //       $('.grid-news-'+index+'').append('<h2 class="grid-post__title">'+
    //       $title+
    //       '</h2>');
    //
    //
    //     });
    //
    //     $($newsGridMain).append('<h2 class="grid-post__title">'+
    //     $gridTitles[0]+
    //     '</h2>');
    //
    //     console.log($newsGridSide);
    //
    //
    // });
    //
    //
    //
    //   $.get('/index.php/wp-json/wp/v2/media', function(data) {
    //
    //
    //   });

});
