<?php

/**
 * @file
 * Preprocess HTML function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_html(&$vars) {
  
  // Add custom classes to the body element.
  $vars['classes_array'][] = 'ultima-theme';

  // Add URL parts to the body classes for semantic styling.
  // Be careful when substracting the base path; if the site is in root (/)
  // doing so we will remove all slashes in URL.
  // Also to avoid name clashes with existing URLs, replace only the first
  // occurrence of the base path.
  // The 'url-current-[path]' is added so we can distinguish between 'user'
  // and 'user/login' pages easily and without duplicating CSS.
  
  // Save some overhead.
  $request_uri = request_uri();
  $base_path   = base_path();
  // Get current URL without the base path and the query string.
  $current_url = explode('?', substr_replace($request_uri, '', stripos($request_uri, $base_path), strlen($base_path)));
  $url_parts = explode('/', $current_url[0]);
  // Add each URL argument to the list of body classes separately.
  foreach ($url_parts as $url_part) {
    $vars['classes_array'][] = 'url-segment-' . $url_part;
  }
  // Add one-by-one argument of the current URL to the body classes.
  switch (count($url_parts)) {
    case 1:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0];
      break;
    case 2:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1];
      break;
    case 3:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      break;
    case 4:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3];
      break;
    case 5:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3] . '-' . $url_parts[4];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3] . '-' . $url_parts[4];
      break;
  }

  // Include current user roles.
  foreach ($vars['user']->roles as $rid => $role) {
    $vars['classes_array'][] = 'user-role-' . str_replace(' ', '-', strtolower($role));
  }

  // Include vocabulary ID when on term pages.
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2)) && ($term = taxonomy_term_load(arg(2)))) {
    $vars['classes_array'][] = 'page-vocabulary-' . $term->vid;
  }

  // Include the list of populated regions.
  foreach ($vars['page'] as $element_id => $element) {
    // Skip 'page' attributes (all elements that begin with a hash).
    if (substr($element_id, 0, 1) != '#') {
      $vars['classes_array'][] = 'populated-region-' . $element_id;
    }
  }

  // Add special class to the body for form-only pages, such as contact, login,
  // registration, forgot password etc.
  if (
    // Sitewide contact form.
    arg(0) == 'contact' ||
    // User registration, login, forgot password.
    (arg(0) == 'user' && (in_array(arg(1), array('login', 'register', 'password')) || (user_is_anonymous() && !arg(1)))) ||
    // Ask question, non-admin users.
    (arg(0) == 'node' && arg(1) == 'add' && arg(2) == 'question' && user_is_anonymous())
  ) {
    $vars['classes_array'][] = 'form-only-page';
  }

  // Check if the website is in maintenance mode.
  if (variable_get('maintenance_mode', FALSE)) {
    $vars['classes_array'][] = 'maintenance-mode';
  }
  else {
    $vars['classes_array'][] = 'live-mode';
  }

  // Use an alternative template when "?layout=ajax" is passed through query string.
  if (isset($_GET['layout']) && $_GET['layout'] == 'ajax') {
    $vars['theme_hook_suggestions'][] = 'html__ajax';
  }

}
