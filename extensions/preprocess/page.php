<?php

/**
 * @file
 * Preprocess page function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_page(&$vars) {
  
  global $user;

  // Custom template suggestions (append ?sample for premade page).
  if (isset($_GET['sample'])) {
    $vars['theme_hook_suggestions'][] = 'page__sample';
  }

  // Add corresponding page titles to the user pages (login, register, forgot pass).
  if (arg(0)=='user' && !$user->uid) {
    if (!arg(1) || arg(1)=='login') {
      drupal_set_title(t('Log in'));
    }
    elseif (arg(1)=='register') {
      drupal_set_title(t('Create new account'));
    }
    elseif (arg(1)=='password') {
      drupal_set_title(t('Request new password'));
    }
  }

  // Tab logic
  // Allows custom rules for showing the page tabs.
  $vars['show_tabs'] = TRUE;

  // Action links logic
  // Allows custom rules for showing the page action links.
  $vars['show_action_links'] = TRUE;

  // Page title logic
  // Allows custom rules for showing the page title.
  $vars['show_title'] = TRUE;

  // Page breadcrumbs logic
  // Allows custom rules for showing the page title.
  $vars['show_breadcrumbs'] = TRUE;

  // Per content type processing
  if (isset($vars['node'])) {
    switch ($vars['node']->type) {
      case 'page':
        break;
    }
  }

  // Sample page layout template classes processing
  // See templates/page--sample.tpl.php
  $vars['content_class'] = 'span12';
  if (!empty($vars['page']['sidebar_first']) || !empty($vars['page']['sidebar_second'])) {
    if (!empty($vars['page']['sidebar_first']) && !empty($vars['page']['sidebar_second'])) {
      $vars['content_class'] = 'span6';
    }
    else {
      $vars['content_class'] = 'span9';
    }
  }

}
