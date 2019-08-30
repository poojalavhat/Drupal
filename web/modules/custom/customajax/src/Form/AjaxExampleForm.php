<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\customajax\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class AjaxExampleForm extends FormBase {

    public function getFormId() {
        return 'ajax_example_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['example_select'] = [
            '#type' => 'select',
            '#title' => $this->t('Select element'),
            '#options' => [
                '1' => $this->t('One'),
                '2' => $this->t('Two'),
                '3' => $this->t('Three'),
                '4' => $this->t('From New York to Ger-ma-ny!'),
            ],
            '#ajax' => [
                'callback' => '::myAjaxcallback',
                'event' => 'change',
                'wrapper' => 'edit-output',
                'progress' => [
                    'type' => 'throbber',
                    'message' => t('Verifying entry...'),
                ],
            ],
        ];

        $form['example_text'] = [
            '#type' => 'textfield',
            '#size' => '60',
            '#disabled' => TRUE,
            '#value' => 'Hello, Drupal!!1',
            '#attributes' => [
                'id' => ['edit-output'],
            ],
        ];

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        parent::validateForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }

    public function myAjaxcallback(array &$form, FormStateInterface $form_state) {
        $value = $form_state->getValue('example_select');
        //prepare our textfield. check if the example select field has a selected option
        if ($selectedValue = $form_state->getValue('example_select')) {
            //get the text of the selected option
            $selectedText = $form['example_select']['#options'][$selectedValue];
//            print_r($selectedText);
//            exit();
            //place the text of the selected option in our textfield.
            $form['example_text']['#value'] = $selectedText;
        }
        //return the prepared textfield
        return $form['example_text'];
    }

}
