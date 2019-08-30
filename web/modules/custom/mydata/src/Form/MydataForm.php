<?php

namespace Drupal\mydata\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class MydataForm.
 *
 * @package Drupal\mydata\Form
 */
class MydataForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'mydata_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $conn = Database::getConnection();
        $query = $conn->select('custom_state_table', 'm');
        $query->fields('m', ['id', 'state']);
        $results = $query->execute()->fetchAll();

        $options = array();
        foreach ($results as $data) {
            $options[$data->id] = $data->state;
        }
        
        $record = array();
        if (isset($_GET['num'])) {
            $query = $conn->select('mydata', 'm')
                    ->condition('id', $_GET['num'])
                    ->fields('m');
            $record = $query->execute()->fetchAssoc();
            
//            $cityquery = $conn->select('custom_city_table', 'c')
//                    ->condition('id', $record['city'])
//                    ->fields('c',['city']);
//            $cityrecord = $cityquery->execute()->fetchAssoc();
//            print_r($record['city']);exit();
            
            
        }
        
        $form['#theme'] = 'my_custom_form';
        
        $form['candidate_name'] = array(
            '#type' => 'textfield',
            '#title' => t('Candidate Name:'),
            '#required' => TRUE,
            //'#default_values' => array(array('id')),
            '#default_value' => (isset($record['name']) && $_GET['num']) ? $record['name'] : '',
            '#attributes' => [
                'id' => ['name-edit-test'],
            ],
        );
        $form['mobile_number'] = array(
            '#type' => 'textfield',
            '#title' => t('Mobile Number:'),
            '#default_value' => (isset($record['mobilenumber']) && $_GET['num']) ? $record['mobilenumber'] : '',
        );
        $form['candidate_mail'] = array(
            '#type' => 'email',
            '#title' => t('Email ID:'),
            '#required' => TRUE,
            '#default_value' => (isset($record['email']) && $_GET['num']) ? $record['email'] : '',
        );
        $form['candidate_age'] = array(
            '#type' => 'textfield',
            '#title' => t('AGE'),
            '#required' => TRUE,
            '#default_value' => (isset($record['age']) && $_GET['num']) ? $record['age'] : '',
        );
        $form['candidate_gender'] = array(
            '#type' => 'select',
            '#title' => ('Gender'),
            '#options' => array(
                'Female' => t('Female'),
                'Male' => t('Male')
            ),
            '#default_value' => (isset($record['gender']) && $_GET['num']) ? $record['gender'] : '',
        );

        $form['state'] = [
            '#type' => 'select',
            '#title' => t('State'),
            '#options' => $options,
            '#default_value' => (isset($record['state']) && $_GET['num']) ? $record['state'] : '',
            '#ajax' => [
//                'callback' => [$this, 'changeOptionsAjax'],
                'callback'=> '::changeOptionsAjax',
                'wrapper' => 'second_field_wrapper',
            ],
        ];

        $form['city'] = [
            '#type' => 'select',
            '#title' => t('City'),
            '#options' => $this->getOptions($form_state),
            '#default_value' => (isset($record['city']) && $_GET['num']) ? $record['city'] : '',
            '#prefix' => '<div id="second_field_wrapper">',
            '#suffix' => '</div>',
        ];
        $form['web_site'] = array(
            '#type' => 'textfield',
            '#title' => t('web site'),
            '#default_value' => (isset($record['website']) && $_GET['num']) ? $record['website'] : '',
        );
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'save',
                //'#value' => t('Submit'),
        ];

//        $form['cache'] = False;
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $name = $form_state->getValue('candidate_name');
        if (preg_match('/[^A-Za-z]/', $name)) {
            $form_state->setErrorByName('candidate_name', $this->t('your name must in characters without space'));
        }
        if (!intval($form_state->getValue('candidate_age'))) {
            $form_state->setErrorByName('candidate_age', $this->t('Age needs to be a number'));
        }
        /* $number = $form_state->getValue('candidate_age');
          if(!preg_match('/[^A-Za-z]/', $number)) {
          $form_state->setErrorByName('candidate_age', $this->t('your age must in numbers'));
          } */
        if (strlen($form_state->getValue('mobile_number')) < 10) {
            $form_state->setErrorByName('mobile_number', $this->t('your mobile number must in 10 digits'));
        }
        parent::validateForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $field = $form_state->getValues();
        $name = $field['candidate_name'];
        $number = $field['mobile_number'];
        $email = $field['candidate_mail'];
        $age = $field['candidate_age'];
        $state = $field['state'];
        $city = $field['city'];
        $gender = $field['candidate_gender'];
        $website = $field['web_site'];
        if (isset($_GET['num'])) {
            $field = array(
                'name' => $name,
                'mobilenumber' => $number,
                'email' => $email,
                'age' => $age,
                'gender' => $gender,
                'website' => $website,
                'state'=>$state,
                'city'=>$city,
            );
            $query = \Drupal::database();
            $query->update('mydata')
                    ->fields($field)
                    ->condition('id', $_GET['num'])
                    ->execute();
            drupal_set_message("succesfully updated");
            $form_state->setRedirect('mydata.display_table_controller_display');
        } else {
            $field = array(
                'name' => $name,
                'mobilenumber' => $number,
                'email' => $email,
                'age' => $age,
                'gender' => $gender,
                'website' => $website,
                'state'=>$state,
                'city'=>$city,
            );
            $query = \Drupal::database();
            $query->insert('mydata')
                    ->fields($field)
                    ->execute();
            drupal_set_message("succesfully saved");
            $form_state->setRedirect('mydata.display_table_controller_display');
        }
    }

    /**
     * Get options for second field.
     */
    public function getOptions(FormStateInterface $form_state) {
        $query = \Drupal::database()->select('custom_city_table', 'm');
        $query->fields('m', ['id', 'city']);
        $query->condition('m.state_id', $form_state->getValue('state'));
        $results = $query->execute()->fetchAll();
        $options = array();


        if ($form_state->getValue('state')) {
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
        return $form['city'];
    }

}
