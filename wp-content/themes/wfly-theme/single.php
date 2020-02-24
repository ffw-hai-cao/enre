<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$context['thumbnail_option'] = framework_post('disable_thumbnail');
$context['sticky_option'] = framework_post('sticky_post');
$post = new TimberPost();
$context['post'] = $post;
$context["acf"] = get_field_objects($data["post"]->ID);
Timber::render( 'single.twig', $context );
