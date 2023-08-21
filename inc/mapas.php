<?php
    $sedes = new WP_Query(array(
        'post_type' => 'sede',
        'posts_per_page' => 100,
        'post_status' => 'publish'
    ));
?>

<?php if ($sedes->have_posts()) : ?>

    <section class="w-100">
        <div class="splide w-100" id="localizaciones">
            <div class="splide__track w-100">
                <ul class="splide__list w-100">
                    <?php while ($sedes->have_posts()) : $sedes->the_post(); ?>

                        <?php if (!empty(get_field('mapa_grande'))) : ?>
                            <li class="splide__slide w-100">
                                <img src="<?php echo get_field('mapa_grande')['url'] ?>" 
                                    alt="<?php echo get_field('mapa_grande')['alt'] ?>" 
                                    title="<?php echo get_field('mapa_grande')['title'] ?>" 
                                    width="<?php echo get_field('mapa_grande')['width'] ?>" 
                                    height="<?php echo get_field('mapa_grande')['height'] ?>" 
                                    loading="lazy" class="w-100">
                            </li>
                        <?php endif; ?>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </section>

<?php endif; ?>