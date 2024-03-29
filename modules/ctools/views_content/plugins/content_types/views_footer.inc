<?php

use Drupal\ctools\ContextRequired;

/**
 * @file
 * Allow a view context to display its attachment(s).
 */

$plugin = array(
  'title' => t('View footer'),
  'category' => t('View context'),
  'icon' => 'icon_views_page.png',
  'description' => t('Display the view footer if there are no results.'),
  'required context' => new ContextRequired(t('View'), 'view'),
);

/**
 * Render the node_terms content type.
 */
function views_content_views_footer_content_type_render($subtype, $conf, $panel_args, $context) {
  if (empty($context) || empty($context->data)) {
    return;
  }

  // Build the content type block.
  $block = new stdClass();
  $block->module  = 'views_footer';
  $block->delta   = $context->argument;
  $block->title   = '';
  $block->content = '';

  $output = views_content_context_get_output($context);
  $block->content = $output['footer'];

  return $block;
}

function views_content_views_footer_content_type_edit_form($form, &$form_state) {
  // This form does nothing; it exists to let the main form select the view context.
  return $form;
}

function views_content_views_footer_content_type_edit_form_submit(&$form, &$form_state) {
  // Kept so we guarantee we have a submit handler.
}

/**
 * Returns the administrative title for a type.
 */
function views_content_views_footer_content_type_admin_title($subtype, $conf, $context) {
  return t('"@context" footer', array('@context' => $context->identifier));
}
