<?php
/**
 * Plugin Name: Custom ShortCode
 * Plugin URI: http://heochaua.tk
 * Description: Custom ShortCode Require Timber and ACF Plugin
 * Version: 1.0
 * Author: HeoChauA
 * Author URI: http://heochaua.tk
 * License: GPLv2
 */

/* add_shortcode( 'custom_shortcode', 'create_custom_shortcode' );
function create_custom_shortcode($attrs) {
  extract(shortcode_atts (array(
    'per_page' => -1
  ), $attrs));

  ob_start();
    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
} */

$dir = plugin_dir_path( __FILE__ );
//require_once($dir . 'view-module/view-module.php');
require_once($dir . 'libs/calendario/calendario.php');

function app_output_buffer() {
  ob_start();
}
add_action('init', 'app_output_buffer');

function array_fill_keystest($target, $value = '') {
  if(is_array($target)) {
    foreach($target as $key => $val) {
      $filledArray[$val] = is_array($value) ? $value[$key] : $value;
    }
  }
  return $filledArray;
}

// Get block menu by menu ID
add_shortcode( 'get_menu_id', 'create_get_menu_id' );
function create_get_menu_id($attrs) {
  extract(shortcode_atts (array(
    'id' => ''
  ), $attrs));

  ob_start();
    $context = Timber::get_context();
    $context['menu'] = new TimberMenu($id);
    Timber::render('menu-id.twig', $context);

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// Ovride Counter Per Day plugin
add_shortcode( 'count_per_day', 'create_count_per_day' );
function create_count_per_day() {
  ob_start();
    $context = Timber::get_context();
    $context['total'] = do_shortcode("[CPD_READS_TOTAL]");
    $context['yesterday'] = do_shortcode("[CPD_READS_YESTERDAY]");
    $context['today'] = do_shortcode("[CPD_READS_TODAY]");
    Timber::render('counter-perday.twig', $context);
    
    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// Short code for post
add_shortcode( 'calendario', 'create_calendario' );
function create_calendario($attrs) {
  extract(shortcode_atts (array(
  ), $attrs));

  ob_start();
    $context = Timber::get_context();
    Timber::render( 'calendario.twig', $context );

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

// Short code for post
add_shortcode( 'view_posts', 'create_view_posts' );
function create_view_posts($attrs) {
  extract(shortcode_atts (array(
    'name'        => '',
    'post_type'   => '',
    'per_page'    => -1,
    'cat_id'      => '',
    'slide'       => '',
  ), $attrs));

  ob_start();
    $sticky_id = '';
    $total_id = array();

    $args = array(
      'post_type'       => $post_type,
      'posts_per_page'  => $per_page,
      'cat'             => $cat_id,
    );

    $context = Timber::get_context();
    $posts = Timber::get_posts($args);

    foreach ($posts as $value) {
      array_push($total_id, $value->id);
    }

    if($name == 'sticky-post') {
      $args_sticky = array(
        'post_type'       => $post_type,
        'posts_per_page'  => $per_page,
        'cat'             => $cat_id,
        'posts_per_page'  => 1,
        'meta_key'        => '_cmb_sticky_post',
        'meta_value'      => 'on',
        'meta_compare'    => '=',
      );

      $stickypost = Timber::get_posts($args_sticky);

      $sticky_id = $stickypost[0]->ID;
      $sticky_stt = $stickypost[0]->_cmb_sticky_post;
      if (in_array($sticky_id, $total_id)){
        $args['posts_per_page'] = $per_page + 1;
      }
      if ($sticky_stt == 'on') {
        $context['sticky_class'] = 'block-has-sticky';
      }

      $context['stickypost'] = $stickypost;
    }

    $posts = Timber::get_posts($args);
    $context['posts'] = $posts;
    $context['sticky_option'] = framework_post('sticky_post');
    $context['slide'] = $slide;

    Timber::render( array( 'view-' . $name . '.twig', 'views.twig'), $context );

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}