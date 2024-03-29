<?php

use Drupal\ctools\ContextRequired;

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'single' => TRUE,
  'icon' => 'icon_node_form.png',
  'title' => t('Node form revision log message'),
  'description' => t('Revision log message for the node.'),
  'required context' => new ContextRequired(t('Form'), 'node_form'),
  'category' => t('Form'),
);

function ctools_node_form_log_content_type_render($subtype, $conf, $panel_args, &$context) {
  $block = new stdClass();
  $block->module = t('node_form');
  $block->title = t('Revision information');

  if (isset($context->form)) {
    if (isset($context->form['revision_information'])) {
      $block->content['revision_information'] = $context->form['revision_information'];
      unset($block->content['revision_information']['#pre_render']);
      unset($block->content['revision_information']['#theme_wrappers']);
      $block->content['revision_information']['#type'] = '';

      // Set access to false on the original rather than removing so that
      // vertical tabs doesn't clone it. I think this is due to references.
      $context->form['revision_information']['#access'] = FALSE;
    }
  }
  else {
    $block->content = t('Revision information.');
  }

  return $block;
}

function ctools_node_form_log_content_type_admin_title($subtype, $conf, $context) {
  return t('"@s" node form revision log', array('@s' => $context->identifier));
}

function ctools_node_form_log_content_type_edit_form($form, &$form_state) {
  // provide a blank form so we have a place to have context setting.
  return $form;
}
