<?php

//

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\mydata\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\InvokeCommand;

/**
 * Class AjaxSubmitDemo.
 *
 * @package Drupal\mydata\Form
 */
class AjaxSubmitDemo extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'ajax_submit_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {

//        $form['message'] = [
//            '#type' => 'markup',
//            '#markup' => '<div class="result_message"></div>'
//        ];
//
//        $form['number_1'] = [
//            '#type' => 'textfield',
//            '#title' => $this->t('Number 1'),
//        ];
//
//        $form['number_2'] = [
//            '#type' => 'textfield',
//            '#title' => $this->t('Number 2'),
//        ];
//
//        $form['actions'] = [
//            '#type' => 'button',
//            '#value' => $this->t('Submit'),
//            '#ajax' => [
//                'callback' => '::setMessage',
//            ],
//        ];
//        $form['input'] = [
//            '#type' => 'textfield',
//            '#title' => 'A Textfield',
//            '#description' => 'Enter a number to be validated via ajax.',
//            '#size' => '60',
//            '#maxlength' => '10',
//            '#required' => TRUE,
//            '#ajax' => [
//                'callback' => '::sayHello',
//                'event' => 'keyup',
//                'wrapper' => 'edit-output',
//                'progress' => [
//                    'type' => 'throbber',
//                    'message' => t('Verifying entry...'),
//                ],
//            ],
//        ];
//        
//        $options = array(
//        '1' => t('1'),
//        '2' => t('2'),
//        );
//        
//        $second_options = array(
//            '3' => t('3'),
//            '4' => t('4'),
//        );
//        
//        $form['state'] = [
//            '#type' => 'select',
//            '#title' => 'State',
//            '#prefix' => '<div id="dropdown-first-replace" class="form-select">',
//            '#suffix' => '</div>',
//            '#options' => $options,
//            '#default_value' => '-- Select value --',
//            '#ajax'=> [
//                'callback' => '::GetValue',
//                'event'   =>  'change',
//                'wrapper' => 'dropdown-second-replace',
//            ],
//            '#suffix' => '<span class="email-valid-message"></span>',
//        ];
//        
//        $form['text_input'] = [
//            '#type'=> 'textfield',
//            '#title'=> 'Test Input',
//            '#size'=>'60',
//            '#attributes'=>[
//                'class'=> ['text1_input'],
//            ],
//        ];
        $query = \Drupal::database()->select('custom_state_table', 'm');
        $query->fields('m', ['id', 'state']);
        $results = $query->execute()->fetchAll();

        $options = array();
        foreach ($results as $data) {
            $options[$data->id] = $data->state;
        }

        $form['first_field'] = [
            '#type' => 'select',
            '#title' => t('First field'),
            '#options' => $options,
            '#ajax' => [
                'callback' => [$this, 'changeOptionsAjax'],
                'wrapper' => 'second_field_wrapper',
            ],
        ];
        $form['second_field'] = [
            '#type' => 'select',
            '#title' => t('Second field'),
            '#options' => $this->getOptions($form_state),
            '#prefix' => '<div id="second_field_wrapper">',
            '#suffix' => '</div>',
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Submit',
        ];
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        
    }

    public function setMessage(array $form, FormStateInterface $form_state) {
        $response = new AjaxResponse();
        $response->addCommand(
                new HtmlCommand(
                '.result_message', '<div class="my_top_message">The result is ' . t('The results is ') . ($form_state->getValue('number_1') + $form_state->getValue('number_2')) . '</div>')
        );
        return $response;
    }

    public function sayHello(array $form, FormStateInterface $form_state) {
        $elem = [
            '#type' => 'textfield',
            '#size' => '60',
            '#disabled' => TRUE,
            '#value' => 'Hello, ' . $form_state->getValue('input') . '!',
            '#attributes' => [
                'id' => ['edit-output'],
            ],
        ];

        $renderer = \Drupal::service('renderer');
        $response = new AjaxResponse();

        $response->addCommand(new ReplaceCommand('#edit-output', $renderer->render($elem)));

        $dialogText['#markup'] = "Nice text ...";
        $dialogText['#attached']['library'][] = 'core/drupal.dialog.ajax';
        $response->addCommand(new OpenModalDialogCommand("My title", $dialogText, ['width' => '300']));

        return $response;
    }

    public function GetValue(array $form, FormStateInterface $form_state) {
//                print_r($form_state->getValue('state'));exit();
        $response = new AjaxResponse();
        $response->addCommand(new HtmlCommand('.email-valid-message', '<input type="text" class="one" >' . ($form_state->getValue('state'))));
//        $response->addCommand(new HtmlCommand('.email-valid-message',($form_state->getValue('state'))));
//        $response->addCommand(new InvokeCommand('.text1_input', 'val', ($form_state->getValue('state'))));
        return $response;
    }

    /**
     * Get options for second field.
     */
    public function getOptions(FormStateInterface $form_state) {
        $query = \Drupal::database()->select('custom_city_table', 'm');
        $query->fields('m', ['id', 'city']);
        $query->condition('m.state_id', $form_state->getValue('first_field'));
        $results = $query->execute()->fetchAll();
        $options = array();


        if ($form_state->getValue('first_field')) {
            foreach ($results as $data) {
                $options[$data->id] = $data->city;
            }
        } else {
            $query = \Drupal::database()->select('custom_city_table', 'm');
            $query->fields('m', ['id', 'city']);
            $results = $query->execute()->fetchAll();
            foreach ($results as $data) {
                $options[$data->id] = $data->city;
            }
        }
        return $options;
    }

    /**
     * Ajax callback to change options for second field.
     */
    public function changeOptionsAjax(array &$form, FormStateInterface $form_state) {
        return $form['second_field'];
    }

}
