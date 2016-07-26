<?php

/**
 * @file
 * Preprocess page function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_page(&$vars) {

  // Custom template suggestions (append ?sample for premade page).
  // if (isset($_GET['sample'])) {
  //   $vars['theme_hook_suggestions'][] = 'page__sample';
  // }

  // Add corresponding page titles to the user pages (login, register, forgot
  // pass).
  if (arg(0) == 'user' && user_is_anonymous()) {
    if (!arg(1) || arg(1) == 'login') {
      drupal_set_title(t('Log in'));
    }
    elseif (arg(1) == 'register') {
      drupal_set_title(t('Create new account'));
    }
    elseif (arg(1) == 'password') {
      drupal_set_title(t('Request new password'));
    }
  }

  // Tab logic.
  // Allows custom rules for showing the page tabs.
  $vars['show_tabs'] = TRUE;
  if (isset($vars['node'])) {
    if (
      // Support for CCK fields which will allow toggling from node add/edit
      // page. The field should be a boolean.
      isset($vars['node']->field_show_tabs[LANGUAGE_NONE][0]['value']) &&
      $vars['node']->field_show_tabs[LANGUAGE_NONE][0]['value'] == 0
    ) {
      $vars['show_tabs'] = FALSE;
    }
    else {
      // Either the field does not exist or it is set to "Show".
    }
  }

  // Action links logic.
  // Allows custom rules for showing the page action links.
  $vars['show_action_links'] = TRUE;
  // Support for CCK fields which will allow toggling from node add/edit page.
  if (isset($vars['node'])) {
    if (
      // Support for CCK fields which will allow toggling from node add/edit
      // page. The field should be a boolean.
      isset($vars['node']->field_show_action_links[LANGUAGE_NONE][0]['value']) &&
      $vars['node']->field_show_action_links[LANGUAGE_NONE][0]['value'] == 0
    ) {
      $vars['show_action_links'] = FALSE;
    }
    else {
      // Either the field does not exist or it is set to "Show".
    }
  }

  // Page title logic.
  // Allows custom rules for showing the page title.
  $vars['show_title'] = TRUE;
  // Support for CCK fields which will allow toggling from node add/edit page.
  if (isset($vars['node'])) {
    if (
      // Support for CCK fields which will allow toggling from node add/edit
      // page. The field should be a boolean.
      isset($vars['node']->field_show_title[LANGUAGE_NONE][0]['value']) &&
      $vars['node']->field_show_title[LANGUAGE_NONE][0]['value'] == 0
    ) {
      $vars['show_title'] = FALSE;
    }
    else {
      // Either the field does not exist or it is set to "Show".
      if (drupal_is_front_page()) {
        $vars['show_title'] = FALSE;
      }
    }
  }

  // Page breadcrumb logic.
  // Allows custom rules for showing the breadcrumb.
  $vars['show_breadcrumbs'] = TRUE;
  // Support for CCK fields which will allow toggling from node add/edit page.
  if (isset($vars['node'])) {
    if (
      // Support for CCK fields which will allow toggling from node add/edit
      // page. The field should be a boolean.
      isset($vars['node']->field_show_breadcrumbs[LANGUAGE_NONE][0]['value']) &&
      $vars['node']->field_show_breadcrumbs[LANGUAGE_NONE][0]['value'] == 0
    ) {
      $vars['show_breadcrumbs'] = FALSE;
    }
    else {
      // Either the field does not exist or it is set to "Show".
    }
  }

  // Hide tabs and page title on user registration, login and forgot
  // password pages.
  if (arg(0) == 'user' && (in_array(arg(1), array('login', 'register', 'password')) || (user_is_anonymous() && !arg(1)))) {
    $vars['show_tabs'] = FALSE;
  }

  // Per content type processing.
  if (isset($vars['node'])) {
    switch ($vars['node']->type) {
      case 'page':
        //
        break;
    }
  }

}
