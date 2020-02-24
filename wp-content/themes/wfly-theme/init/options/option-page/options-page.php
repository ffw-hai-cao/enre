<?php
add_action( 'cmb2_admin_init', 'ct_page_option_metaboxes' );
function ct_page_option_metaboxes() {

  $prefix = '_cmb2_';

  $cmb = new_cmb2_box( array(
    'id'            => 'page_option',
    'title'         => __( 'Page Options', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true,
  ) );

  // Disable title
  $cmb->add_field( array(
    'name'             => __('Layout page option', 'cmb2'),
    'id'               => $prefix . 'layout_page',
    'type'             => 'radio',
    'options'          => array(
      'full'       => __( 'Page full layout', 'cmb' ),
      'container'  => __( 'Page container layout', 'cmb' )
    ),
    'default' => 'container'
  ) );
}

function framework_page($name = '') {
  global $post;
  $value = get_post_meta( $post->ID, '_cmb2_' . $name, true );
  return $value;
}
