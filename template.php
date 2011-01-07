<?php

function five_preprocess_html(&$vars) {
  // Apply the outline class to view the page in an indented document outline
  // array_push($vars['classes_array'], 'wireframe');
  // Apply the typology for a colored, bas-relief view of the page structure
  // array_push($vars['classes_array'], 'typology');
  // Add CSS
  drupal_add_css(path_to_theme() . '/css/basic.css', array('group' => CSS_THEME, 'media' => 'screen', 'preprocess' => TRUE));
  drupal_add_css(path_to_theme() . '/css/dev/wireframe.css', array('group' => CSS_THEME, 'media' => 'screen', 'preprocess' => TRUE));
  drupal_add_css(path_to_theme() . '/css/dev/typology.css', array('group' => CSS_THEME, 'media' => 'screen', 'preprocess' => TRUE));
  drupal_add_css(path_to_theme() . '/css/outliner/outliner.css', array('group' => CSS_THEME, 'media' => 'screen', 'preprocess' => TRUE));
  drupal_add_css(path_to_theme() . '/css/ie/ie-7.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie/ie-8.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
  // Add JavaScript
  drupal_add_library('system','ui.dialog');
  drupal_add_js(path_to_theme() . '/js/jquery.plugins/jquery.outliner-0.1.js');
  // html5.js is required for IE to understand the new elements like article
  // @see http://remysharp.com/2009/01/07/html5-enabling-script/
  drupal_add_js(path_to_theme() . '/js/html5.js');
  drupal_add_js(path_to_theme() . '/js/basic.js');
  drupal_add_js(path_to_theme() . '/js/modernizr-1.6.min.js');
  //kpr($vars);
}

function five_preprocess_page(&$vars) {
  $vars['primary_links'] = theme(
    'links__system_main_menu',
    array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array(
          'links', 
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
          'links',
          'clearfix')
        ),
      'heading' => t('Secondary menu')
    )
  );
  //$vars['page']['sidebar_a']['#theme_wrappers'][0] = 'container';
  //kpr($vars);
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
  //kpr($block);
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
