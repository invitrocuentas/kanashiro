<?php if(have_rows('valores','option')): ?>
<div class="contenedor">
    <div class="valores">
        <h2 class="down">Nuestros valores</h2>
        <div class="grilla">
            <?php while(have_rows('valores','option')): the_row(); ?>
            <div class="w-100 valor">
                <div class="valor_img">
                    <img 
                        src="<?php echo get_sub_field('imagen_valor')['url'] ?>" 
                        title="<?php echo get_sub_field('imagen_valor')['title'] ?>" 
                        alt="<?php echo get_sub_field('imagen_valor')['alt'] ?>" 
                        width="<?php echo get_sub_field('imagen_valor')['width'] ?>" 
                        height="<?php echo get_sub_field('imagen_valor')['height'] ?>" 
                        loading="lazy" class="w-100"
                    >
                </div>
                <div class="valor_txt">
                    <p><?php echo get_sub_field('nombre_valor'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="splide valores_responsive" id="valores">
            <div class="splide__track">
		        <ul class="splide__list">
                    <?php while(have_rows('valores','option')): the_row(); ?>
			        <li class="splide__slide">
                        <div class="w-100 valor">
                            <div class="valor_img">
                                <img 
                                    src="<?php echo get_sub_field('imagen_valor')['url'] ?>" 
                                    title="<?php echo get_sub_field('imagen_valor')['title'] ?>" 
                                    alt="<?php echo get_sub_field('imagen_valor')['alt'] ?>" 
                                    width="<?php echo get_sub_field('imagen_valor')['width'] ?>" 
                                    height="<?php echo get_sub_field('imagen_valor')['height'] ?>" 
                                    loading="lazy" class="w-100"
                                >
                            </div>
                            <div class="valor_txt">
                                <p><?php echo get_sub_field('nombre_valor'); ?></p>
                            </div>
                        </div>      
                    </li>
                    <?php endwhile; ?>
		        </ul>
            </div>
        </div>

    </div>
</div>
<?php endif; ?>