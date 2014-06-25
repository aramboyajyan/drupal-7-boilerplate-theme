<?php

/**
 * @file
 * Hook element info alter implementations.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_element_info_alter().
 */
function ultima_element_info_alter(&$type) {
  // Remove password strength meter.
  if (isset($type['password_confirm']['#process']) && (($position = array_search('user_form_process_password_confirm', $type['password_confirm']['#process'])) !== FALSE)) {
    unset($type['password_confirm']['#process'][$position]);
  }
  // Set custom processing function for password confirmation element.
  if (isset($type['password_confirm'])) {
    $type['password_confirm']['#process'][] = 'ultima_password_confirm';
  }
}

/**
 * Edit the change password label.
 */
function ultima_password_confirm($element) {
  if ($element['#array_parents'][0] == 'account') {
    $element['pass1']['#title'] = t('New password');
    $element['pass2']['#title'] = t('Confirm new password');
  }

  return $element;
}
