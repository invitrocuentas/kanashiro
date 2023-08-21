<?php
/*
    Template name: productos
*/

get_header();

$taxonomy = 'productosgenero';

?>

<?php 
    global $wp_query, $paged, $paginas;

    $curpage = $paged ? $paged : 1;

    $wp_query = new WP_Query( array(
        'post_type' => 'producto', 
        'posts_per_page' => 12,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $paged
    ));

    remove_filter( 'posts_where', 'title_filter', 10, 2 );
    $paginas = intval($wp_query->max_num_pages);
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
                    <a href="<?php echo esc_url(home_url('productos')) ?>" class="active" title="Todos los productos">Todos los productos</a>
                </li>
                <?php foreach ($terms as $term): ?>
                <?php $id_category = $term->term_id; ?>
                <li>
                    <a href="<?php echo get_term_link($term); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="filter_responsive w-100">
    <div class="contenedor">
        <details>
            <summary><i class="fas fa-times"></i><i class="fas fa-minus"></i> Todos los productos</summary>
            <div class="w-100">
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('productos')) ?>" class="active" title="Todos los productos">Todos los productos</a>
                    </li>
                    <?php foreach ($terms as $term): ?>
                    <?php $id_category = $term->term_id; ?>
                    <li>
                        <a href="<?php echo get_term_link($term); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
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
                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">M&aacute;s informaci&oacute;n</a>
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
    <div class="contenedor pagination">
        <div class="pagination_links">
            <?php if($curpage==$wp_query->max_num_pages): ?>
            <a class="next page" href="<?php echo get_pagenum_link($curpage-1)?>" title="Ver m&aacute;s">
                <i class="fas fa-angle-left"></i> Ver menos
            </a>
            <?php endif; ?>

            <?php for( $i = 1; $i <= $paginas; $i++ ): ?>
                <a class="<?php echo ($i == $curpage ? 'active ' : '')?> page" href="<?php echo get_pagenum_link($i)?>" title="P&aacute;gina <?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if($curpage!=$wp_query->max_num_pages): ?>
            <a class="next page" href="<?php echo get_pagenum_link(($curpage+1 <= $wp_query->max_num_pages ? $curpage+1 : $wp_query->max_num_pages))?>" title="Ver m&aacute;s">
                Ver m&aacute;s <i class="fas fa-angle-right"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part('inc/contacto'); ?>

<?php get_footer(); ?>