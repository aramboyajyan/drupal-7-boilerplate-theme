<?php

/**
 * @file
 * An example page with a setup basic Twitter Bootstrap layout
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
?>

<!-- #main -->
<div id="main" class="container">
  
  <!-- #header -->
  <header id="header" class="row">

    <!-- #branding -->
    <div id="branding" class="span12">

      <!-- #nav-user -->
      <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix', 'pull-right')), 'heading' => array('text' => t('Secondary menu'), 'level' => 'h2', 'class' => 'element-invisible'))); ?>
      <!-- /#nav-user -->

      <!-- #logo -->
      <a href="<?php print base_path(); ?>" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print $site_name . ' | ' . $site_slogan; ?>">
      </a>
      <!-- /#logo -->

    </div>
    <!-- /#branding -->

  </header>
  <!-- /#header -->
  
  <!-- #nav-main-wrapper -->
  <div id="nav-main-wrapper" class="row">
    <?php print theme('links__system_main_menu', array('links' => $main_menu, 'wrapper_attributes' => array('class' => 'span12'), 'attributes' => array('id' => 'nav-main', 'class' => array('links', 'inline', 'clearfix', 'navbar')), 'heading' => array('text' => t('Main menu'), 'level' => 'h2', 'class' => 'element-invisible'))); ?>
  </div>
  <!-- /#nav-main-wrapper -->

  <?php if ($page['content_above']): ?>
  <!-- #content-above -->
  <section id="content-above" class="row"><?php print render($page['content_above']); ?></section>
  <!-- /#content-above -->
  <?php endif; ?>

  <?php if ($show_breadcrumbs): ?>
  <!-- #breadcrumb -->
  <div id="breadcrumb" class="row"><div class="span12"><?php print $breadcrumb; ?></div></div>
  <!-- /#breadcrumb -->
  <?php endif; ?>

  <!-- #content-wrap -->
  <section id="content-wrap" class="row">
    
    <?php if ($page['sidebar_first']): ?>
    <!-- #left -->
    <aside id="left" class="span3"><?php print render($page['sidebar_first']) ?></aside>
    <!-- /#left -->
    <?php endif; ?>

    <!-- #content -->
    <section id="content" class="<?php print $content_class; ?>">

      <?php if ($messages): ?>
      <!-- #messages-wrap -->
      <div id="messages-wrap"><?php print $messages; ?></div>
      <!-- /#messages-wrap -->
      <?php endif; ?>

      <?php if ($tabs && $show_tabs): ?>
      <!-- #page-tabs -->
      <div id="page-tabs"><?php print render($tabs); ?></div>
      <!-- /#page-tabs -->
      <?php endif; ?>

      <?php if ($action_links && $show_action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

      <?php if ($title && $show_title): ?>
        <?php print render($title_prefix); ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php print render($title_suffix); ?>
      <?php endif; ?>

      <?php print render($page['help']); ?>
      <?php print render($page['content']); ?>

    </section>
    <!-- /#content -->
    
    <?php if ($page['sidebar_second']): ?>
    <!-- #right -->
    <aside id="right" class="span3"><?php print render($page['sidebar_second']) ?></aside>
    <!-- /#right -->
    <?php endif; ?>

  </section>
  <!-- /#content-wrap -->

  <?php if ($page['content_below']): ?>
  <!-- #content-below -->
  <section id="content-below" class="row"><?php print render($page['content_below']); ?></section>
  <!-- /#content-below -->
  <?php endif; ?>

  <hr>

  <?php if ($page['footer']): ?>
  <!-- #footer -->
  <footer id="footer" class="row"><?php print render($page['footer']) ?></footer>
  <!-- /#footer -->
  <?php endif; ?>

  <!-- #copyright -->
  <div id="copyright" class="row">
    <div class="span12">
      <p class="pull-right"><a href="#"><?php print t('Back to top'); ?></a></p>
      <p><?php print str_replace('[year]', date('Y'), theme_get_setting('ultima_copyright')); ?></p>
    </div>
  </div>
  <!-- /#copyright -->

</div>
<!-- /#main -->
