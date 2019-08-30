<?php

namespace Drupal\customentity\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\Entity\Node;
use \Drupal\node\NodeInterface;
use \Drupal\taxonomy\Entity\Term;
use \Drupal\taxonomy\TermInterface;

/**
 * Class NodeController.
 *
 * @package Drupal\customentity\Controller
 */
class TaxonomyController extends ControllerBase {

    /**
     * createterm.
     *
     * @return created term
     */
    public function createterm() {

        $term = Term::create([
                    'name' => 'Custom Term 2',
                    'vid' => 'new',
                ]);
                
           $term->save();
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Custom taxonomy created successfully ')
        ];
    }



    public function deleteterm(TermInterface $taxonomy_term) {
        $termid = $taxonomy_term->id();
        $storage_handler = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
        $term = $storage_handler->load($termid);
        $storage_handler->delete(array($term));
//        echo "<pre>";print_r($node);exit();echo "</pre>";
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Custom Taxonomy term deleted successfully ')
        ];
    }

}
