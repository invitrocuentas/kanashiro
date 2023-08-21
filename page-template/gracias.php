<?php
/*
    Template name: gracias
*/

get_header();

?>

<section class="thanks pt-body">
    <div class="contenedor">
        <h1>¡Gracias por contactarnos!</h1>
        <p>Nos comunicaremos contigo a la brevedad</p>
        <a href="<?php echo esc_url(home_url('/')) ?>" class="back" title="Inicio">Volver al inicio</a>
        <p>Puedes seguirnos en nuestras redes sociales</p>
        <?php get_template_part('inc/redes'); ?>
    </div>
</section>

<?php get_footer(); ?>