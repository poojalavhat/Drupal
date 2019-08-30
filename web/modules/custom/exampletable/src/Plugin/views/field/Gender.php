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
 * @ViewsField("gender")
 */
class Gender extends FieldPluginBase {

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
        $options['gender'] = ['1' => 'Male','2' => 'Female'];
        ;
        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function buildOptionsForm(&$form, FormStateInterface $form_state) {
        $options = ['1' => 'Male','2' => 'Female'];
        $form['gender'] = [
            '#type' => 'select',
            '#title' => $this->t('gender'),
            '#description' => $this->t('Select the Gender'),
            '#options' => array(t('Select Gender'),t('Male'),t('Female')),
        ];
        parent::buildOptionsForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function render(ResultRow $values) {
        $result = "";
        if (!empty($this->view->field['gender'])) {
            $result = $values->gender;
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
