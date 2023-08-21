<?php
    $sedes = new WP_Query(array(
        'post_type' => 'sede',
        'posts_per_page' => 3,
        'post_status' => 'publish'
    ));
?>

<?php if ($sedes->have_posts()) : ?>
    <div class="w-100 sedes_list">
        <div class="row">
            <div class="col">
                <div class="splide" id="sedes">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php while ($sedes->have_posts()) : $sedes->the_post(); ?>
                                <li class="splide__slide">
                                    <ul class="info w-100">
                                        <li>
                                            <img src="<?php echo IMG; ?>/sede/marker.svg" title="Ubicaci&oacute;n" alt="Ubicaci&oacute;n">
                                            <div>
                                                <p><b>Sede <?php echo get_the_title(); ?></b></p>
                                                <p><?php echo get_field('direccion') ?></p>
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
            <div class="col">
                <div class="splide" id="mapa">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php while ($sedes->have_posts()) : $sedes->the_post(); ?>
                                <li class="splide__slide">
                                    <img src="<?php echo get_field('mapa')['url'] ?>" 
                                        alt="<?php echo get_field('mapa')['alt'] ?>" 
                                        title="<?php echo get_field('mapa')['title'] ?>" 
                                        width="<?php echo get_field('mapa')['width'] ?>" 
                                        height="<?php echo get_field('mapa')['height'] ?>" 
                                        loading="lazy" class="w-100">
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
<?php endif; ?>