<?php

/**
 * @file
 * Main theme file.
 *
 * Use only as an entry point for other functions, files etc.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Custom functions.
 */
// 

/**
 * Theme functions.
 */
require_once dirname(__FILE__) . '/extensions/theme/breadcrumb.php';
require_once dirname(__FILE__) . '/extensions/theme/button.php';
require_once dirname(__FILE__) . '/extensions/theme/item-list.php';
require_once dirname(__FILE__) . '/extensions/theme/links.php';
require_once dirname(__FILE__) . '/extensions/theme/menu-link.php';
require_once dirname(__FILE__) . '/extensions/theme/menu-local-task.php';
require_once dirname(__FILE__) . '/extensions/theme/pager.php';
require_once dirname(__FILE__) . '/extensions/theme/status-messages.php';
require_once dirname(__FILE__) . '/extensions/theme/textarea.php';
require_once dirname(__FILE__) . '/extensions/theme/username.php';

/**
 * Preprocess functions.
 */
require_once dirname(__FILE__) . '/extensions/preprocess/block.php';
require_once dirname(__FILE__) . '/extensions/preprocess/comment-wrapper.php';
require_once dirname(__FILE__) . '/extensions/preprocess/comment.php';
require_once dirname(__FILE__) . '/extensions/preprocess/field.php';
require_once dirname(__FILE__) . '/extensions/preprocess/html.php';
require_once dirname(__FILE__) . '/extensions/preprocess/maintenance-page.php';
require_once dirname(__FILE__) . '/extensions/preprocess/node.php';
require_once dirname(__FILE__) . '/extensions/preprocess/page.php';
require_once dirname(__FILE__) . '/extensions/preprocess/preprocess.php';
require_once dirname(__FILE__) . '/extensions/preprocess/region.php';
require_once dirname(__FILE__) . '/extensions/preprocess/search-result.php';
require_once dirname(__FILE__) . '/extensions/preprocess/user-profile.php';

/**
 * Other hooks.
 */
require_once dirname(__FILE__) . '/extensions/hooks/css-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/element-info-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/entity-view-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/form-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/js-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/menu-breadcrumb-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/page-alter.php';
require_once dirname(__FILE__) . '/extensions/hooks/username-alter.php';

/**
 * Form files.
 */
//
