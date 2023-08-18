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
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/marker.svg">
                                        <div>
                                            <h3>Sede <?php echo get_the_title(); ?></h3>
                                            <p><?php echo get_field('direccion') ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/phone.svg">
                                        <div>
                                            <h3>Teléfono / celular</h3>
                                            <p><?php echo get_field('telefono__celular') ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/mail.svg">
                                        <div>
                                            <h3>Correo electrónico</h3>
                                            <p><?php echo get_field('correo_electronico') ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="<?php echo IMG; ?>/sede/schedule.svg">
                                        <div>
                                            <h3>Horario de atención</h3>
                                            <?php echo get_field('horario_de_atencion') ?>
                                        </div>
                                    </li>
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