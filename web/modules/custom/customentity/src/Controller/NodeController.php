<?php

namespace Drupal\customentity\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\Entity\Node;
use \Drupal\node\NodeInterface;

/**
 * Class NodeController.
 *
 * @package Drupal\customentity\Controller
 */
class NodeController extends ControllerBase {

    /**
     * createnode.
     *
     * @return created node
     */
    public function createnode() {

        $node = Node::create([
                    'type' => 'custom_node',
                    'title' => 'Hello Page',
                    'body' => 'Body of the node',
                    'field_email' => 'hello@gmail.com',
                    'field_date' => ['2019-06-26',],
                    'uid' => 1,
        ]);
        $node->save();
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Custom node created successfully ')
        ];
    }
    
    /**
     * updatenode.
     *
     * @return update node
     */
    public function  updatecustomnode(NodeInterface $node){
        $old_title = $node->title->value;
        $old_body  = $node->body->value;
        $old_email = $node->field_email->value;
        $node->set('title','Test Updated Title');
        $node->set('body','This is Test  Updated body content');
        $node->set('field_email','testupdated@example.com');
        $node->save();
        return[
            '#markup' => 'Custom Node updated successfully!'
            .'<p>Created node ID :'.$node->id().'</p>'
            . '<p> Node Title : '.$old_title.'</p>'
            . '<p>Node Body :'.$old_body .'<p>Updated node ID :'.$node->id().'</p>'
            . '<p>Updated Node Title : '.$node->title->value.'</p>'
            . '<p>Updated Node Body :'.$node->body->value.'</p>'
            . '<p>Updated Node Email :'.$node->field_email->value.'</p>',
            
            
        ];
//        echo "<pre>";
//        print_r($node->field_email->value);exit();echo "</pre>";
        
    }
    
    public function deletenode($node){
        $nid = $node->id();
        $storage_handler = \Drupal::entityTypeManager()->getStorage('node');
        $node = $storage_handler->load($nid);
        $storage_handler->delete(array($node));
//        echo "<pre>";print_r($node);exit();echo "</pre>";
        return [
           '#type' => 'markup',
           '#markup' => $this->t('Custom node deleted successfully ')
        ];
        
    }
}
