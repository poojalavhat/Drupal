<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\customblock\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

/**
 * Class CustomController.
 *
 * @package Drupal\customblock\Controller
 */
class CustomController extends ControllerBase {

    public function Example() {

        return[
            '#title' => 'Example',
            '#markup' => 'This is a custom module',
        ];
    }
    
    public function test(){
        $test = "This is custom controller";
        return $test;
    }
}
