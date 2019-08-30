<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\customentity\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\Entity\Node;
use \Drupal\user\Entity\User;
use \Drupal\node\NodeInterface;
use \Drupal\user\UserInterface;

/**
 * Class UserController.
 *
 * @package Drupal\customentity\Controller
 */
class UserController extends ControllerBase {

    /**
     * createnode.
     *
     * @return created node
     */
    public function createuser() {
        $user = User::create([
                    'name' => 'user',
                    'mail' => 'user@gmail.com',
                    'pass' => 'password',
                    'status' => 1,
                    'roles' => array('editor', 'administrator'),
                    'timezone' => 'Indian/Christmas'
        ]);

        $user->save();
        return [
            '#markup' => 'Custom user created successfully!'
        ];
    }

    public function updateuser(UserInterface $user) {
        $old_username = $user->name->value;
        $old_email = $user->mail->value;
        $old_timezone = $user->timezone->value;
        $user->set('name', 'user123');
        $user->set('mail', 'user123@gmail.com');
        $user->set('timezone', 'Asia/Kolkata');
        $user->save();
//        $password = $user->pass->value;
        return[
            '#markup' => 'Custom User updated successfully!'
            . '<p>Created user ID :' . $user->id() . '</p>'
            . '<p> User Name : ' . $user->name->value . '</p>'
            . '<p>Updated User Email :' . $user->mail->value . '</p>',
        ];
    }

    public function deleteuser($user) {
        $userid = $user->id();
        $storage_handler = \Drupal::entityTypeManager()->getStorage('user');
        $user = $storage_handler->load($userid);
        $storage_handler->delete(array($user));
        
        return [
           '#type' => 'markup',
           '#markup' => $this->t('Custom user deleted successfully ')
        ];
       
    }

}
