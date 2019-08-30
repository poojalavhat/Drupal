<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\custom_services_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HelloController.
 *
 * @package Drupal\custom_services_example\Controller
 */
class HelloController extends ControllerBase {

    public function HelloTest() {
        $service = \Drupal::service('custom_services_example.custom_service');
        $data =  $service->sayHello();
        return array(
            '#markup' => $data
        );
//       print_r($service);exit();
    }

}
