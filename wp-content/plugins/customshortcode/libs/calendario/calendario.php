<?php
add_action('wp_enqueue_scripts', 'cld_plugin_styles');
function cld_plugin_styles() {
  wp_register_style('calendar', plugin_dir_url( __FILE__ ) .'css/calendar.css', array(), 'all');
  wp_enqueue_style('calendar');

  wp_register_style('cldcustom', plugin_dir_url( __FILE__ ) .'css/cldcustom.css', array(), 'all');
  wp_enqueue_style('cldcustom');
}

add_action('wp_enqueue_scripts', 'cld_plugin_scripts');
function cld_plugin_scripts() {
  wp_register_script('modernizr', plugin_dir_url( __FILE__ ) . 'js/modernizr.custom.js', array('jquery'));
  wp_enqueue_script('modernizr');

  wp_register_script('calendario', plugin_dir_url( __FILE__ ) . 'js/jquery.calendario.js', array('jquery'));
  wp_enqueue_script('calendario');

  wp_register_script('datacalendario', plugin_dir_url( __FILE__ ) . 'js/data.js', array('jquery'));
  wp_enqueue_script('datacalendario');

  wp_register_script('cldscript', plugin_dir_url( __FILE__ ) . 'js/script.js', array('jquery'));
  wp_enqueue_script('cldscript');
}
?>