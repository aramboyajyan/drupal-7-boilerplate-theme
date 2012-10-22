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

<!--[if lt IE 8]><div style="display: none"><![endif]-->

<?php print $page_top; ?>
<?php print $page; ?>
<?php print $page_bottom; ?>

<!--[if lt IE 8]></div><![endif]-->

<!--[if lt IE 8]>
<div class="old-browser"><?php print t('Your browser is too old. Please upgrade to a different browser or install <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">Google Chrome Frame</a> in order to use this website. It is free and secure for you.'); ?></div>
<div id="new-browsers">
  <a title="Google Chrome" href="http://www.google.com/chrome" target="_blank" id="browser-chrome">Google Chrome</a>
  <a title="Mozilla Firefox" href="http://www.firefox.com/" target="_blank" id="browser-firefox">Mozilla Firefox</a>
  <a title="Apple Safari" href="http://www.apple.com/safari/" target="_blank" id="browser-safari">Apple Safari</a>
  <a title="Opera" href="http://www.opera.com/" target="_blank" id="browser-opera">Opera</a>
  <a title="Microsoft Internet Explorer" href="http://windows.microsoft.com/ie" target="_blank" id="browser-ie">Microsoft Internet Explorer</a>
</div>
<![endif]-->

<noscript>
  <div class="old-browser"><?php print t('You need to enable JavaScript or to install a different browser in order to use this website.'); ?></div>
</noscript>

</body>
</html>
