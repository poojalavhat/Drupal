<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\mydata\Plugin\views\query;

use Drupal\views\Plugin\views\query\QueryPluginBase;
use Drupal\views\ViewExecutable;
use Drupal\views\ResultRow;

/**
 * MyData views query plugin which wraps calls to the ExampleTable API in order to
 * expose the results to views.
 *
 * @ViewsQuery(
 *   id = "mydata",
 *   title = @Translation("MyData"),
 *   help = @Translation("Query against the ExampleTable API.")
 * )
 */

class MyData extends QueryPluginBase {
    
    public function ensureTable($table, $relationship = NULL) {
        return '';
    }
    
    public function addField($table, $field, $alias = '', $params = array()) {
        return $field;
    }
    
    /**
     * {@inheritdoc}
     */
    public function execute(ViewExecutable $view) { 
        $query = \Drupal::database()->select('mydata', 'm');
        $query->fields('m', ['id', 'name','email','age','website','gender','mobilenumber']);
        $results = $query->execute()->fetchAll();
        $index = 0;  
      foreach ($results as $data) {
        $data = (array)$data;
        $row['id'] = $data['id'];
        $row['name'] = $data['name'];
        $row['gender'] = $data['gender'];
        $row['email'] = $data['email'];
        $row['website'] = $data['website'];
        $row['age'] = $data['age'];
        $row['mobilenumber'] = $data['mobilenumber'];
        $row['index'] = $index++;
        $view->result[] = new ResultRow($row);
        
      }
      
    }
    
    
    
    
}