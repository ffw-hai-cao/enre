<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/template/pages/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$post_object = get_field('slideshow_home');

$context = Timber::get_context();
if( $post_object ):
  $post = $post_object;
  setup_postdata( $post ); 
  $context['object_title'] = get_the_title();
  $context['object_image'] = get_field('images');
  wp_reset_postdata();
endif;

$context['page_layout'] = framework_page('layout_page');
$post = new TimberPost();
$context['post'] = $post;

Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig'), $context );
