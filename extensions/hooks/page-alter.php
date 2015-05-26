<?php

/**
 * @file
 * Alter the page output.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_page_alter().
 */
function ultima_page_alter(&$page) {
  // Add sample output to the end of the page.
  $page['page_bottom']['ultima'] = array(
    '#type' => 'markup',
    '#markup' => '<!-- This content will be added to the end of the page. Generated from Ultima theme. -->',
  );
}
