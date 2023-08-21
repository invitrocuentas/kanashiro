<?php
    $query = new WP_Query(array(
        'post_type' => 'sede',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
?>

<?php if ( $query->have_posts() ) : ?>
<section class="ubicanos">
    <div class="contenedor p-relative">
        <span>Ub&iacute;canos</span>
        <div class="row">
            <div class="col">
                <h2>Ub&iacute;canos</h2>
                <div class="splide" id="photo">
                    <div class="splide__track">
		                <ul class="splide__list">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
			                <li class="splide__slide">
                                <?php
                                    $thumbID = get_post_thumbnail_id( $post->ID );
                                    $imgDestacada = wp_get_attachment_image_src( $thumbID, 'thumbnail' );
                                    echo '<img src="'.$imgDestacada[0].'" title="'.get_the_title().'" alt="'.get_the_title().'">';
                                ?>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
		                </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2>Ub&iacute;canos</h2>
                <div class="splide" id="ubication">
                    <div class="splide__track">
		                <ul class="splide__list">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
			                <li class="splide__slide">
                                <ul class="info w-100">
                                    <?php if(!empty(get_field('direccion'))): ?>    
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/marker.svg" title="Ubicaci&oacute;n" alt="Ubicaci&oacute;n">
                                        <div>
                                            <h3>Sede <?php echo get_the_title(); ?></h3>
                                            <p><?php echo get_field('direccion') ?></p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(!empty(get_field('telefono__celular'))): ?>
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/phone.svg" title="Tel&eacute;fono" alt="Tel&eacute;fono">
                                        <div>
                                            <h3>Tel&eacute;fono / celular</h3>
                                            <p><?php echo get_field('telefono__celular') ?></p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty(get_field('correo_electronico'))): ?>
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/mail.svg" title="Correo" alt="Correo">
                                        <div>
                                            <h3>Correo electrónico</h3>
                                            <p>
                                                <a href="mailto:<?php echo get_field('correo_electronico') ?>" title="Correo"><?php echo get_field('correo_electronico') ?></a>
                                            </p>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(!empty(get_field('horario_de_atencion'))): ?>
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/schedule.svg" title="Horario" alt="Horario">
                                        <div>
                                            <h3>Horario de atención</h3>
                                            <?php echo get_field('horario_de_atencion') ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
		                </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>