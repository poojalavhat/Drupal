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
use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Ajax\HtmlCommand;

class AjaxDataForm extends FormBase {

    public function getFormId() {
        return 'ajax_data_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['message'] = [
            '#type' => 'markup',
            '#markup' => '<div class="result_message"></div>'
        ];

        $form['text_name'] = [
            '#type' => 'textfield',
            '#title' => t('Text Name'),
        ];

//        $form['text_input'] = [
//            '#type' => 'textfield',
//            '#title' => 'Test Input',
//            '#size' => '60',
//            '#attributes' => [
//                'class' => ['text1_input'],
//            ],
//        ];

        $form['actions'] = [
            '#type' => 'button',
            '#value' => 'Submit',
            '#ajax' => [
                'callback' => '::logSomething',
            ],
        ];

        $form['#attached']['library'][] = 'customajax/loggy';
        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        parent::validateForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Display result.
//        foreach ($form_state->getValues() as $key => $value) {
//            drupal_set_message($key . ': ' . $value);
//        }
    }

    public function logSomething(array &$form, FormStateInterface $form_state) {
        $response = new AjaxResponse();
        $response->addCommand(new InvokeCommand(NULL, 'loggy', [$form_state->getValue('text_name')]));
        return $response;
    }

}
