<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Implements hook_views_data_alter().
 */
function customplugin_views_data_alter(array &$data) {


    $data['node_field_data']['node_type_filter'] = array(
        'title' => t('Enhanced node type filter'),
        'filter' => array(
            'title' => t('Enhanced node type filter'),
            'help' => t('Provides a custom filter for nodes by their type.'),
            'field' => 'type',
            'id' => 'string'
        ),
    );

    $data['node_field_data']['nodes_titles'] = array(
        'title' => t('Node titles'),
        'filter' => array(
            'title' => t('Node titles'),
            'help' => t('Specify a list of titles a node can have.'),
            'field' => 'title',
            'id' => 'customplugin_node_titles'
        ),
    );



//    return $data;
}

/**
 * Implements hook_views_data().
 */
function customplugin_views_data() {
    $data['views']['custom_area'] = array(
        'title' => t('My custom site area'),
        'help' => t('Provide return link and a custom hardcoded text for my custom site.'),
        'area' => array(
            'id' => 'custom_area',
        ),
    );
    return $data;
}
