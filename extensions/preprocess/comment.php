<?php

/**
 * @file
 * Preprocess comment function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_comment(&$vars) {
  
  // Add odd/even classes to comments.
  $vars['classes_array'][] = $vars['zebra'];

  // Separate comment templates per node content type. This will automatically
  // look for "comment--[machine-node-type].tpl.php" files.
  $vars['theme_hook_suggestions'][] = 'comment__' . $vars['node']->type;

  // Override the default "permalink" and change the href so it does not open
  // the separate "/comment/[cid]" page.
  $vars['permalink'] = l('Permalink' . $vars['comment']->cid, 'node/' . $vars['node']->nid, array('fragment' => 'comment-' . $vars['comment']->cid));

}
