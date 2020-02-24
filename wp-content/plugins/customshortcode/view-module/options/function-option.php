<?php
function cf_view_posttype() {
  $postTypes = get_post_types();
  $checklist = array();

  foreach ($postTypes as $postType) {
    $postName = get_post_type_object($postType)->label;
    $postslug = get_post_type_object($postType)->name;
    $checklist[$postslug] = $postName;
  }

  unset($checklist['nav_menu_item'], $checklist['attachment'], $checklist['revision'], $checklist['acf-field-group'], $checklist['acf-field'], $checklist['cfviews']);

  return $checklist;
}

function cf_post_taxonomy() {
  $cat = array('cat_upfile');

  return $cat;
}
?>