<?php
add_action( 'cmb2_admin_init', 'ct_sidebar_post_metaboxes' );
function ct_sidebar_post_metaboxes() {

  $prefix = '_cmb2_';

  $cmb = new_cmb2_box( array(
    'id'            => 'post_option',
    'title'         => __( 'Post Options', 'cmb2' ),
    'object_types'  => array( 'post' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true,
  ) );

  // Disable Thumbnail
  $cmb->add_field( array(
    'name'       => __( 'Disable Thumbnail', 'cmb2' ),
    'desc'       => __( 'Disable thumb on the node detail', 'cmb2' ),
    'id'         => $prefix . 'disable_thumbnail',
    'type'       => 'checkbox'
  ) );

  // Sticky post
  $cmb->add_field( array(
    'name'       => __( 'Sticky post', 'cmb2' ),
    'desc'       => __( 'Add this post it is sticky post', 'cmb2' ),
    'id'         => $prefix . 'sticky_post',
    'type'       => 'checkbox'
  ) );
}

function framework_post($name = '') {
  global $post;
  $value = get_post_meta( $post->ID, '_cmb2_' . $name, true );
  return $value;
}
