<?php

/**
 * @file
 * CSS altering.
 * 
 * Combine all stylesheets into only one file when aggregation is enabled.
 * See:
 * http://drupal.org/node/1115026
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_css_alter().
 */
function ultima_css_alter(&$css) {

  // Sort CSS items, so that they appear in the correct order.
  // This is taken from drupal_get_css().
  uasort($css, 'drupal_sort_css_js');

  // The Print style sheets.
  $print = array();

  // Add some weight to the new $css array so every element keeps its position.
  $weight = 0;

  foreach ($css as $name => $style) {

    // Leave untouched the conditional stylesheets; put all the rest inside a
    // 0 group.
    if ($css[$name]['browsers']['!IE']) {
      $css[$name]['group'] = 0;
      $css[$name]['weight'] = ++$weight;
      $css[$name]['every_page'] = TRUE;
    }

    // Move all the print style sheets to a new array.
    if ($css[$name]['media'] == 'print') {
      // Remove and add to a new array.
      $print[$name] = $css[$name];
      unset($css[$name]);
    }

  }
  
  // Merge the regular array and the print array.
  $css = array_merge($css, $print);

}
