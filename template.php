<?php

/**
 * @file
 * Main theme file
 * Use only as an entry point for other functions, files etc.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Flush theme cache when using "?flush=1" in the URL.
 * Uncomment only during development.
 */
/*
if (isset($_GET['flush'])) {
  drupal_flush_all_caches();
}
*/

/**
 * Functions
 */
require_once dirname(__FILE__) . '/extensions/functions/css-alter.php';
require_once dirname(__FILE__) . '/extensions/functions/form-alter.php';
require_once dirname(__FILE__) . '/extensions/functions/js-alter.php';

/**
 * Theme functions
 */
require_once dirname(__FILE__) . '/extensions/theme/breadcrumb.php';
require_once dirname(__FILE__) . '/extensions/theme/button.php';
require_once dirname(__FILE__) . '/extensions/theme/item-list.php';
require_once dirname(__FILE__) . '/extensions/theme/links.php';
require_once dirname(__FILE__) . '/extensions/theme/menu-local-task.php';
require_once dirname(__FILE__) . '/extensions/theme/pager.php';
require_once dirname(__FILE__) . '/extensions/theme/status-messages.php';
require_once dirname(__FILE__) . '/extensions/theme/username.php';

/**
 * Preprocess functions
 */
require_once dirname(__FILE__) . '/extensions/preprocess/block.php';
require_once dirname(__FILE__) . '/extensions/preprocess/comment-wrapper.php';
require_once dirname(__FILE__) . '/extensions/preprocess/comment.php';
require_once dirname(__FILE__) . '/extensions/preprocess/html.php';
require_once dirname(__FILE__) . '/extensions/preprocess/maintenance-page.php';
require_once dirname(__FILE__) . '/extensions/preprocess/node.php';
require_once dirname(__FILE__) . '/extensions/preprocess/page.php';
require_once dirname(__FILE__) . '/extensions/preprocess/preprocess.php';
require_once dirname(__FILE__) . '/extensions/preprocess/search-result.php';

/**
 * Form files
 */
//
