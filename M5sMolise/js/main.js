$(document).ready(function() {
    $.get('/index.php/wp-json/wp/v2/posts', function(data) {
        console.log(data);
    });
});
