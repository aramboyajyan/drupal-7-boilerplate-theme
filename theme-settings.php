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

  // Tracking scripts for analytics. These will be inserted before the ending
  // head tag (html.tpl.php).
  $form['ultima_tracking_head'] = array(
    '#type' => 'textarea',
    '#title' => t('Head tracking scripts'),
    '#description' => t('Paste here tracking code (e.g. Google Analytics, Gauge etc.) that requires to be inserted within the head tag.'),
    '#default_value' => theme_get_setting('ultima_tracking_head'),
  );

  // Tracking scripts for analytics. These will be inserted before the ending
  // body tag (html.tpl.php).
  $form['ultima_tracking_body'] = array(
    '#type' => 'textarea',
    '#title' => t('Body tracking scripts'),
    '#description' => t('Paste here tracking code (e.g. Piwik etc.) that requires to be inserted within the body tag.'),
    '#default_value' => theme_get_setting('ultima_tracking_body'),
  );

  // Copyright line.
  $form['ultima_copyright'] = array(
    '#type' => 'textfield',
    '#title' => t('Copyright'),
    '#description' => t('Copyright text to be displayed at the bottom of the page. You can use [year] token to display current year.'),
    '#default_value' => theme_get_setting('ultima_copyright'),
  );

}
