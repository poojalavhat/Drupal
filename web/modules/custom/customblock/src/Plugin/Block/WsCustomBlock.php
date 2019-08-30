<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\customblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ws custom' block.
 *
 * @Block(
 *   id = "ws_custom_block",
 *   admin_label = @Translation("WS Custom Block"),
 *
 * )
 */
class WsCustomBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        // do something
      
        return array(
            '#theme' => 'ws_custom',
            '#title' => 'Websolutions Agency',
            '#description' => 'Websolutions Agency is the industry leading Drupal development agency in Croatia'
        );
    }

}
