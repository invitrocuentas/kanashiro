<?php
/*
    Template name: inicio
*/

get_header();
?>

<h1 class="hidden"><?php echo get_the_title(); ?></h1>

<main class="pt-body">
    <div class="contenedor h-100">
        <section class="splide h-100" id="hero">
            <div class="splide__track h-100">
                <ul class="splide__list h-100">
                    <li class="splide__slide wh-100 slide p-relative">
                        <div class="title title_1 p-absolute">
                            <h2>Cementos</h2>
                        </div>
                        <div class="images p-absolute h-100">
                            <img src="<?php echo IMG; ?>/cemento1.png" class="cemento cemento_1">
                            <img src="<?php echo IMG; ?>/cemento2.png" class="cemento cemento_2">
                            <img src="<?php echo IMG; ?>/cemento3.png" class="cemento cemento_3">
                            <img src="<?php echo IMG; ?>/cemento4.png" class="cemento cemento_4">
                        </div>
                    </li>
                    <li class="splide__slide wh-100 slide p-relative">
                        <div class="title title_2 p-absolute">
                            <h2>Ladrillos</h2>
                        </div>
                        <div class="images p-absolute h-100">
                            <img src="<?php echo IMG; ?>/ladrillo.png" class="ladrillo ladrillo_1">
                            <img src="<?php echo IMG; ?>/ladrillo.png" class="ladrillo ladrillo_2">
                            <img src="<?php echo IMG; ?>/ladrillo.png" class="ladrillo ladrillo_3">
                        </div>
                    </li>
                    <li class="splide__slide wh-100 slide p-relative">
                        <div class="title title_3 p-absolute">
                            <h2>Fierros</h2>
                        </div>
                        <div class="images p-absolute h-100">
                            <img src="<?php echo IMG; ?>/fierros.png" class="fierros">
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</main>

<div class="valores_contenedor w-100">
    <?php get_template_part('inc/valores'); ?>
</div>

<?php 
    $wp_query = new WP_Query( array(
        'post_type' => 'sede', 
        'posts_per_page' => 10,
        'post_status' => 'publish'
    ));
?>

<?php if ( have_posts($wp_query) ) : ?>
<section class="sedes">
    <div class="contenedor">
        <h2>Nuestras sedes</h2>
        <span>Nuestras sedes</span>
        <div class="grilla">
            <?php while ( have_posts($wp_query) ) : the_post($wp_query);?>
            <div class="local">
                <div class="local_image">
                    <?php
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_image_src( $thumbID, 'thumbnail' );
                        echo '<img src="'.$imgDestacada[0].'" title="'.get_the_title().'" alt="'.get_the_title().'">';
                    ?>
                </div>
                <div class="local_info p-absolute">
                    <h3>
                        Local
                        <b><?php echo get_the_title(); ?></b>
                    </h3>
                    <p><?php echo get_field('direccion') ?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="nosotros">
    <?php if(have_rows('fondos')): ?>
    <div class="splide p-absolute wh-100" id="bg_nosotros">
        <div class="splide__track wh-100">
    		<ul class="splide__list wh-100">
                <?php while(have_rows('fondos')): the_row(); ?>
    			<li class="splide__slide wh-100">
                    <picture class="wh-100" style="display:block">
                        <source media="(min-width:768px)" srcset="<?php echo get_sub_field('imagen_fondo')['url'] ?>">
                        <img 
                            src="<?php echo get_sub_field('imagen_mobile')['url'] ?>" 
                            title="<?php echo get_sub_field('imagen_mobile')['title'] ?>" 
                            alt="<?php echo get_sub_field('imagen_mobile')['alt'] ?>" 
                            width="<?php echo get_sub_field('imagen_mobile')['width'] ?>" 
                            height="<?php echo get_sub_field('imagen_mobile')['height'] ?>" 
                            loading="lazy" class="wh-100"
                        >
                    </picture>
                </li>
                <?php endwhile; ?>
    		</ul>
        </div>
    </div>
    <?php endif; ?>
    <div class="contenedor h-100">
        <h2><?php echo get_field('titulo_nosotros') ?></h2>
        <span><?php echo get_field('titulo_nosotros') ?></span>
        <div class="contenido">
            <?php echo get_field('descripcion_nosotros') ?>
            <a href="<?php echo esc_url(home_url('nosotros')) ?>" title="Nosotros" alt="Nosotros">
                <p>Ver más</p>
                <svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.64 4.45913C12.9892 3.80833 12.3987 3.22797 11.8199 2.63444C11.6756 2.49038 11.5614 2.31917 11.4837 2.1307C11.4061 1.94223 11.3665 1.74024 11.3674 1.53639C11.3682 1.33255 11.4095 1.1309 11.4887 0.943084C11.568 0.755272 11.6836 0.585028 11.8291 0.442183C11.9745 0.299337 12.1468 0.186729 12.336 0.110857C12.5252 0.0349851 12.7275 -0.00264592 12.9314 0.00014457C13.1352 0.00293506 13.3364 0.046091 13.5235 0.127114C13.7105 0.208137 13.8797 0.325418 14.0211 0.472191C15.3481 1.79002 16.6664 3.11444 17.9888 4.43581C18.0921 4.54363 18.2018 4.64519 18.3172 4.73993C18.5137 4.87461 18.6769 5.05218 18.7946 5.25922C18.9124 5.46626 18.9815 5.69735 18.9968 5.93502C19.012 6.1727 18.9731 6.41074 18.8829 6.63115C18.7926 6.85157 18.6535 7.04858 18.4759 7.20731C17.0618 8.63293 15.6426 10.0533 14.2183 11.4685C14.0059 11.6808 13.8007 11.9003 13.5792 12.102C13.2795 12.3806 12.8834 12.5318 12.4743 12.524C12.0653 12.5162 11.6752 12.3498 11.3865 12.06C11.2463 11.9137 11.1364 11.7413 11.0631 11.5524C10.9897 11.3636 10.9544 11.1622 10.9591 10.9597C10.9638 10.7572 11.0085 10.5576 11.0905 10.3724C11.1725 10.1872 11.2904 10.02 11.4372 9.88047C12.1752 9.13539 12.9192 8.3969 13.682 7.63408C13.5532 7.5681 13.4063 7.54638 13.2639 7.57225C9.42124 7.56988 5.57842 7.56988 1.73543 7.57225C1.46382 7.59674 1.19043 7.5515 0.941194 7.44081C0.691954 7.33011 0.475108 7.15763 0.311165 6.93969C0.133342 6.70875 0.0267299 6.43097 0.00440314 6.14036C-0.0179236 5.84975 0.044996 5.55894 0.185457 5.30356C0.312698 5.0414 0.514444 4.8226 0.765446 4.67456C1.01645 4.52652 1.30555 4.45581 1.59654 4.47129C3.24687 4.4647 4.89719 4.46876 6.54701 4.46876H13.1939C13.3085 4.47028 13.4225 4.46471 13.64 4.45913Z" fill="white"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<?php 
    $categories = get_terms(array(
        'taxonomy' => 'productosgenero',
        'hide_empty' => false,
        'parent' => 0
    ));
?>

<?php if(!empty($categories)): ?>
<section class="categorias">
    <div class="contenedor">
        <h2>Productos</h2>
        <span>Productos</span>
        <div class="grilla">
            <?php foreach ($categories as $category): ?>
                <?php $category_link = get_term_link($category); ?>
                <div class="product_category w-100">
                    <div class="w-100">
                        <img src="<?php echo get_taxonomy_image($category->term_id); ?>" 
                            alt="<?php echo $category->name; ?>" 
                            title="<?php echo $category->name; ?>" 
                            loading="lazy">
                    </div>
                    <p><?php echo $category->name; ?></p>
                    <a title="<?php echo $category->name; ?>" href="<?php echo esc_url($category_link); ?>">
                        <p>Ver más</p>
                        <svg width="16" height="13" viewBox="0 0 19 13" fill="#1B263A" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.64 4.45913C12.9892 3.80833 12.3987 3.22797 11.8199 2.63444C11.6756 2.49038 11.5614 2.31917 11.4837 2.1307C11.4061 1.94223 11.3665 1.74024 11.3674 1.53639C11.3682 1.33255 11.4095 1.1309 11.4887 0.943084C11.568 0.755272 11.6836 0.585028 11.8291 0.442183C11.9745 0.299337 12.1468 0.186729 12.336 0.110857C12.5252 0.0349851 12.7275 -0.00264592 12.9314 0.00014457C13.1352 0.00293506 13.3364 0.046091 13.5235 0.127114C13.7105 0.208137 13.8797 0.325418 14.0211 0.472191C15.3481 1.79002 16.6664 3.11444 17.9888 4.43581C18.0921 4.54363 18.2018 4.64519 18.3172 4.73993C18.5137 4.87461 18.6769 5.05218 18.7946 5.25922C18.9124 5.46626 18.9815 5.69735 18.9968 5.93502C19.012 6.1727 18.9731 6.41074 18.8829 6.63115C18.7926 6.85157 18.6535 7.04858 18.4759 7.20731C17.0618 8.63293 15.6426 10.0533 14.2183 11.4685C14.0059 11.6808 13.8007 11.9003 13.5792 12.102C13.2795 12.3806 12.8834 12.5318 12.4743 12.524C12.0653 12.5162 11.6752 12.3498 11.3865 12.06C11.2463 11.9137 11.1364 11.7413 11.0631 11.5524C10.9897 11.3636 10.9544 11.1622 10.9591 10.9597C10.9638 10.7572 11.0085 10.5576 11.0905 10.3724C11.1725 10.1872 11.2904 10.02 11.4372 9.88047C12.1752 9.13539 12.9192 8.3969 13.682 7.63408C13.5532 7.5681 13.4063 7.54638 13.2639 7.57225C9.42124 7.56988 5.57842 7.56988 1.73543 7.57225C1.46382 7.59674 1.19043 7.5515 0.941194 7.44081C0.691954 7.33011 0.475108 7.15763 0.311165 6.93969C0.133342 6.70875 0.0267299 6.43097 0.00440314 6.14036C-0.0179236 5.84975 0.044996 5.55894 0.185457 5.30356C0.312698 5.0414 0.514444 4.8226 0.765446 4.67456C1.01645 4.52652 1.30555 4.45581 1.59654 4.47129C3.24687 4.4647 4.89719 4.46876 6.54701 4.46876H13.1939C13.3085 4.47028 13.4225 4.46471 13.64 4.45913Z" fill="#1B263A"/>
                        </svg>
                    </a>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(have_rows('clientes')): ?>
<section class="respaldo">
    <div class="contenedor">
        <div class="contenido">
            <h3><?php echo get_field('titulo_c') ?></h3>
            <?php echo get_field('descripcion_c') ?>
        </div>
        <div class="splide" id="clientes">
            <div class="splide__track">
		        <ul class="splide__list">
                    <?php while(have_rows('clientes')): the_row(); ?>
			        <li class="splide__slide">
                        <div class="logo">
                            <img 
                                src="<?php echo get_sub_field('logo')['url'] ?>" 
                                title="<?php echo get_sub_field('logo')['title'] ?>" 
                                alt="<?php echo get_sub_field('logo')['alt'] ?>" 
                                width="<?php echo get_sub_field('logo')['width'] ?>" 
                                height="<?php echo get_sub_field('logo')['height'] ?>" 
                                loading="lazy" class="wh-100"
                            >
                        </div>
                    </li>
                    <?php endwhile; ?>
		        </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<style>.contactanos{margin-top:0 !important}</style>

<?php 
    get_template_part('inc/contacto');
    get_template_part('inc/ubicanos');
?>

<?php get_footer(); ?>