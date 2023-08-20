<?php
/*
    Template name: nosotros
*/

get_header();

?>

<section class="banner pt-body">
    <div class="contenedor">
        <h1>¿Qui&eacute;nes somos?</h1>
        <span>¿Qui&eacute;nes somos?</span>
    </div>
</section>

<section class="quienes_somos">
    <div class="w-100 somos_descripcion">
        <div class="contenedor">
            <div class="row start">
                <div class="col">
                    <img src="<?php echo get_field('imagen_qs')['url'] ?>" 
                        alt="<?php echo get_field('imagen_qs')['alt'] ?>" 
                        title="<?php echo get_field('imagen_qs')['title'] ?>" 
                        width="<?php echo get_field('imagen_qs')['width'] ?>" 
                        height="<?php echo get_field('imagen_qs')['height'] ?>" 
                        loading="lazy" class="w-100">
                </div>
                <div class="col">
                    <div>
                        <?php echo get_field('descripcion_qs') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 mision">
        <div class="contenedor">
            <div class="row">
                <div class="col contenido">
                    <span>Misión <img src="<?php echo IMG; ?>/mision.svg"></span>
                    <p><?php echo get_field('descripcion_m') ?></p>
                </div>
                <div class="col imagen">
                    <img src="<?php echo get_field('imagen_m')['url'] ?>" 
                        alt="<?php echo get_field('imagen_m')['alt'] ?>" 
                        title="<?php echo get_field('imagen_m')['title'] ?>" 
                        width="<?php echo get_field('imagen_m')['width'] ?>" 
                        height="<?php echo get_field('imagen_m')['height'] ?>" 
                        loading="lazy" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 vision">
        <div class="contenedor">
            <div class="row">
                <div class="col imagen">
                    <img src="<?php echo get_field('imagen_v')['url'] ?>" 
                        alt="<?php echo get_field('imagen_v')['alt'] ?>" 
                        title="<?php echo get_field('imagen_v')['title'] ?>" 
                        width="<?php echo get_field('imagen_v')['width'] ?>" 
                        height="<?php echo get_field('imagen_v')['height'] ?>" 
                        loading="lazy" class="w-100">
                </div>
                <div class="col contenido">
                    <span>Visión <img src="<?php echo IMG; ?>/vision.svg"></span>
                    <p><?php echo get_field('descripcion_v') ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 nosotros_valores">
        <?php get_template_part('inc/valores'); ?>
    </div>
</section>

<?php get_template_part('inc/ubicanos'); ?>

<?php get_footer(); ?>