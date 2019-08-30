<?php

namespace Drupal\ajax_form_submit\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Implementing a ajax form.
 */
class AjaxSubmitDemo extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_submit_demo';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>',
    ];

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number 1'),
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Number 2'),
    ];

    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Submit'),
      '#ajax' => [
        'callback' => '::setMessage',
      ],
    ];

    return $form;
  }

  /**
   * Setting the message in our form.
   */
  public function setMessage(array $form, FormStateInterface $form_state) {

    //print_r($form); exit;

    $field=$form_state->getValues();
  
    $name=$field['number_1'];
    //echo "$name";
    $number2=$field['number_2'];

    //print_r($name);
    // print_r($number2);
    //die;
     $field  = array(
              'name'   =>  $name,
              'mobilenumber' => $name2,
              'email' =>  $name,
              'age' => $name,
              'gender' => $name,
              'website' => $name,
              'country'=>$name,
              'state'=>$name

          );
           $query = \Drupal::database();
           $query ->insert('mydata')
               ->fields($field)
               ->execute();
 

   

    $response = new AjaxResponse();
   /* $response->addCommand(
      new HtmlCommand(
        '.result_message',
        '<div class="my_top_message">' . t('The results is @result', ['@result' => ($form_state->getValue('number_1') + $form_state->getValue('number_2'))]) . '</div>'
      )*/
      $response->addCommand(
      new HtmlCommand(
        '.result_message',
        '<div class="my_top_message">Form submitted successfully</div>'
      )
   
    );
    return $response;

    
  }

  /**
   * Submitting the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

}
