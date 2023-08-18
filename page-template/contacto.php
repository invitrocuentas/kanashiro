<?php
/*
    Template name: contacto
*/

get_header();

?>

<section class="banner pt-body">
    <div class="contenedor">
        <h1><?php the_title(); ?></h1>
        <span><?php the_title(); ?></span>
    </div>
</section>

<?php
$wp_query = new WP_Query(array(
    'post_type' => 'sede',
    'posts_per_page' => 100,
    'post_status' => 'publish'
));
?>

<section class="contacto_info">
    <div class="contenedor">
        <div class="row">
            <div class="col">
                <div class="contenido">
                    <ul>
                        <?php if( !empty(get_option('nro_1')) || !empty(get_option('nro_2')) || !empty(get_option('nro_3')) ): ?>
                        <li>
                            <img src="<?php echo IMG; ?>/sede/phone-blue.svg" alt="Teléfono" title="Teléfono">
                            <div>
                                <p><b>Teléfono / celular</b></p>
                                <p>
                                    <?php if(!empty(get_option('nro_1'))): ?>
                                    <a href="tel:<?php echo get_option('nro_1') ?>" title="Teléfono"><?php echo get_option('nro_1') ?></a> /
                                    <?php endif; ?>

                                    <?php if(!empty(get_option('nro_2'))): ?>
                                    <a href="tel:<?php echo get_option('nro_2') ?>" title="Teléfono"><?php echo get_option('nro_2') ?></a> /
                                    <?php endif; ?>

                                    <?php if(!empty(get_option('nro_3'))): ?>
                                    <a href="tel:<?php echo get_option('nro_3') ?>" title="Teléfono"><?php echo get_option('nro_3') ?></a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if(!empty(get_option('correo'))): ?>
                        <li>
                            <img src="<?php echo IMG; ?>/sede/mail-blue.svg" alt="Correo" title="Correo">
                            <div>
                                <p><b>Correo electrónico</b></p>
                                <p>
                                    <a href="mailto:<?php echo get_option('correo') ?>" title="Correo"><?php echo get_option('correo') ?></a>
                                </p>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php if (have_posts($wp_query)) : ?>
                        <div class="hr"></div>
                        <ul>
                            <?php while (have_posts($wp_query)) : the_post($wp_query); ?>
                                <li>
                                    <img src="<?php echo IMG; ?>/sede/marker-blue.svg" alt="Ubicación" title="Ubicación">
                                    <div>
                                        <p><b>Sede <?php echo get_the_title(); ?></b></p>
                                        <p><?php echo get_field('direccion') ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="box_form">
                    <p>Completa el siguiente formulario te enviaremos la información que necesitas.</p>
                    <?php echo do_shortcode('[contact-form-7 id="99cfef3" title="Formulario de Contacto"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('inc/mapas'); ?>

<?php get_footer(); ?>