<?php
/*
    Template name: search
*/

get_header();

$s = get_search_query();
$args = array(
    's' =>$s,
    'post_status' => 'publish'
);
    
?>

<?php get_search_form(); ?>

<?php get_footer(); ?>