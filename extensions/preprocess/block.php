<?php

/**
 * @file
 * Preprocess block function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_block(&$vars) {
  
  // Add class names that match region name.
  $vars['classes_array'][] = 'block-region-' . $vars['elements']['#block']->region;

}
