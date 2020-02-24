<?php
require_once dirname( __FILE__ ) . '/options/options.php';

add_action('admin_enqueue_scripts', 'cf_views_scripts');
function cf_views_scripts() {
  wp_register_script('cf_script', plugin_dir_url( __FILE__ ) . 'js/script.js', array('jquery')); // Custom scripts
  wp_enqueue_script('cf_script'); // Enqueue it!

  //wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

/* Add custom post type */
function cf_create_post_types() {
  register_post_type( 'cfviews',
    array(
      'labels' => array(
        'name' => __( 'CF Views' ),
        'singular_name' => __( 'CF Views' )
      ),
      'supports' => array(
        'title',
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'cf_create_post_types' );
?>