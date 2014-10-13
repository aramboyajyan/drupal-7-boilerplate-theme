<?php

/**
 * @file
 * Entity view override.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_entity_view_alter().
 */
function ultima_entity_view_alter($entity, $type, $view_mode, $langcode) {
  switch ($type) {
    case 'your_entity_name':
      // 
      break;
  }
}
