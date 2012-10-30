<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
?><!DOCTYPE html>
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
