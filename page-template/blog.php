<?php
/*
    Template name: blog
*/

get_header();

?>

<?php 
    global $wp_query;
    $wp_query = new WP_Query( array(
        'post_type' => 'post', 
        'posts_per_page' => 100,
        'post_status' => 'publish'
    ));
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<?php if(has_post_thumbnail()): ?>
<?php
    $thumbID = get_post_thumbnail_id( $post->ID );
    $imgDestacada = wp_get_attachment_image_src( $thumbID, 'thumbnail' );
    echo '<img src="'.$imgDestacada[0].'" alt="'.get_the_title().'" title="'.get_the_title().'">';
?>

<?php the_title();?>
<?php the_permalink(); ?>
<?php the_content(); ?>
<?php the_excerpt(); ?>

<?php endif; ?>

<?php endwhile;endif; ?>
<!-- cerrar loop -->

<?php get_footer(); ?>