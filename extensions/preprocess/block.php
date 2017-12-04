<?php

/**
 * @file
 * Preprocess block function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_block(&$vars) {
  $vars['classes_array'][] = 'clearfix';
  
  // Add class names that match region name.
  $vars['classes_array'][] = 'block-region-' . $vars['elements']['#block']->region;
}
