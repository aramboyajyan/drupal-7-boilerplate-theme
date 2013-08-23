<?php

/**
 * @file
 * Define theme settings.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implementation of hook_FORM_ID_alter().
 */
function ultima_form_system_theme_settings_alter(&$form, $form_state) {

  /**
   * Tracking scripts.
   */
  $form['tracking'] = array(
    '#type' => 'fieldset',
    '#title' => t('Tracking Scripts'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Header scripts inserted before the ending head tag in html.tpl.php.
  $form['tracking']['ultima_tracking_head'] = array(
    '#type' => 'textarea',
    '#title' => t('Head tracking scripts'),
    '#description' => t('Paste here tracking code (e.g. Google Analytics, Gauge etc.) that requires to be inserted within the head tag.'),
    '#default_value' => theme_get_setting('ultima_tracking_head'),
  );
  // Header scripts inserted before the ending body tag in html.tpl.php.
  $form['tracking']['ultima_tracking_body'] = array(
    '#type' => 'textarea',
    '#title' => t('Body tracking scripts'),
    '#description' => t('Paste here tracking code (e.g. Piwik etc.) that requires to be inserted within the body tag.'),
    '#default_value' => theme_get_setting('ultima_tracking_body'),
  );

  /**
   * Breadcrumb settings.
   */
  $form['breadcrumb'] = array(
    '#type' => 'fieldset',
    '#title' => t('Breadcrumb Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE, 
  );
  // Breadcrumb divider text.
  $form['breadcrumb']['ultima_breadcrumb_divider'] = array(
    '#type' => 'textfield',
    '#title' => t('Divider'),
    '#description' => t('Enter the textual divider that should be inserted between the breadcrumb links.'),
    '#default_value' => theme_get_setting('ultima_breadcrumb_divider'),
  );
  // Page title maximum length in breadcrumbs.
  $form['breadcrumb']['ultima_breadcrumb_title_limit'] = array(
    '#type' => 'textfield',
    '#title' => t('Title limit'),
    '#description' => t('Enter the number of characters that should be displayed in breadcrumb page title.'),
    '#default_value' => theme_get_setting('ultima_breadcrumb_title_limit'),
  );

  // Copyright line.
  $form['ultima_copyright'] = array(
    '#type' => 'textfield',
    '#title' => t('Copyright'),
    '#description' => t('Copyright text to be displayed at the bottom of the page. You can use [year] token to display current year.'),
    '#default_value' => theme_get_setting('ultima_copyright'),
  );

}
