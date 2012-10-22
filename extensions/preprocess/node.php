<?php

/**
 * @file
 * Preprocess node function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_node(&$vars) {
  
  global $user;

  // Additional control over full/teaser node templates. Example usage:
  // 'node--blog-single.tpl.php' for full node view and
  // 'node--blog-list.tpl.php' for teaser/list view.
  if ($vars['page']) {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '_single';
  } else {
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '_list';
  }

  // Override submitted variable
  $vars['submitted'] = t('Submitted by !user on !date', array(
    '!user' => $vars['name'],
    '!date' => $vars['date'],
  ));

  /**
   * Per content type preprocessing
   */
  switch ($vars['node']->type) {
    
    // Pages
    case 'page':
      break;

  }

}
