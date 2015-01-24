<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php print $language->language; ?>"> <!--<![endif]-->
<head>
<title><?php print $head_title ?></title>
<!------------------------------------------>
<!-- Website created by:Topsitemakers.com -->
<!-- http://www.topsitemakers.com ---------->
<!------------------------------------------>
<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Topsitemakers - http://www.topsitemakers.com/">
<meta name="designer" content="Topsitemakers - http://www.topsitemakers.com/">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print base_path() . path_to_theme(); ?>/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print base_path() . path_to_theme(); ?>/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print base_path() . path_to_theme(); ?>/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php print base_path() . path_to_theme(); ?>/images/ico/apple-touch-icon-57-precomposed.png">
<?php print $head; ?>
<?php print $styles; ?>
<?php print $scripts ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes; ?>>

  <!-- #logo -->
  <a href="<?php print base_path(); ?>" id="logo">
    <img src="<?php print $logo; ?>" alt="<?php print $site_name . ' | ' . $site_slogan; ?>">
  </a>
  <!-- /#logo -->

  <?php print $site_name; ?>
  <?php print $site_slogan; ?>
  <?php print $feed_icons; ?>

  <!-- Page title. -->
  <?php if ($title): ?>
    <?php print render($title_prefix); ?>
    <h1 class="title" id="page-title"><?php print $title; ?></h1>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php if ($messages): ?>
  <div id="messages-wrap" class="full-width-wrap"><?php print $messages; ?></div>
  <?php endif; ?>

  <?php print $help; ?>
  <?php print $content; ?>
  <p><?php print t('Click <a href="@link">here</a> to login as administrator.', array('@link' => url('user/login'))); ?></p>

  <!-- Block regions. -->
  <?php if ($sidebar_first): ?>
  <?php print $sidebar_first; ?>
  <?php endif; ?>

  <?php if ($sidebar_second): ?>
  <?php print $sidebar_second; ?>
  <?php endif; ?>

  <?php if ($content_above): ?>
  <?php print $content_above; ?>
  <?php endif; ?>

  <?php if ($content_below): ?>
  <?php print $content_below; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
  <?php print $footer; ?>
  <?php endif; ?>

  <?php print str_replace('[year]', date('Y', REQUEST_TIME), theme_get_setting('ultima_copyright')); ?>

</body>
</html>
