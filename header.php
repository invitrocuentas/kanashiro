<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b72be65822.js" crossorigin="anonymous"></script>
    <?php wp_head();?>
    
    <?php if (is_404()): ?>
    <title><?php esc_attr_e("InVitro | Página de Error"); ?></title>
    <?php else: ?>
    <title><?php the_title();?></title>
    <?php endif; ?>

</head>
<body <?php body_class(); ?>>

<?php //get_search_form(); ?>

<header>
    <input type="hidden" name="white_logo" value="<?php echo IMG; ?>/logo.svg">
    <input type="hidden" name="color_logo" value="<?php echo IMG; ?>/logo-2.svg">
    
    <div class="contenedor">
        <a href="<?php echo esc_url(home_url('/')) ?>">
            <img src="<?php echo IMG; ?>/logo.svg" class="logo" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
        </a>
    </div>
    <nav>
        <div class="contenedor">
            <?php wp_nav_menu(array('theme_location'=>'header-menu','container_class'=>'top-menus-wrapper','menu_class'=>'ul_menu')); ?>
        </div>
    </nav>
</header>


