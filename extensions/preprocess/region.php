<?php

/**
 * @file
 * Preprocess region function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_region(&$vars) {
  
  // Append custom classes.
  $vars['classes_array'][] = 'ultima';

  // Append the number of blocks that are enabled in this region. We will do
  // this by counting the elements that are in $vars['elements'] array and
  // whose names do not start with a hash.
  $block_count = 0;
  foreach ($vars['elements'] as $element_name => $element) {
    if (substr($element_name, 0, 1) != '#') {
      $block_count++;
    }
  }
  $vars['classes_array'][] = 'block-count-' . $block_count;

  // Per region processing.
  switch ($vars['region']) {
    case 'content':
      break;
  }

}
