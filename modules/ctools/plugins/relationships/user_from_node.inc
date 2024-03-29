<?php

use Drupal\ctools\ContextRequired;

/**
 * @file
 * Plugin to provide an relationship handler for node from user.
 */

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'title' => t('Node author'),
  'keyword' => 'user',
  'description' => t('Creates the author of a node as a user context.'),
  'required context' => new ContextRequired(t('Node'), 'node'),
  'context' => 'ctools_user_from_node_context',
  'no ui' => TRUE,
);

/**
 * Return a new context based on an existing context.
 */
function ctools_user_from_node_context($context, $conf) {
  // If unset it wants a generic, unfilled context, which is just NULL.
  if (empty($context->data) || !isset($context->data->uid)) {
    return ctools_context_create_empty('user', NULL);
  }

  if (isset($context->data->uid)) {
    // Load the user that is the author of the node.
    $uid = $context->data->uid;
    $account = user_load($uid);

    // Send it to ctools.
    return ctools_context_create('user', $account);
  }
}
