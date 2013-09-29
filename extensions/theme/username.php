<?php

/**
 * @file
 * Theme username function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_username().
 */
function ultima_username(&$vars) {
  if (isset($vars['link_path'])) {
    // We have a link path, so we should generate a link using l().
    // Additional classes may be added as array elements like
    // $vars['link_options']['attributes']['class'][] = 'myclass';
    $output = l($vars['name'] . $vars['extra'], $vars['link_path'], $vars['link_options']);
  }
  else {
    // Modules may have added important attributes so they must be included in
    // the output. Additional classes may be added as array elements like
    // $vars['attributes_array']['class'][] = 'myclass';
    $output = '<span' . drupal_attributes($vars['attributes_array']) . '>' . $vars['name'] . $vars['extra'] . '</span>';
  }
  
  return $output;
}
