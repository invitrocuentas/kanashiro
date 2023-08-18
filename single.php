<?php
/*
    Template name: single
*/

get_header();

$ID = intval(get_the_ID());

?>

<?php echo esc_url(home_url('/')) ?>
<?php the_title(); ?>
<?php the_content(); ?>


<?php 
    global $wp_query;
    $wp_query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish'
    ));
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<?php
    $thumbID = get_post_thumbnail_id( $post->ID );
    $imgDestacada = wp_get_attachment_image_src( $thumbID, 'thumbnail' );
    echo '<img src="'.$imgDestacada[0].'" alt="'.get_the_title().'" title="'.get_the_title().'">';
?>
<?php the_permalink(); ?>

<?php endwhile;endif; ?>
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>



<?php get_footer(); ?>