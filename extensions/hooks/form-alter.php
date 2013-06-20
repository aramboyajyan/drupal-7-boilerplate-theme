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
   * General overrides.
   */
  switch ($form['#id']) {
    case 'comment-form':
      // Remove the "Your name" field.
      unset($form['author']['_author']);
      break;
  }

  /**
   * Specific overrides.
   */
  switch ($form_id) {

    // Sample implementation for node comment form.
    case 'comment_node_type_form':
      break;

    // User login form.
    case 'user_login':
      // Remove default descriptions under username and password.
      unset($form['name']['#description']);
      unset($form['pass']['#description']);
      // Hide titles and use them as placeholders.
      $form['name']['#attributes']['placeholder'] = $form['name']['#title'];
      unset($form['name']['#title']);
      $form['pass']['#attributes']['placeholder'] = $form['pass']['#title'];
      unset($form['pass']['#title']);
      // Add forgot pass link.
      $form['forgot']['#markup'] = l(t('Reset Password'), 'user/password', array('attributes' => array('class' => 'additional-link')));
      break;

    // User registration form.
    case 'user_register_form':
      // Remove default descriptions under username and email.
      unset($form['account']['name']['#description']);
      unset($form['account']['mail']['#description']);
      // Hide titles and use them as placeholders.
      $form['account']['name']['#attributes']['placeholder'] = $form['account']['name']['#title'];
      unset($form['account']['name']['#title']);
      $form['account']['mail']['#attributes']['placeholder'] = $form['account']['mail']['#title'];
      unset($form['account']['mail']['#title']);
      // Add login link.
      $form['login']['#markup'] = l(t('Login'), 'user/login', array('attributes' => array('class' => 'additional-link')));
      // Rename the submit button.
      $form['actions']['submit']['#value'] = t('Register');
      break;
      
    // User reset password form.
    case 'user_pass':
      // Hide titles and use them as placeholders.
      $form['name']['#attributes']['placeholder'] = $form['name']['#title'];
      unset($form['name']['#title']);
      // Add login link.
      $form['login']['#markup'] = l(t('Login'), 'user/login', array('attributes' => array('class' => 'additional-link')));
      // Rename the submit button.
      $form['actions']['submit']['#value'] = t('Reset');
      break;

  }

}
