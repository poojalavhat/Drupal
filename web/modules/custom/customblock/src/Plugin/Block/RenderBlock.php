<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\customblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\customblock\Controller\CustomController;

/**
 * Provides a 'render' block.
 *
 * @Block(
 *   id = "render_block",
 *   admin_label = @Translation("Render block"),
 *   category = @Translation("Custom render block example")
 * )
 */

class RenderBlock extends BlockBase{
    
    public function build(){
        $obj_render = new CustomController;
        $renderobj = $obj_render->Example();
        return $renderobj;
    }
}