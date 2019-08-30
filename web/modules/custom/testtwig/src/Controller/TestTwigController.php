<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\testtwig\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

/**
 * Class TestTwigController.
 *
 * @package Drupal\testtwig\Controller
 */
class TestTwigController extends ControllerBase {
    
    public function content() {
        
    return [
      '#theme' => 'my_template',
      '#test_var' => $this->t('Test Value'),
    ];
 
  }
  
  public function display(){
      
      return [
          '#theme' => 'second_template',
          '#test'   => $this->t('Test One'),
      ];
  }
}