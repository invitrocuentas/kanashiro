<?php
/*
    Template name: 404
*/

get_header();

?>

<section class="pt-body page_404">
    <div class="contenedor">
        <h1>
            <span>4</span>
            <span>0</span>
            <span>4</span>
        </h1>
        <a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo get_bloginfo('name'); ?>" class="back">Volver al inicio</a>
    </div>
</section>

<?php get_footer(); ?>