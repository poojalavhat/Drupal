<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\exampletable\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * @ingroup views_field_handlers
 *
 * @ViewsField("name")
 */
class Name extends FieldPluginBase {

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
        $options['name'] = ['default' => ''];
        ;
        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function buildOptionsForm(&$form, FormStateInterface $form_state) {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('name'),
            '#description' => $this->t('Enter your first name.'),
            '#default_value' => $this->options['name'],
        ];
        parent::buildOptionsForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function render(ResultRow $values) {
        $result = "";
        if (!empty($this->view->field['name'])) {
            $result = $values->name;
        }

        return [
            '#markup' => $result,
        ];
        
    }

//  /**
//   * {@inheritdoc}
//   */
//  public function clickSort($order) {
//    $this->query->addOrderBy('text_css_content', 'created', $order);
//  }
}
