<?php

/**
 * @file
 * Theme button function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_button().
 */
function ultima_button(&$vars) {
  $element = $vars['element'];
  $element['#attributes']['type'] = 'submit';
  element_set_attributes($element, array('id', 'name', 'value'));

  $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }

  // If this is a delete button, add an extra class.
  if ($element['#value'] == t('Delete') || $element['#id'] == 'edit-delete') {
    $element['#attributes']['class'][] = 'form-button-delete';
    // If you are using Bootstrap styles:
    // $element['#attributes']['class'][] = 'btn-danger';
  }

  return '<input' . drupal_attributes($element['#attributes']) . ' />';
}
