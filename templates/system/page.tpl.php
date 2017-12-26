<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
?>

<!-- #logo -->
<a href="<?php print url('<front>'); ?>" id="logo">
  <img src="<?php print $logo; ?>" alt="<?php print $site_name . ' | ' . $site_slogan; ?>">
</a>
<!-- /#logo -->

<?php print $site_name; ?>
<?php print $site_slogan; ?>
<?php print $feed_icons; ?>

<!-- Primary and secondary links. -->
<?php if ($page['main_menu']): ?>
  <?php print render($page['main_menu']); ?>
<?php else: ?>
  <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'nav-main', 'class' => array('links', 'inline', 'clearfix', 'span12')), 'heading' => array('text' => t('Main menu'), 'level' => 'h2', 'class' => 'element-invisible'))); ?>
<?php endif; ?>

<?php if ($page['secondary_menu']): ?>
  <?php print render($page['secondary_menu']); ?>
<?php else: ?>
  <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'nav-user', 'class' => array('links', 'inline', 'clearfix')), 'heading' => array('text' => t('Secondary menu'), 'level' => 'h2', 'class' => 'element-invisible'))); ?>
<?php endif; ?>

<?php if ($page['mobile_menu']): ?>
  <?php print render($page['mobile_menu']); ?>
<?php endif; ?>

<!-- Page title. -->
<?php if ($title && isset($show_title) && $show_title): ?>
  <?php print render($title_prefix); ?>
  <h1 class="title" id="page-title"><?php print $title; ?></h1>
  <?php print render($title_suffix); ?>
<?php endif; ?>

<?php if ($tabs && isset($show_tabs) && $show_tabs): ?>
<div id="page-tabs"><?php print render($tabs); ?></div>
<?php endif; ?>

<?php if ($action_links && isset($show_action_links) && $show_action_links): ?>
  <ul class="action-links"><?php print render($action_links); ?></ul>
<?php endif; ?>

<?php if (isset($show_breadcrumbs) && $show_breadcrumbs): ?>
<div id="breadcrumb" class="full-width-wrap"><?php print $breadcrumb; ?></div>
<?php endif; ?>

<?php if ($messages): ?>
<div id="messages-wrap" class="full-width-wrap"><?php print $messages; ?></div>
<?php endif; ?>

<?php print render($page['help']); ?>
<?php print render($page['content']); ?>

<!-- Block regions. -->
<?php if ($page['sidebar_first']): ?>
<?php print render($page['sidebar_first']) ?>
<?php endif; ?>

<?php if ($page['sidebar_second']): ?>
<?php print render($page['sidebar_second']) ?>
<?php endif; ?>

<?php if ($page['content_above']): ?>
<?php print render($page['content_above']); ?>
<?php endif; ?>

<?php if ($page['content_below']): ?>
<?php print render($page['content_below']); ?>
<?php endif; ?>

<?php if ($page['footer']): ?>
<?php print render($page['footer']) ?>
<?php endif; ?>

<?php print str_replace('[year]', date('Y', REQUEST_TIME), theme_get_setting('ultima_copyright')); ?>
