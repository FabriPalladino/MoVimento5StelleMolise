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

    // CAMPOBASSO FEED

    var cb5sFeed = $('.cb-feed');

    $.get('http://campobasso.molise5stelle.it/wp-json/wp/v2/posts?per_page=3', function(data) {
        $.each(data, function(index, value){

          var $title = value.title.rendered.substring(0,70);
          var $slug = value.slug;
          var $href = value.link;
          var $faviconLink = 'http://www.google.com/s2/favicons?domain=http://campobasso.molise5stelle.it';

          $(cb5sFeed).append('<article class="cb-feed__article'+
            $slug+
            '">'+
            '<a href="'+
            $href+'" target="_blank">'+
            '<figure class="favicon-feed" style="background-image: url('+$faviconLink+')"><p class="favicon-feed__title">'+
            $title +
            ' ...</p></figure>'+
            '</a></article>');
        });

    });

    // TERMOLI FEED

    var termoliFeed = $('.termoli-feed');

    $.get('http://www.termoli5stelle.it/wp-json/wp/v2/posts?per_page=3', function(data) {
        $.each(data, function(index, value){

          var $title = value.title.rendered.substring(0,70);
          var $slug = value.slug;
          var $href = value.link;
          var $faviconLink = 'http://www.google.com/s2/favicons?domain=http://www.termoli5stelle.it/';

          $(termoliFeed).append('<article class="termoli-feed__article'+
            $slug+
            '">'+
            '<a href="'+
            $href+'" target="_blank">'+
            '<figure class="favicon-feed" style="background-image: url('+$faviconLink+')"><p class="favicon-feed__title">'+
            $title +
            ' ...</p></figure>'+
            '</a></article>');
        });

    });

    // ISERNIA FEED

    var iserniaFeed = $('.isernia-feed');

    $.get('http://www.isernia5stelle.it/wp-json/wp/v2/posts?per_page=3', function(data) {
        $.each(data, function(index, value){

          var $title = value.title.rendered.substring(0,70);
          var $slug = value.slug;
          var $href = value.link;
          var $faviconLink = 'http://www.google.com/s2/favicons?domain=http://www.isernia5stelle.it/';

          $(iserniaFeed).append('<article class="isernia-feed__article'+
            $slug+
            '">'+
            '<a href="'+
            $href+'" target="_blank">'+
            '<figure class="favicon-feed" style="background-image: url('+$faviconLink+')"><p class="favicon-feed__title">'+
            $title +
            ' ...</p></figure>'+
            '</a></article>');
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



$(document).ready(function()
      {
        $.get('http://feeds.feedburner.com/beppegrillo/rss', function(d){

        $(d).find('item').each(function(){
          console.log('begin');
            var $item = $(this);
            var $title = $item.attr("title");
            var $href = $item.attr("link");
            var grilloFeed = $('.grillo-feed');
            var description = $item.find('description').text().substring(0,70);
            var $faviconLink = 'http://www.google.com/s2/favicons?domain=http://www.beppegrillo.it/';

            $(grilloFeed).append('<article class="grillo-feed__article'+
              $slug+
              '">'+
              '<a href="'+
              $href+'" target="_blank">'+
              '<figure class="favicon-feed" style="background-image: url('+$faviconLink+')"><p class="favicon-feed__title">'+
              $title +
              ' ...</p></figure>'+
              '</a></article>');


            $('.grillo-feed__article').fadeOut(1400);
        });
    });
});
