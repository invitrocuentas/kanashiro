<?php
/*
    Template name: productos
*/

get_header();

$taxonomy = 'productosgenero';

?>

<?php 
    global $wp_query;
    $wp_query = new WP_Query( array(
        'post_type' => 'producto', 
        'posts_per_page' => 500,
        'post_status' => 'publish'
    ));
?>

<section class="banner pt-body">
    <div class="contenedor">
        <h1><?php the_title(); ?></h1>
        <span><?php the_title(); ?></span>
    </div>
</section>

<?php 
    $terms = get_terms(array(
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
    ));
?>

<?php if (!empty($terms) && !is_wp_error($terms)): ?>
<div class="filter w-100">
    <div class="contenedor">
        <div class="w-100 filter_box">
            <ul>
                <li>
                    <a href="<?php echo esc_url(home_url('productos')) ?>" class="active">Todos los productos</a>
                </li>
                <?php foreach ($terms as $term): ?>
                <?php $id_category = $term->term_id; ?>
                <li>
                    <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="productos">
    <div class="contenedor">
        <?php if ( have_posts() ) : ?>
        <div class="grilla">
            <?php while ( have_posts() ) : the_post();?>
            <?php if(has_post_thumbnail()): ?>
            <div class="product">
                <div class="product_image">
                    <?php
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_image_src( $thumbID, 'thumbnail' );
                        echo '<img src="'.$imgDestacada[0].'" alt="'.get_the_title().'" title="'.get_the_title().'">';
                    ?>
                </div>
                <div class="product_text">
                    <p><?php the_title();?></p>
                    
                    <?php 
                        // $product_excerpt = get_the_excerpt(); if (!empty($product_excerpt)): 
                        if( !empty(get_field('descripcion')) || !empty(get_field('beneficios')) ):
                    ?>
                    <a href="<?php the_permalink(); ?>">M&aacute;s informaci&oacute;n</a>
                    <?php endif; ?>
                    
                </div>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <p class="no-one">No hay productos disponibles</p>
        <?php endif; ?>
    </div>
</div>

<?php get_template_part('inc/contacto'); ?>

<?php get_footer(); ?>