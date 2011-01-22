<?php

/* @todo Adjust the classes on the menu blocks, rather than printing them in the code */
/* @todo use theme_process() to prepare HTML for output the templates */

function five_preprocess_html(&$vars) {
  // Apply the outline class to view the page in an indented document outline
  // array_push($vars['classes_array'], 'wireframe');
  // Apply the typology for a colored, bas-relief view of the page structure
  // array_push($vars['classes_array'], 'typology');
  // Add CSS
  // Give IE6 and below a basic typography stylesheet. No need to worry about this browser any further
  drupal_add_css('http://universal-ie6-css.googlecode.com/files/ie6.0.3.css', array('type' => 'external', 'group' => CSS_THEME, 'media' => 'all', 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE),));
  // Screen and print
  $theme_path = path_to_theme();
  drupal_add_css($theme_path . '/css/screen.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  drupal_add_css($theme_path . '/css/print.css', array('group' => CSS_THEME, 'media' => 'print', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  // Aural and tactile
  drupal_add_css($theme_path . '/css/aural.css', array('group' => CSS_THEME, 'media' => 'aural, speech, tty',));
  drupal_add_css($theme_path . '/css/tactile.css', array('group' => CSS_THEME, 'media' => 'braille, embossed',));
  // Drupal core replacement stylesheets
  drupal_add_css($theme_path . '/css/drupal/system.menus.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  //drupal_add_css($theme_path . '/css/drupal/system.theme.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  // Typography
  drupal_add_css($theme_path . '/css/typography.css', array('group' => CSS_THEME, 'media' => 'all', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  // Grid Fixed 960
  // drupal_add_css($theme_path . '/plugins/960grid/code/css/960_24_col.css', array('group' => CSS_THEME, 'media' => 'screen and (min-width : 960px), handheld and (min-width : 960px), projection and (min-width : 960px), tv and (min-width : 960px)', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  // Grid Fluid
  drupal_add_css($theme_path . '/plugins/fluid960grid/css/grid.css', array('group' => CSS_THEME, 'media' => 'screen and (min-width : 960px), handheld and (min-width : 960px), projection and (min-width : 960px), tv and (min-width : 960px)', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  // Plugin stylesheets
  drupal_add_css($theme_path . '/plugins/dev/wireframe.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  drupal_add_css($theme_path . '/plugins/dev/typology.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  drupal_add_css($theme_path . '/plugins/semanticOutliner/outliner.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'gte IE 7', '!IE' => true),));
  // Theme style (colors, padding, font, etc)
  drupal_add_css($theme_path . '/css/five.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => true, '!IE' => true),));
  // IE7+
  drupal_add_css($theme_path . '/css/ie/ie-7.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE),));
  drupal_add_css($theme_path . '/css/ie/ie-8.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE),));
  drupal_add_css($theme_path . '/css/ie/ie-lte-8.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'IE lte 8', '!IE' => FALSE),));
  drupal_add_css($theme_path . '/css/ie/ie-9.css', array('group' => CSS_THEME, 'media' => 'screen, handheld, projection, tv', 'browsers' => array('IE' => 'IE 9', '!IE' => FALSE),));
  // Add JavaScript
  // html5.js is required for IE to understand the new elements like article
  // @see http://remysharp.com/2009/01/07/html5-enabling-script/
  drupal_add_js($theme_path . '/js/html5.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
  drupal_add_js($theme_path . '/js/basic.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
  // jQuery
  drupal_add_library('system','ui.dialog');
  // Other plugins
  drupal_add_js($theme_path . '/plugins/mediaqueries/jquery.mediaqueries.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
  drupal_add_js($theme_path . '/plugins/semanticOutliner/jquery.semanticOutliner.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
  drupal_add_js($theme_path . '/plugins/selectivizr/selectivizr.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
  // Modernizr tests an agent's capabilites and adds classes to the html tag representing them
  drupal_add_js($theme_path . '/plugins/Modernizr/modernizr.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
}

function five_preprocess_page(&$vars) {
  $vars['primary_links'] = theme(
    'links__system_main_menu',
    array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array(
          'horizontal',
          'clearfix')
        ),
      'heading' => t('Main menu')
    )
  );
  $vars['secondary_links'] = theme(
    'links__system_secondary_menu',
    array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'id' => 'secondary-menu',
        'class' => array(
          'horizontal',
          'clearfix')
        ),
      'heading' => t('Secondary menu')
    )
  );
}

function five_preprocess_block(&$block) {
  $is_system_main = ($block['block_html_id'] === 'block-system-main') ? TRUE : FALSE;
  $block['block_wrapper_prefix'] = $block['block_wrapper_suffix'] = '';
  if (!$is_system_main) {
    $block['block_wrapper_prefix'] = '<div';
    $block['block_wrapper_prefix'] .= ' id="'.$block['block_html_id'].'"';
    $block['block_wrapper_prefix'] .= ' class="'.implode(' ', $block['classes_array']).'"';
    $block['block_wrapper_prefix'] .= implode(' ', $block['attributes_array']).'>';
    $block['block_wrapper_suffix'] .= '</div>';
    $block['title_element_open'] = '<h2 ';
    $block['title_element_open'] .= implode(' ', $block['title_attributes_array']).'>';
    $block['title_element_close'] = '</h2>';
  }
  // kpr($block);
}

function five_preprocess_node(&$node) {

  // Add the ID to the existing attributes array which prints in $attributes.
  $node['attributes_array']['id'] = 'node-' . $node['nid'];

  // Classes added to this array will print in $classes.
  $node['classes_array'][] = 'hentry';
  $node['classes_array'][] = 'clearfix';

  // remove the inline class on the links
  $link_classes = $node['elements']['links']['#attributes']['class'];
  foreach($link_classes as $key => $value) {
    if ($value === 'inline') {
      unset($link_classes[$key]);
    }
  }
  $node['elements']['links']['#attributes']['class'] = $link_classes;
  // remove the inline class on the links
  $link_classes = $node['content']['links']['#attributes']['class'];
  foreach($link_classes as $key => $value) {
    if ($value === 'inline') {
      unset($link_classes[$key]);
    }
  }
  $node['content']['links']['#attributes']['class'] = $link_classes;
  //kpr($node);
}

/**
 * Implements hook_process_node().
 */
function five_process_node(&$vars) {
  // Jacine suggested moving this to node.tpl.php, but I would like to leave it here so that
  // the element can be altered for different views, like teaser and sticky. A teaser might
  // not be an article, but a div.  Needs research.
  $vars['node_wrapper_prefix'] = '<article class="' . $vars['classes'] . '"' . $vars['attributes']. '>';
  $vars['node_wrapper_suffix'] = '</article>';
  
  // Use h2 for teasers, h1 for full nodes.
  $tag = ($vars['view_mode'] === 'full') ? 'h1' : 'h2';

  // Override the title variable entirely, with everything needed. Cleaner tpl.
  $vars['title'] = '<' . $tag . $vars['title_attributes'] . '>' . l($vars['title'], 'node/' . $vars['nid']) . '</' . $tag . '>';
}

function five_preprocess_comment(&$comment) {
  // remove the inline class on the links
  $link_classes = $comment['content']['links']['comment']['#attributes']['class'];
  foreach($link_classes as $key => $value) {
    if ($value === 'inline') {
      unset($link_classes[$key]);
    }
  }
  $comment['content']['links']['comment']['#attributes']['class'] = $link_classes;
  //kpr($comment);
}

?>
