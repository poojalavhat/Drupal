<?php

/**
 * Implements hook_views_data().
 */
function exampletable_views_data() {

    $data = array();

    $data['example_table'] = array();

    $data['example_table']['table'] = array();

    $data['example_table']['table']['group'] = t('Example Table');

    $data['example_table']['table']['base'] = array(
//        'field' => 'id',
        'title' => t('Example table'),
        'help' => t('Example table contains example content and can be related to nodes.'),
        'weight' => -10,
        'query_id' => 'exampletable'
    );
//The ‘query_id’ key is the most important. The value is the name of our query plugin.
    $data['example_table']['id'] = array(
        'title' => t('My Data - ID'),
        'field' => array(
            'title' => t('My Data - ID'),
            'help' => t('Just a id for My Data.'),
            'id' => 'id',
        ),
    );


    $data['example_table']['name'] = array(
        'title' => t('My Data - Name'),
        'field' => array(
            'title' => t('My Data - Name'),
            'help' => t('Just a name for My Data.'),
            'id' => 'name',
        ),
    );

    $data['example_table']['mobilenumber'] = array(
        'title' => t('My Data - Mobile Number'),
        'field' => array(
            'title' => t('My Data - Mobile Number'),
            'help' => t('Just a mobilenumber for My Data.'),
            'id' => 'mobilenumber',
        ),
    );

    $data['example_table']['email'] = array(
        'title' => t('My Data - Email'),
        'field' => array(
            'title' => t('My Data - Email'),
            'help' => t('Just a email for My Data.'),
            'id' => 'email',
        ),
    );


    $data['example_table']['age'] = array(
        'title' => t('My Data - Age'),
        'field' => array(
            'title' => t('My Data - Age'),
            'help' => t('Just a age for My Data.'),
            'id' => 'age',
        ),
    );


    $data['example_table']['gender'] = array(
        'title' => t('My Data - Gender'),
        'field' => array(
            'title' => t('My Data - Gender'),
            'help' => t('Just a gender for My Data.'),
            'id' => 'gender',
        ),
    );


    $data['example_table']['website'] = array(
        'title' => t('My Data - Website'),
        'field' => array(
            'title' => t('My Data - Website'),
            'help' => t('Just a website for My Data.'),
            'id' => 'website',
        ),
    );

    return $data;
}

?>