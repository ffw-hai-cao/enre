<?php
// Short code for post
add_shortcode( 'view_posts', 'create_view_posts' );
function create_view_posts($attrs) {
  extract(shortcode_atts (array(
    'post_type' => '',
    'per_page' => -1,
    'cat_id' => '',
    'show_fields' => '',
  ), $attrs));

  ob_start();
    $name_field = explode(", ",$show_fields);
    $val_field = explode(", ",$show_fields);
    $fields = array_fill_keystest($val_field, $name_field);
    $showfields = array();

    $args = array(
      'post_type'       => $post_type,
      'posts_per_page'  => $per_page,
      'cat'             => $cat_id,
    );

    $context = Timber::get_context();
    $posts = Timber::get_posts($args);

    echo '<div class="cf_view">';
    foreach ($posts as $post) {
      //print_r($post);
      //$show = array();
      echo '<div class="cf_view-item">';
      foreach ($fields as $field) {
        $field_tag = explode(" ",$field);
        $tag_before = $field_tag[1];
        $tag_after = $field_tag[2];
        $tag_content = $field_tag[0];
        $val = $post->$tag_content;
        //echo $field.'<br>';
        if(!empty($val) && !is_array($val)) {
          //$show[$tag_content] = $tag_before . $val . $tag_after;
          //array_push($showfields, $tag_before . $val . $tag_after);
          echo $tag_before . $val . $tag_after;
            echo '<br>';
        }
        $acf_fields = get_field($tag_content, $post->ID);
        if($acf_fields && is_array($acf_fields)){
          //print_r($acf_fields);
          foreach ($acf_fields as $acf_field) {
            //echo '<img src="'.$acf_field['url'].'"/>';
            /*if ($acf_field['type'] == 'image') {
              echo '<img src="'.$acf_field['url'].'"/>';
            }*/
            print_r($acf_field);
            echo '<br>';
          }
        } else {
          echo '<img src="' . $acf_fields['url'] . '" />';
            echo '<br>';
        }
        
        /*if(is_array($val)){
          print_r($acf_field);
        }*/
      }

      $images = get_field('images', $post->ID);
      //print_r($images);
      //array_push($showfields, $show);
      echo '</div>';
    }
    echo '</div>';
    
    $context['fields'] = $show;
    $context['posts'] = $showfields;
    Timber::render('view-posts.twig', $context);

    $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}
?>