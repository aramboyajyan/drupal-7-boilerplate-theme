<?php

/**
 * @file
 * Theme breadcrumb function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_breadcrumb().
 */
function ultima_breadcrumb(&$vars) {

  // Commonly used things.
  global $user;
  $divider_text = theme_get_setting('ultima_breadcrumb_divider');
  $divider = '<span class="divider">' . $divider_text . '</span>';
  // If we are on node page, get the node.
  if (arg(0) == 'node' && arg(1) && !arg(2)) {
    $node = node_load(arg(1));
  }
  // Same for single term pages.
  elseif (arg(0) == 'taxonomy' && arg(1) == 'term' && arg(2)) {
    $term = taxonomy_term_load(arg(2));
  }
  
  $breadcrumb = $vars['breadcrumb'];

  if (!empty($breadcrumb)) {

    // Used for dynamically including the current page title.
    $include_title = TRUE;

    $title = '';
    if ($include_title) {
      // Include current page's title. Trim down the length to specific number
      // of characters so long page titles don't break the layout.
      $title  = $divider . '</li>';
      $raw_title = drupal_get_title();
      $title_limit = theme_get_setting('ultima_breadcrumb_title_limit');
      if (strlen($raw_title) > $title_limit) {
        $trimmed_title = substr(drupal_get_title(), 0, $title_limit) . '...';
      }
      else {
        $trimmed_title = $raw_title;
      }
      $title .= '<li class="active">' . $trimmed_title . '</li>';
    }

    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output  = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    
    // Implode the breadcrumbs.
    $output .= '<ul class="breadcrumb"><li>' . implode($divider . '</li><li>', $breadcrumb) . $title . '</ul>';

    return $output;
  }

}
