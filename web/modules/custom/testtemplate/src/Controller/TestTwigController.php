<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @file
 * Contains \Drupal\testtemplate\Controller\TestTwigController.
 */

namespace Drupal\testtemplate\Controller;

use Drupal\Core\Controller\ControllerBase;

class TestTwigController extends ControllerBase {

    public function content() {

        return [
           
            '#theme' => 'my_template',
            '#test_var' => $this->t('Test Value'),
        ];
    }

}
