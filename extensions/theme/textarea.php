<?php

/**
 * @file
 * Theme textareas displayed through Ultima.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_textarea().
 */
function ultima_textarea($element) {
  // Uncomment the following line to disable Drupal's grippie (resizable widget)
  // on all textareas.
  // $element['element']['#resizable'] = FALSE;

  return theme_textarea($element);
}
