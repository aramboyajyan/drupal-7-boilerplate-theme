<?php

/**
 * @file
 * Preprocess node function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_node(&$vars) {
  
  // Additional control over full/teaser node templates. Example usage:
  // 'node--blog-single.tpl.php'   for full node view.
  // 'node--blog-category.tpl.php' for teaser/category view.
  // 'node--blog-list.tpl.php'     for teaser/list view.
  /*
  if (isset($vars['page']) && $vars['page']) {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '_single';
  }
  elseif (arg(0) == 'taxonomy' && arg(1) == 'term' && arg(2)) {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '_category';
  }
  else {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '_list';
  }
  */

  // Hide language if it's present.
  if (isset($vars['content']['language'])) {
    $vars['content']['language']['#access'] = FALSE;
  }

  // Add special classes for view modes. This comes in handy when the site uses
  // custom display modes for example.
  $vars['classes_array'][] = 'view-mode-' . $vars['view_mode'];

  // Override submitted variable.
  /*
  $vars['submitted'] = t('Submitted by !user on !date', array(
    '!user' => $vars['name'],
    '!date' => $vars['date'],
  ));
  */

  /**
   * Per content type preprocessing.
   */
  switch ($vars['node']->type) {
    
    // Pages.
    case 'page':
      break;

  }

}
