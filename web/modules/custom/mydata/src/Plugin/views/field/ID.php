<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\mydata\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * @ingroup views_field_handlers
 *
 * @ViewsField("id")
 */
class ID extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
      
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['id'] = ['default' => ''];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    $form['id'] = [
      '#type' => 'textarea',
      '#title' => $this->t('ID'),
      '#description' => $this->t('Use &#60;style&#62;&#60;/style&#62; tags to include your custom css styles.'),
    ];
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $result = "";
    if (!empty($this->view->field['id'])) {
      $result = $values->id;
      
    }
    
    return [
      '#markup' => $result,
        '#uri' => $result,
    ];
  }

  

}