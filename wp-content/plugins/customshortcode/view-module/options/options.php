<?php
require_once  dirname( __FILE__ ) . '/function-option.php';

if ( file_exists(  dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
  require_once  dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists(  dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
  require_once  dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {
  $cf_view = 'cf_view_';

  /**
   * Initiate the metabox
   */
  $cf_view_setting = new_cmb2_box( array(
    'id'            => 'cf_view_setting',
    'title'         => __( 'View Setting', 'cmb2' ),
    'object_types'  => array( 'cfviews', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true,
  ) );

  // Regular text field
  $cf_view_setting->add_field( array(
    'name'        => 'Select Post Type',
    'desc'        => '',
    'id'          => $cf_view . 'post_type',
    'row_classes' => $cf_view . 'post_type',
    'type'        => 'multicheck',
    'options'     => cf_view_posttype(),
  ));

  $cf_view_setting->add_field( array(
    'name'        => 'Test Taxonomy Multicheck',
    'desc'        => 'Description Goes Here',
    'id'          => $cf_view . 'post_taxonomy',
    'row_classes' => $cf_view . 'post_taxonomy',
    'taxonomy'    => cf_post_taxonomy(), //Enter Taxonomy Slug
    'type'        => 'taxonomy_multicheck',
    'text'        => array(
      'no_terms_text' => 'Sorry, no terms could be found.'
    ),
  ));

}
?>