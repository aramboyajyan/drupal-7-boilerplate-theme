<?php

/**
 * @file
 * Preprocess region function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_region(&$vars) {
  
  global $user;

  // Append custom classes.
  $vars['classes_array'][] = 'ultima';

  // Per region processing.
  switch ($vars['region']) {
    case 'content':
      break;
  }

}
