<footer>
    <div class="contenedor">
        <div class="grilla">
            <div class="information w-100">
                <div class="information_description">
                    <div class="contenido">
                        <img src="<?php echo IMG; ?>/logo.svg" class="logo" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                        <p>Somos una empresa dedicada a la comercialización, al por mayor y menor, de todos los materiales que necesitas para construir lo que tanto anhelas. Tenemos más de 28 años de experiencia con grandes obras concluidas con los mejores productos del mercado.</p>
                    </div>
                </div>
                <div class="information_nav">
                    <?php wp_nav_menu(array('theme_location'=>'header-menu','container_class'=>'top-menus-wrapper','menu_class'=>'ul_menu')); ?>
                </div>
            </div>
            <?php get_template_part('inc/ubicaciones'); ?>
        </div>
    </div>
    <div class="contenedor">
        <div class="follow_me">
            <p>Síguenos en nuestras redes:</p>
            <?php get_template_part('inc/redes'); ?>
        </div>
    </div>
</footer>

<?php if(!empty(get_option('whatsapp'))): ?>
<a href="<?php echo get_option('whatsapp') ?>" title="WhatsApp" class="whatsapp" target="_blank">
    <img src="<?php echo IMG; ?>/whatsapp.png" alt="WhatsApp" title="WhatsApp">
</a>
<?php endif; ?>

<?php wp_footer();?>

<script>
    function paddingTop(){
        let h = document.querySelector('header').clientHeight;const pt = document.querySelector('.pt-body');pt.style.paddingTop = `${h}px`;
    }window.onpaint = paddingTop();
</script>

</body>
</html>