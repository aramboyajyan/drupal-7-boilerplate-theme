<?php

/**
 * @file
 * Plugin definition for custom Panel.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
$plugin = array(
  'title' => t('Ultima 3 column 25/50/25 stacked'),
  'category' => t('Columns: 3'),
  'icon' => 'ultima_25_50_25_stacked.png',
  'theme' => 'ultima_threecol_25_50_25_stacked',
  'css' => 'threecol_25_50_25_stacked.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left side'),
    'middle' => t('Middle column'),
    'right' => t('Right side'),
    'bottom' => t('Bottom'),
  ),
);
