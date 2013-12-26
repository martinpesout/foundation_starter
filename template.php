<?php

function foundation_starter_preprocess_html(&$vars) {

  global $language;

  // HTML Attributes
  // Use a proper attributes array for the html attributes.
  $vars['html_attributes'] = array();
  $vars['html_attributes']['lang'][] = $language->language;
  $vars['html_attributes']['dir'][] = $language->dir;

  // Convert RDF Namespaces into structured data using drupal_attributes.
  $vars['rdf_namespaces'] = array();
  if (function_exists('rdf_get_namespaces')) {
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $prefixes[] = $prefix . ': ' . $uri;
    }
    $vars['rdf_namespaces']['prefix'] = implode(' ', $prefixes);
  }

  // Flatten the HTML attributes and RDF namespaces arrays.
  $vars['html_attributes'] = drupal_attributes($vars['html_attributes']);
  $vars['rdf_namespaces'] = drupal_attributes($vars['rdf_namespaces']);

}

function foundation_starter_js_alter(&$javascript) {
    global $base_url;
    $jQuery_version = '1.10.2';
    //$jQuery_local = $base_url.'/'.drupal_get_path('module', 'my_module').'/jquery-1.10.2.min.js';
    $jQuery_local = $base_url.'/'.drupal_get_path('module', 'my_module').'/jquery-1.10.2.min.js?v='.$jQuery_version;
    $jQuery_cdn = 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
    $javascript['misc/jquery.js']['data']    = $jQuery_cdn;
    $javascript['misc/jquery.js']['version'] = $jQuery_version;


    $group  = $javascript['misc/jquery.js']['group']  = JS_LIBRARY;
    $weight = $javascript['misc/jquery.js']['weight'] = -20; 
}

function foundation_starter_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $crumbs = '';
  if (!empty($breadcrumb)) {
    $crumbs = '<ul class="breadcrumbs">';
    foreach($breadcrumb as $value) {
      $crumbs .= '<li>' . $value . '</li>';
    }
    $crumbs .= '<li class="current">' . drupal_get_title() . '</li></ul>';
  }
  return $crumbs;
}

/**
 * Implements hook__preprocess_block().
 */
function foundation_starter_preprocess_block(&$variables, $hook) {
  // allow to use block templates depend on delta
  // example: delta = navigation ; template file: block--navigation.tpl.php
 if (in_array($variables['block']->delta, array('navigation', 'management'))) {
    $variables['theme_hook_suggestions'][] = 'block__' . str_replace('-', '_', $variables['block']->delta);
 } 
}

/**
 * Navigation menu
 * Implements theme__menu_tree().
 */
function foundation_starter_menu_tree__navigation($variables) {
    $ul = '<dl class="sub-nav"><dt>' . t('Management') . ':</dt>' . $variables['tree'] . '</dl>';
    return $ul;
}

/**
 * Management menu
 * Implements theme__menu_tree().
 */
function foundation_starter_menu_tree__management($variables) {
    $ul = '<dl class="sub-nav"><dt>' . t('Management') . ':</dt>' . $variables['tree'] . '</dl>';
    return $ul;
}

/**
 * Navigation menu
 * Implements theme__menu_link().
 */
function foundation_starter_menu_link__navigation($variables) {

  return render_definition_list_links($variables);

}

/**
 * Management menu
 * Implements theme__menu_link().
 */
function foundation_starter_menu_link__management($variables) {

  return render_definition_list_links($variables);

}

function render_definition_list_links($variables) {
  $element = $variables['element'];
  $title = $element['#title'];
  $sub_menu = '';

  // global menu level variable. 
  // within theme_menu_tree() at first level has always value = 1
  // but not here, that's why $depth will have to be defined separately
  global $level;
  $level = $element['#original_link']['depth'];

  // if you will need $depth, it must be defined separately
  // $depth = $element['#original_link']['depth']; 

  // submenu
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  // link output
  $output = l($title, $element['#href'], $element['#localized_options']);

  // if link class is active, make li class as active too
  if(strpos($output,"active")>0){
    $element['#attributes']['class'][] = "active";
  }

  $attr = drupal_attributes($element['#attributes']);
  return  '<dd' . $attr . '>' . $output .$sub_menu . "</dd>\n";
}

?>