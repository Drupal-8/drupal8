<?php

use Drupal\ctools\ContextRequired;

/**
 * @file relationships/term_parent.inc
 * Plugin to provide an relationship handler for term parent.
 */

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'title' => t('Term parent'),
  'keyword' => 'parent_term',
  'description' => t('Adds a taxonomy term parent from a term context.'),
  'required context' => new ContextRequired(t('Term'), 'entity:taxonomy_term'),
  'context' => 'ctools_term_parent_context',
  'edit form' => 'ctools_term_parent_settings_form',
  'defaults' => array('type' => 'top'),
);

/**
 * Return a new context based on an existing context.
 */
function ctools_term_parent_context($context, $conf) {
  // If unset it wants a generic, unfilled context, which is just NULL.
  if (empty($context->data)) {
    return ctools_context_create_empty('entity:taxonomy_term');
  }

  if (isset($context->data)) {
    $result = db_query('SELECT t1.* FROM {taxonomy_term_hierarchy} t1 INNER JOIN {taxonomy_term_hierarchy} t2 ON t1.tid = t2.parent WHERE t2.tid = :tid', array(':tid' => $context->data->tid))->fetchAssoc();

    // If top level term, keep looking up until we see a top level.
    if ($conf['type'] == 'top') {
      // If looking for top level, and there are no parents at all, make sure
      // the current term is the 'top level'.
      if (empty($result)) {
        $result['tid'] = $context->data->tid;
      }
      while (!empty($result['parent'])) {
        $result = db_query('SELECT * FROM {taxonomy_term_hierarchy} WHERE tid = :tid', array(':tid' => $result['parent']))->fetchAssoc();
      }
    }

    // Load the term.
    if ($result) {
      $term = taxonomy_term_load($result['tid']);
      return ctools_context_create('entity:taxonomy_term', $term);
    }
  }
}

/**
 * Settings form for the relationship.
 */
function ctools_term_parent_settings_form($form, &$form_state) {
  $conf = $form_state['conf'];

  $form['type'] = array(
    '#type' => 'select',
    '#title' => t('Relationship type'),
    '#options' => array('parent' => t('Immediate parent'), 'top' => t('Top level term')),
    '#default_value' => $conf['type'],
  );

  return $form;
}
