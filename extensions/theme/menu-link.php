<?php

/**
 * @file
 * Change menu links.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_menu_link().
 */
function ultima_theme_menu_link($vars) {
  $element = $vars['element'];
  $sub_menu = '';

  // Add menu IDs to all list items. This is not added automatically for
  // system-generated menu blocks.
  $element['#attributes']['class'][] = 'menu-' . $element['#original_link']['mlid'];

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
