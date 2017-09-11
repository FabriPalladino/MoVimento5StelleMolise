<<<<<<< HEAD
<article <?php post_class(); ?> <?php
=======
<article <?php
>>>>>>> f0e371c360d65f8bc42b8c369dd428d181ff1557
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  echo 'style="background-image: url(' . $thumb_url[0]  . ')"';
?> >
<<<<<<< HEAD
    <span class="grid-post__category"> <a href="?cat=<?php $category = get_the_category(); echo $category[0]->cat_ID; ?>" class="cat-<?php $category = get_the_category(); echo $category[0]->slug; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?> </a></span>
    <?php the_title( sprintf( '<h2 class="grid-post__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

=======
    <span class="grid-post__category"> <a href="?cat=<?php $category = get_the_category(); echo $category[0]->cat_ID; ?>"><?php $category = get_the_category(); echo $category[0]->cat_name; ?> </a></span>
    <h2 class="grid-post__title">  <?php the_title(); ?> </h2>
>>>>>>> f0e371c360d65f8bc42b8c369dd428d181ff1557
</article>
