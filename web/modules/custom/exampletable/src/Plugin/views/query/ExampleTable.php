<?php

namespace Drupal\exampletable\Plugin\views\query;

use Drupal\views\Plugin\views\query\QueryPluginBase;
use Drupal\views\ViewExecutable;
use Drupal\views\ResultRow;

/**
 * ExampleTable views query plugin which wraps calls to the ExampleTable API in order to
 * expose the results to views.
 *
 * @ViewsQuery(
 *   id = "exampletable",
 *   title = @Translation("ExampleTable"),
 *   help = @Translation("Query against the ExampleTable API.")
 * )
 */
class ExampleTable extends QueryPluginBase {

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
        print_r("kkk");exit();
        $query = \Drupal::database()->select('example_table', 'm');
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
