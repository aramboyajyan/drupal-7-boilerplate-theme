<?php

/**
 * @file
 * Alters the breadcrumb links.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_menu_breadcrumb_alter().
 */
function ultima_menu_breadcrumb_alter(&$active_trail, $item) {
  // Get necessary settings.
  $title_limit = theme_get_setting('ultima_breadcrumb_title_limit');
  $title_trail = theme_get_setting('ultima_breadcrumb_title_trail');
  // Fix each breadcrumb link separately.
  foreach ($active_trail as $key => $link) {
    if (strlen($link['title']) > $title_limit) {
      // Trim to the maximum number of characters defined at the theme
      // settings page.
      $active_trail[$key]['title'] = substr($link['title'], 0, $title_limit) . $title_trail;
      // Add the "title" attribute containing full, untrimmed title.
      $active_trail[$key]['localized_options']['attributes']['title'] = $link['title'];
    }
  }
}
