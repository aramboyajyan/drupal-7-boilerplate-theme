<?php

/**
 * @file
 * Preprocess comment wrapper function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_comment_wrapper(&$vars) {
  
  // Separate comment templates per node content type. This will automatically
  // look for "comment--[machine-node-type].tpl.php" files.
  $vars['theme_hook_suggestions'][] = 'comment_wrapper__' . $vars['node']->type;

}
