<?php

/**
 * @file
 * Preprocess comment function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_comment(&$vars) {
  
  // Add odd/even classes to comments.
  $vars['classes_array'][] = $vars['zebra'];

}
