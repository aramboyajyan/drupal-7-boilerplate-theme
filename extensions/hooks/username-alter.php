<?php

/**
 * @file
 * Alter the page output.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements hook_username_alter().
 */
function ultima_username_alter(&$name, $account) {
  // You can fetch custom fields from here, or perform any additional checks.
  // Just override the $name variable. Example:
  //
  //    $name = t('@username (@uid)', array('@username' => $account->name, '@uid' => $account->uid));
}
