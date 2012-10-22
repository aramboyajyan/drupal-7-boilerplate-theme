<?php

/**
 * @file
 * Form altering.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_form_alter().
 */
function ultima_form_alter(&$form, &$form_state, $form_id) {

  /**
   * General overrides
   */
  switch ($form['#id']) {
    case 'comment-form':
      // Remove the "Your name" field
      unset($form['author']['_author']);
      break;
  }

  /**
   * Specific overrides
   */
  switch ($form_id) {

    // Sample implementation for node comment form
    case 'comment_node_type_form':
      break;

    // User login form
    case 'user_login':
      // Remove default descriptions under username and password.
      unset($form['name']['#description']);
      unset($form['pass']['#description']);
      break;

    // User registration form
    case 'user_register_form':
      // Remove default descriptions under username and email.
      unset($form['account']['name']['#description']);
      unset($form['account']['mail']['#description']);
      break;
      
  }

}
