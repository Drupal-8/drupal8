<?php

use Drupal\ctools\ContextRequired;

if (module_exists('comment')) {
  /**
   * Plugins are described by creating a $plugin array which will be used
   * by the system that includes this file.
   */
  $plugin = array(
    'single' => TRUE,
    'title' => t('Node comments'),
    'icon' => 'icon_node.png',
    'description' => t('The comments of the referenced node.'),
    'required context' => new ContextRequired(t('Node'), 'node'),
    'category' => t('Node'),
    'defaults' => array(
      'mode' => variable_get('comment_default_mode', COMMENT_MODE_THREADED),
      'comments_per_page' => variable_get('comment_default_per_page', '50'),
    ),
  );
}

function ctools_node_comments_content_type_render($subtype, $conf, $panel_args, $context) {
  $node = isset($context->data) ? clone($context->data) : NULL;
  $block = new stdClass();
  $block->module = 'comments';
  $block->delta  = $node->nid;

  $block->title = t('Comments');
  if (empty($node)) {
    $block->content = t('Node comments go here.');
  }
  else if ($node->comment) {
    $block->content = ctools_comment_render($node, $conf);
    // Update the history table, stating that this user viewed this node.
    node_tag_new($node);
  }

  return $block;
}

function ctools_node_comments_content_type_edit_form($form, &$form_state) {
  $conf = $form_state['conf'];
  $form['mode'] = array(
    '#type' => 'select',
    '#title' => t('Mode'),
    '#default_value' => $conf['mode'],
    '#options' => _comment_get_modes(),
    '#weight' => 1,
  );
  foreach (_comment_per_page() as $i) {
    $options[$i] = t('!a comments per page', array('!a' => $i));
  }
  $form['comments_per_page'] = array('#type' => 'select',
    '#title' => t('Pager'),
    '#default_value' => $conf['comments_per_page'],
    '#options' => $options,
    '#weight' => 3,
  );
  return $form;
}

function ctools_node_comments_content_type_edit_form_submit($form, &$form_state) {
  // Copy everything from our defaults.
  foreach (array_keys($form_state['plugin']['defaults']) as $key) {
    $form_state['conf'][$key] = $form_state['values'][$key];
  }
}

function ctools_node_comments_content_type_admin_title($subtype, $conf, $context) {
  return t('"@s" comments', array('@s' => $context->identifier));
}

/**
 * This function is a somewhat stripped down version of comment_render
 * that removes a bunch of cruft that we both don't need, and makes it
 * difficult to modify this.
 */
function ctools_comment_render($node, $conf) {
  $output = '';
  if (!user_access('access comments') || !$node->comment) {
    return;
  }

  $mode = $conf['mode'];
  $comments_per_page = $conf['comments_per_page'];

  $cids = comment_get_thread($node, $mode, $comments_per_page);
  $comments = comment_load_multiple($cids);

  if ($comments) {
    drupal_add_css(drupal_get_path('module', 'comment') . '/comment.css');
    comment_prepare_thread($comments);
    $build = comment_view_multiple($comments, $node);
    $build['pager']['#theme'] = 'pager';
    return drupal_render($build);
  }
  return;
}
