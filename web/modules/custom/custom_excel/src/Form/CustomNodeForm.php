<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\custom_excel\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class CustomNodeForm.
 *
 * @package Drupal\custom_excel\Form
 */
class CustomNodeForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'customexcel_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        
        $form['title'] = array(
            '#type' => 'entity_autocomplete',
            '#target_type' => 'node',
            '#selection_handler' => 'default', 
            '#selection_settings' => array(
                'target_bundles' => array('article', 'page'),
            ),
        );
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        
    }

}
