<?php
// Creamos la función para el post type sede
function custom_post_sede() {
    // Registramos la función 'sede' según el codex de WP
    register_post_type( 'sede',
    // (http://codex.wordpress.org/Function_Reference/register_post_type)
      // Agregamos todas funciones adicionales para el post type sede
      array( 'labels' => array(
        'name' => __( 'Sedes', 'andres-dev' ), /* El título del grupo */
        'singular_name' => __( 'Sede', 'andres-dev' ), /* El título en singular */
        'all_items' => __( 'Todas los sedes', 'andres-dev' ), /* Todos los items del menú */
        'add_new' => __( 'Agregar nuevo', 'andres-dev' ), /* Agregar uno nuevo */
        'add_new_item' => __( 'Agregar nuevo sede', 'andres-dev' ), /* Agregar nuevo con título */
        'edit' => __( 'Editar', 'andres-dev' ), /* Editar */
        'edit_item' => __( 'Editar sede', 'andres-dev' ), /* Editar item */
        'new_item' => __( 'Nuevo sede', 'andres-dev' ), /* Nuevo titulo en visualización */
        'view_item' => __( 'Ver sede', 'andres-dev' ), /* Ver item */
        'search_items' => __( 'Buscar sede', 'andres-dev' ), /* Buscar item */
        'not_found' => __( 'No se encontraron resultados', 'andres-dev' ), /* Se muestra si aún no hay entradas */
        'not_found_in_trash' => __( 'No se encontró nada en la papelera', 'andres-dev' ), /* Se muestra si no hay nada en la papelera */
        ), /* end of arrays */
        'description' => __( 'Esto es un ejemplo de post type para sedes', 'andres-dev' ), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, /* Este es el orden en que aparecerán en el menu de admin */
        'menu_icon' => 'dashicons-building', /* El icono para el menu de admin */
        // Lo podemos agregar por medio de url o desde https://developer.wordpress.org/resource/dashicons
        'rewrite' => array( 'slug' => 'sede', 'with_front' => false ), /* Se especifica el slug de la url, por lo general es el mismo post type 'sede' */
        'has_archive' => 'sede', /* Puede cambiar el nombre del slug */
        'capability_type' => 'post',
        'hierarchical' => false,
        /* Habilitamos ciertos parámetros para el editor de cada sede */
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
        ) /* Fin de las opciones */
      ); /* Fin del registro post type */
}
    // Agregando la función al init de WordPress
    add_action( 'init', 'custom_post_sede');

// Creamos la taxonomía sedesgenero para sedes
add_action( 'init', 'crear_sede_taxonomy' );
function crear_sede_taxonomy() {
  register_taxonomy(
    'sedesgenero', // Nombre de la taxonomía
    'sede', // Nombre del post type que se le asignará
    array(
      'label' => __( 'Sedes Categoría' ),
      'rewrite' => array( 'slug' => 'sedesgenero' ),
      'hierarchical' => true,
    )
  );
}


// Creamos taxonomía tags para sedes
add_action( 'init', 'crear_sede_taxonomy_tags' );
function crear_sede_taxonomy_tags() {
  register_taxonomy(
    'tag_sede', // Nombre de la taxonomía
    'sede', // Nombre del post type que se le asignará
    array(
      'rewrite' => array( 'slug' => 'tag_sede' ),
      'hierarchical' => false,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}


// Ahora vamos a agregar categorías personalizadas (estas actúan como categorías)
register_taxonomy( 'sedesgenero', 
array('sede'), /* Agregue el post type al cual le asignara la taxonomía */
array('hierarchical' => true,     /* Si es true actua como categoria - si es false como etiqueta */
  'labels' => array(
    'name' => __( 'Géneros', 'andres-dev' ), /* Nombre de la taxonomía */
    'singular_name' => __( 'Género', 'andres-dev' ), /* Nombre en singular de la taxonomía */
    'search_items' =>  __( 'Buscar géneros', 'andres-dev' ), /* Título para buscar taxonomías */
    'all_items' => __( 'Todos los géneros', 'andres-dev' ), /* Listado de item de taxonomía */
    'parent_item' => __( 'Género padre', 'andres-dev' ), /* Título del padre de la taxonomía */
    'parent_item_colon' => __( 'Género padre:', 'andres-dev' ), /* Título del padre de la taxonomía */
    'edit_item' => __( 'Editar género', 'andres-dev' ), /* Editar una taxonomía */
    'update_item' => __( 'Actualizar género', 'andres-dev' ), /* Actualizar el título de una taxonomía */
    'add_new_item' => __( 'Agregar nuevo género', 'andres-dev' ), /* Agregar nueva taxonomía */
    'new_item_name' => __( 'Nuevo género', 'andres-dev' ) /* Título de la nueva taxonomia */
  ),
  'show_admin_column' => true, 
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'sedesgenero' ),
)
);



// Ahora vamos a agregar etiquetas personalizadas
register_taxonomy( 'tags_sede', 
array('sede'), /* Agregue el post type al cual le asignara la taxonomía */
array('hierarchical' => false,    /* Si es true actua como categoria - si es false como etiqueta */
  'labels' => array(
    'name' => __( 'Tags sedes', 'andres-dev' ), /* Nombre de la taxonomía */
    'singular_name' => __( 'Tag', 'andres-dev' ), /* Nombre en singular de la taxonomía */
    'search_items' =>  __( 'Buscar tags', 'andres-dev' ), /* Título para buscar taxonomías */
    'all_items' => __( 'Todos los tags', 'andres-dev' ), /* Listado de item de taxonomía */
    'parent_item' => __( 'Tag padre', 'andres-dev' ), /* Título del padre de la taxonomía */
    'parent_item_colon' => __( 'Tag padre:', 'andres-dev' ), /* Título del padre de la taxonomía */
    'edit_item' => __( 'Editar tag', 'andres-dev' ), /* Editar una taxonomía */
    'update_item' => __( 'Actualizar tag', 'andres-dev' ), /* Actualizar el título de una taxonomía */
    'add_new_item' => __( 'Agregar nuevo tag', 'andres-dev' ), /* Agregar nueva taxonomía */
    'new_item_name' => __( 'Nuevo tag', 'andres-dev' ) /* Título de la nueva taxonomia */
  ),
  'show_admin_column' => true,
  'show_ui' => true,
  'query_var' => true,
)
);

// /* Registra soporte para categorías al post type sede */
register_taxonomy_for_object_type( 'category', 'sede' );
// /* Registrar soporte para tags al post type sede */
register_taxonomy_for_object_type( 'post_tag', 'sede' );

?>