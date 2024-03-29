<?php

use Drupal\ctools\ContextRequired;

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'title' => t('User signature'),
  'icon' => 'icon_user.png',
  'description' => t('The signature of a user.'),
  'required context' => new ContextRequired(t('User'), 'user'),
  'category' => t('User'),
);

function ctools_user_signature_content_type_render($subtype, $conf, $panel_args, $context) {
  $account = isset($context->data) ? clone($context->data) : NULL;
  $block = new stdClass();
  $block->module = 'user-signature';

  if ($account === FALSE || ($account->access == 0 && !user_access('administer users'))) {
    return;
  }

  $element['user_signature'] = array(
    '#theme' => 'user_signature',
    '#signature' => check_markup($account->signature, $account->signature_format),
  );

  $block->content = $element;
  return $block;
}

/**
 * Display the administrative title for a panel pane in the drag & drop UI
 */
function ctools_user_signature_content_type_admin_title($subtype, $conf, $context) {
  return t('"@s" user signature', array('@s' => $context->identifier));
}

function ctools_user_signature_content_type_edit_form($form, &$form_state) {
  // provide a blank form so we have a place to have context setting.
  return $form;
}
