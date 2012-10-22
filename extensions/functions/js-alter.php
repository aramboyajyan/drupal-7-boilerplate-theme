<?php

/**
 * @file
 * JS altering
 * Combine all scripts into only one file when aggregation is enabled.
 * See:
 * http://drupal.org/node/1115026
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_js_alter().
 */
function ultima_js_alter(&$js) {

  // Sort JS items, so that they appear in the correct order.
  uasort($js, 'drupal_sort_css_js');

  $weight = 0;

  foreach ($js as $name => $javascript) {
    $js[$name]['group'] = -100;
    $js[$name]['weight'] = ++$weight;
    $js[$name]['every_page'] = 1;
  }

}
