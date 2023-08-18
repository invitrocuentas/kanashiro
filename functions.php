<?php 

/** 
    *InVitro Agencia Digital
    *@link 
    *@package WordPress
    *@subpackage InVitro Agencia Digital
    *@since 1.0.0
    *@version 1.0.0
*/

define('URL',get_stylesheet_directory_uri());
define('IMG',URL.'/images');
define('JS',URL.'/libraries/js');
define('CSS',URL.'/libraries/css');

if(!function_exists ('general_scripts')):
    function general_scripts(){
        wp_register_style('style', get_stylesheet_uri(),array(),'1.0.0','all');
        wp_register_style('maincss', get_template_directory_uri().'/public/css/app.css','1.0.0','all');
        wp_register_style('splidecss', get_template_directory_uri().'/libraries/css/splide.min.css','1.0.0','all');

        wp_enqueue_style('style');
        wp_enqueue_style('maincss');
        wp_enqueue_style('splidecss');
            
        wp_register_script('splidejs', get_template_directory_uri().'/libraries/js/splide.min.js',array(),'1.0.0',true);
        wp_register_script('splideautoscrolljs', get_template_directory_uri().'/libraries/js/splide-extension-auto-scroll.min.js',array(),'1.0.0',true);
        wp_register_script('mainjs', get_template_directory_uri().'/public/js/main.min.js',array(),'1.0.0',true);

        wp_enqueue_script('splidejs');
        wp_enqueue_script('splideautoscrolljs');
        wp_enqueue_script('mainjs');
    }
endif;
add_action('wp_enqueue_scripts', 'general_scripts');

//add postthumbnail function
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

//excerpt 30 word
function my_excerpt_length($length){return 30;}
add_filter('excerpt_length', 'my_excerpt_length');

//registrar menus
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'En la cabecera' )
        )
    );
}
add_action( 'init', 'register_my_menus' );


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'menu_title'  => 'Secciones Repetidas',
        'menu_slug'   => 'theme-general-settings',
        'icon_url'    => 'dashicons-table-row-before',
        'redirect'    => false
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Nuestros Valores',
        'menu_title'  => 'Nuestros Valores',
        'parent_slug' => 'theme-general-settings'
    ));
}

//modulo de redes - get option
require_once get_template_directory().'/inc/modulo_informacion.php';
require_once get_template_directory().'/inc/productos.php';
require_once get_template_directory().'/inc/sedes.php';