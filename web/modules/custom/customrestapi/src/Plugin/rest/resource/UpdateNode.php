<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\customrestapi\Plugin\rest\resource;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\node\Entity\Node;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Psr\Log\LoggerInterface;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "update_node_api",
 *   label = @Translation("Custom rest resource"),
 *   serialization_class = "Drupal\node\Entity\Node",
 *   uri_paths = {
 *     "canonical" = "/api/update/node/{node}",
 *     "https://www.drupal.org/link-relations/create" = "/api/update/node/{node}"
 *   }
 * )
 */


class UpdateNode extends ResourceBase {
    
    /**
     * Responds to PUT requests.
     *
     * Returns a list of bundles for specified entity.
     *
     * @param $node
     * @return \Drupal\rest\ResourceResponse Throws exception expected.
     * Throws exception expected.
     */
    public function put($node) {
        print_r("hii");exit();
    }
    
}