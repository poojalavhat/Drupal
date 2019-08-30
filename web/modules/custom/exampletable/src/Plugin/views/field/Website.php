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
 * @ViewsField("website")
 */
class Website extends FieldPluginBase {

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
        $options['website'] = ['default' => ''];
        ;
        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function buildOptionsForm(&$form, FormStateInterface $form_state) {
        $form['website'] = [
            '#type' => 'textfield',
            '#title' => $this->t('website'),
            '#description' => $this->t('Enter Your website.'),
            
        ];
        parent::buildOptionsForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function render(ResultRow $values) {
        $result = "";
        if (!empty($this->view->field['website'])) {
            $result = $values->website;
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
