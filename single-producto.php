<?php 

get_header();

$ID = get_the_ID();

$taxonomy  = 'productosgenero';
$product_category = get_the_terms( $ID, $taxonomy );

$thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

if($product_category && !is_wp_error($product_category)){
    $category_ids = array();
    foreach($product_category as $category){
        $category_ids[] = $category->term_id;
    }
    // Obtener otros productos de la misma categoría
    $args = array(
        'post_type' => 'producto',
        'post__not_in' => array(get_the_ID()), // Excluir el producto actual
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $category_ids,
                'operator' => 'IN'
            )
        )
    );

    $args2 = array(
        'post_type' => 'producto',
        'post__not_in' => array(get_the_ID()), // Excluir el producto actual
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $category_ids,
                'operator' => 'IN'
            )
        )
    );

    $related_products = new WP_Query($args);
    $related_products2 = new WP_Query($args2);
    // var_dump($related_products);
}

?>

<section class="pt-body single-product">
    <div class="contenedor">
        <div class="row stretch">
            <div class="col">
                <div class="splide" id="single">
                    <div class="splide__track">
		                <ul class="splide__list">
			                <li class="splide__slide">
                                <?php echo $thumbnail; ?>
                            </li>
                            <?php if($related_products->have_posts()): ?>
                                <?php while($related_products->have_posts()): $related_products->the_post(); ?>
                                <li class="splide__slide">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php wp_reset_query(); ?>
                            <?php endif; ?>
		                </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="splide" id="information">
                    <div class="splide__track">
		                <ul class="splide__list">
			                <li class="splide__slide">
                                <div class="contenido">
                                    <div class="titulo">
                                        <h2><?php echo get_the_title(); ?></h2>
                                    </div>
                                    <div class="descripcion">
                                        <p><?php echo get_the_excerpt(); ?></p>
                                        <a href="<?php echo get_permalink(); ?>">
                                            <p>Ver más</p>
                                            <svg width="19" height="13" viewBox="0 0 19 13" fill="#1B263A" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.64 4.45913C12.9892 3.80833 12.3987 3.22797 11.8199 2.63444C11.6756 2.49038 11.5614 2.31917 11.4837 2.1307C11.4061 1.94223 11.3665 1.74024 11.3674 1.53639C11.3682 1.33255 11.4095 1.1309 11.4887 0.943084C11.568 0.755272 11.6836 0.585028 11.8291 0.442183C11.9745 0.299337 12.1468 0.186729 12.336 0.110857C12.5252 0.0349851 12.7275 -0.00264592 12.9314 0.00014457C13.1352 0.00293506 13.3364 0.046091 13.5235 0.127114C13.7105 0.208137 13.8797 0.325418 14.0211 0.472191C15.3481 1.79002 16.6664 3.11444 17.9888 4.43581C18.0921 4.54363 18.2018 4.64519 18.3172 4.73993C18.5137 4.87461 18.6769 5.05218 18.7946 5.25922C18.9124 5.46626 18.9815 5.69735 18.9968 5.93502C19.012 6.1727 18.9731 6.41074 18.8829 6.63115C18.7926 6.85157 18.6535 7.04858 18.4759 7.20731C17.0618 8.63293 15.6426 10.0533 14.2183 11.4685C14.0059 11.6808 13.8007 11.9003 13.5792 12.102C13.2795 12.3806 12.8834 12.5318 12.4743 12.524C12.0653 12.5162 11.6752 12.3498 11.3865 12.06C11.2463 11.9137 11.1364 11.7413 11.0631 11.5524C10.9897 11.3636 10.9544 11.1622 10.9591 10.9597C10.9638 10.7572 11.0085 10.5576 11.0905 10.3724C11.1725 10.1872 11.2904 10.02 11.4372 9.88047C12.1752 9.13539 12.9192 8.3969 13.682 7.63408C13.5532 7.5681 13.4063 7.54638 13.2639 7.57225C9.42124 7.56988 5.57842 7.56988 1.73543 7.57225C1.46382 7.59674 1.19043 7.5515 0.941194 7.44081C0.691954 7.33011 0.475108 7.15763 0.311165 6.93969C0.133342 6.70875 0.0267299 6.43097 0.00440314 6.14036C-0.0179236 5.84975 0.044996 5.55894 0.185457 5.30356C0.312698 5.0414 0.514444 4.8226 0.765446 4.67456C1.01645 4.52652 1.30555 4.45581 1.59654 4.47129C3.24687 4.4647 4.89719 4.46876 6.54701 4.46876H13.1939C13.3085 4.47028 13.4225 4.46471 13.64 4.45913Z" fill="#1B263A"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="w-100 to_similars">
                                        <button id="similars">Ver productos similares</button>
                                    </div>
                                </div>
                            </li>
                            <?php if($related_products->have_posts()): ?>
                                <?php while($related_products->have_posts()): $related_products->the_post(); ?>
                                <li class="splide__slide">
                                    <div class="contenido">
                                        <div class="titulo">
                                            <h2><?php echo get_the_title(); ?></h2>
                                        </div>
                                        <div class="descripcion">
                                            <?php
                                                $excerpt = get_the_excerpt();
                                                if (!empty($excerpt)) {
                                                    echo '<p>'.$excerpt.'</p>';
                                                }
                                            ?>
                                            <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                                <p>Ver más</p>
                                                <svg width="19" height="13" viewBox="0 0 19 13" fill="#1B263A" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.64 4.45913C12.9892 3.80833 12.3987 3.22797 11.8199 2.63444C11.6756 2.49038 11.5614 2.31917 11.4837 2.1307C11.4061 1.94223 11.3665 1.74024 11.3674 1.53639C11.3682 1.33255 11.4095 1.1309 11.4887 0.943084C11.568 0.755272 11.6836 0.585028 11.8291 0.442183C11.9745 0.299337 12.1468 0.186729 12.336 0.110857C12.5252 0.0349851 12.7275 -0.00264592 12.9314 0.00014457C13.1352 0.00293506 13.3364 0.046091 13.5235 0.127114C13.7105 0.208137 13.8797 0.325418 14.0211 0.472191C15.3481 1.79002 16.6664 3.11444 17.9888 4.43581C18.0921 4.54363 18.2018 4.64519 18.3172 4.73993C18.5137 4.87461 18.6769 5.05218 18.7946 5.25922C18.9124 5.46626 18.9815 5.69735 18.9968 5.93502C19.012 6.1727 18.9731 6.41074 18.8829 6.63115C18.7926 6.85157 18.6535 7.04858 18.4759 7.20731C17.0618 8.63293 15.6426 10.0533 14.2183 11.4685C14.0059 11.6808 13.8007 11.9003 13.5792 12.102C13.2795 12.3806 12.8834 12.5318 12.4743 12.524C12.0653 12.5162 11.6752 12.3498 11.3865 12.06C11.2463 11.9137 11.1364 11.7413 11.0631 11.5524C10.9897 11.3636 10.9544 11.1622 10.9591 10.9597C10.9638 10.7572 11.0085 10.5576 11.0905 10.3724C11.1725 10.1872 11.2904 10.02 11.4372 9.88047C12.1752 9.13539 12.9192 8.3969 13.682 7.63408C13.5532 7.5681 13.4063 7.54638 13.2639 7.57225C9.42124 7.56988 5.57842 7.56988 1.73543 7.57225C1.46382 7.59674 1.19043 7.5515 0.941194 7.44081C0.691954 7.33011 0.475108 7.15763 0.311165 6.93969C0.133342 6.70875 0.0267299 6.43097 0.00440314 6.14036C-0.0179236 5.84975 0.044996 5.55894 0.185457 5.30356C0.312698 5.0414 0.514444 4.8226 0.765446 4.67456C1.01645 4.52652 1.30555 4.45581 1.59654 4.47129C3.24687 4.4647 4.89719 4.46876 6.54701 4.46876H13.1939C13.3085 4.47028 13.4225 4.46471 13.64 4.45913Z" fill="#1B263A"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php wp_reset_query(); ?>
                            <?php endif; ?>
		                </ul>
                    </div>
                </div>
                <div class="splide" id="thumbnails">
                    <div class="splide__track">
		                <ul class="splide__list">
			                <li class="splide__slide">
                                <?php echo $thumbnail; ?>
                            </li>
                            <?php if($related_products->have_posts()): ?>
                                <?php while($related_products->have_posts()): $related_products->the_post(); ?>
                                <li class="splide__slide">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php wp_reset_query(); ?>
                            <?php endif; ?>
		                </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="extra_information">
    <div class="contenedor">
        <div class="splide w-100" id="extra">
            <div class="splide__track w-100">
                <ul class="splide__list w-100">
                    <li class="splide__slide w-100">
                        <div class="row start w-100">
                            
                            <?php if(!empty(get_field('descripcion'))): ?>
                            <div class="col">
                                <h3>Descripción:</h3>
                                <?php echo get_field('descripcion') ?>
                            </div>
                            <?php else: ?>
                                <?php if(!empty(get_field('beneficios'))): ?>
                                <div class="col">
                                    <h3>Beneficios:</h3>
                                    <?php echo get_field('beneficios') ?>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty(get_field('usos'))): ?>
                            <div class="col">
                                <h3>Usos:</h3>
                                <?php echo get_field('usos') ?>
                            </div>
                            <?php endif; ?>

                        </div>
                        <?php if(!empty(get_field('forma_de_distribucion'))): ?>
                        <div class="row">
                            <div class="dist_way">
                                <h3 class="up">Forma de distribución:<b><?php echo get_field('forma_de_distribucion') ?></b></h3>
                            </div>
                        </div>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(home_url('productos')) ?>" class="back">
                            <svg width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.36399 2L2 8.364L8.36399 14.7279" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 8.36426H24.6722C31.557 8.36426 37.2122 13.8031 37.4805 20.6827C37.7641 27.9523 31.9474 34.0003 24.6722 34.0003H8" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p>Volver a productos</p>
                        </a>
                    </li>
                    <?php if($related_products->have_posts()): ?>
                        <?php while($related_products->have_posts()): $related_products->the_post(); ?>
                        <li class="splide__slide w-100">
                            <div class="row start w-100">
                                
                                <?php if(!empty(get_field('descripcion'))): ?>
                                <div class="col">
                                    <h3>Descripción:</h3>
                                    <?php echo get_field('descripcion') ?>
                                </div>
                                <?php else: ?>
                                    <?php if(!empty(get_field('beneficios'))): ?>
                                    <div class="col">
                                        <h3>Beneficios:</h3>
                                        <?php echo get_field('beneficios') ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                    
                                <?php if(!empty(get_field('usos'))): ?>
                                <div class="col">
                                    <h3>Usos:</h3>
                                    <?php echo get_field('usos') ?>
                                </div>
                                <?php endif; ?>

                            </div>
                            <?php if(!empty(get_field('forma_de_distribucion'))): ?>
                            <div class="row">
                                <div class="dist_way">
                                    <h3 class="up">Forma de distribución:<b><?php echo get_field('forma_de_distribucion') ?></b></h3>
                                </div>
                            </div>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(home_url('productos')) ?>" class="back">
                                <svg width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.36399 2L2 8.364L8.36399 14.7279" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8.36426H24.6722C31.557 8.36426 37.2122 13.8031 37.4805 20.6827C37.7641 27.9523 31.9474 34.0003 24.6722 34.0003H8" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p>Volver a productos</p>
                            </a>
                        </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php wp_reset_query(); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php if($related_products2->have_posts()): ?>
<section class="productos_similares">
    <div class="contenedor">
        <div class="grilla">
            <?php while($related_products2->have_posts()): $related_products2->the_post(); ?>
            <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                <?php echo get_the_post_thumbnail(); ?>
            </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_template_part('inc/contacto'); ?>

<?php get_footer(); ?>