<?php
/*
    Template name: productos mostrar todos
*/

get_header();

$ID = get_queried_object_id();

$taxonomy  = 'productosgenero';

$category = get_term($ID);

?>

<section class="banner pt-body">
    <div class="contenedor">
        <h1><?php echo $category->name ?></h1>
        <span><?php echo $category->name ?></span>
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
                    <a href="<?php echo esc_url(home_url('productos')) ?>">Todos los productos</a>
                </li>
                <?php foreach ($terms as $term): ?>
                <?php 
                    $id_category = $term->term_id; 
                    if($id_category == $ID):
                ?>
                    <li>
                        <a href="<?php echo get_term_link($term); ?>" class="active"><?php echo $term->name; ?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
                    </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="filter_responsive w-100">
    <div class="contenedor">
        <details>
            <summary><i class="fas fa-times"></i><i class="fas fa-minus"></i> <?php echo $category->name ?></summary>
            <div class="w-100">
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
        </details>
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