<?php

/**
 * @file
 * Definition of Drupal\ctools_custom_content\Plugin\ctools\export_ui\CToolsCustomContentUI.
 */

namespace Drupal\ctools_custom_content\Plugin\ctools\export_ui;

use Drupal\ctools\Plugin\ctools\export_ui\ExportUIPluginBase;
use Drupal\Core\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;

/**
 * @Plugin(
 *   id = "ctools_custom_content_ui",
 *   name = "ctools_custom_content_ui",
 *   module = "ctools_custom_content",
 *   schema = "stylizer",
 *   access = "administer custom content",
 *   menu = {
 *     "menu_item" = "ctools-content",
 *     "menu_title" = "Custom content panes",
 *     "menu_description" = "Add, edit or delete custom content panes."
 *   },
 *   title_singular = @Translation("content pane"),
 *   title_singular_proper = @Translation("Content pane"),
 *   title_plural = @Translation("content panes"),
 *   title_plural_proper = @Translation("Content panes")
 * )
 */
class CToolsCustomContentUI extends ExportUIPluginBase {

  function edit_form(&$form, &$form_state) {
    // Correct for an error that came in because filter format changed.
    if (is_array($form_state['item']->settings['body'])) {
      $form_state['item']->settings['format'] = $form_state['item']->settings['body']['format'];
      $form_state['item']->settings['body'] = $form_state['item']->settings['body']['value'];
    }
    parent::edit_form($form, $form_state);

    $form['category'] = array(
      '#type' => 'textfield',
      '#title' => t('Category'),
      '#description' => t('What category this content should appear in. If left blank the category will be "Miscellaneous".'),
      '#default_value' => $form_state['item']->category,
    );

    $form['title'] = array(
      '#type' => 'textfield',
      '#default_value' => $form_state['item']->settings['title'],
      '#title' => t('Title'),
    );

    $form['body'] = array(
      '#type' => 'text_format',
      '#title' => t('Body'),
      '#default_value' => $form_state['item']->settings['body'],
      '#format' => $form_state['item']->settings['format'],
    );

    $form['substitute'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use context keywords'),
      '#description' => t('If checked, context keywords will be substituted in this content.'),
      '#default_value' => !empty($form_state['item']->settings['substitute']),
    );
  }

  function edit_form_submit(&$form, &$form_state) {
    parent::edit_form_submit($form, $form_state);

    // Since items in our settings are not in the schema, we have to do these manually:
    $form_state['item']->settings['title'] = $form_state['values']['title'];
    $form_state['item']->settings['body'] = $form_state['values']['body']['value'];
    $form_state['item']->settings['format'] = $form_state['values']['body']['format'];
    $form_state['item']->settings['substitute'] = $form_state['values']['substitute'];
  }

  function list_form(&$form, &$form_state) {
    parent::list_form($form, $form_state);

    $options = array('all' => t('- All -'));
    foreach ($this->items as $item) {
      $options[$item->category] = $item->category;
    }

    $form['top row']['category'] = array(
      '#type' => 'select',
      '#title' => t('Category'),
      '#options' => $options,
      '#default_value' => 'all',
      '#weight' => -10,
    );
  }

  function list_filter($form_state, $item) {
    if ($form_state['values']['category'] != 'all' && $form_state['values']['category'] != $item->category) {
      return TRUE;
    }

    return parent::list_filter($form_state, $item);
  }

  function list_sort_options() {
    return array(
      'disabled' => t('Enabled, title'),
      'title' => t('Title'),
      'name' => t('Name'),
      'category' => t('Category'),
      'storage' => t('Storage'),
    );
  }

  function list_build_row($item, &$form_state, $operations) {
    // Set up sorting
    switch ($form_state['values']['order']) {
      case 'disabled':
        $this->sorts[$item->name] = empty($item->disabled) . $item->admin_title;
        break;
      case 'title':
        $this->sorts[$item->name] = $item->admin_title;
        break;
      case 'name':
        $this->sorts[$item->name] = $item->name;
        break;
      case 'category':
        $this->sorts[$item->name] = $item->category;
        break;
      case 'storage':
        $this->sorts[$item->name] = $item->type . $item->admin_title;
        break;
    }

    $ops = theme('links__ctools_dropbutton', array('links' => $operations, 'attributes' => array('class' => array('links', 'inline'))));

    $this->rows[$item->name] = array(
      'data' => array(
        array('data' => check_plain($item->name), 'class' => array('ctools-export-ui-name')),
        array('data' => check_plain($item->admin_title), 'class' => array('ctools-export-ui-title')),
        array('data' => check_plain($item->category), 'class' => array('ctools-export-ui-category')),
        array('data' => $ops, 'class' => array('ctools-export-ui-operations')),
      ),
      'title' => check_plain($item->admin_description),
      'class' => array(!empty($item->disabled) ? 'ctools-export-ui-disabled' : 'ctools-export-ui-enabled'),
    );
  }

  function list_table_header() {
    return array(
      array('data' => t('Name'), 'class' => array('ctools-export-ui-name')),
      array('data' => t('Title'), 'class' => array('ctools-export-ui-title')),
      array('data' => t('Category'), 'class' => array('ctools-export-ui-category')),
      array('data' => t('Operations'), 'class' => array('ctools-export-ui-operations')),
    );
  }

}
