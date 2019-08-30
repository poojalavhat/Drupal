<?php

/**
 * Implements hook_views_data().
 */
function mydata_views_data() {

    $data = array();

    $data['mydata'] = array();

    $data['mydata']['table'] = array();

    $data['mydata']['table']['group'] = t('Custom data view');

    $data['mydata']['table']['base'] = array(
//        'field' => 'id',
        'title' => t('Custom mydata view'),
        'help' => t('mydata table contains example content and can be related to nodes.'),
        'weight' => -10,
        'query_id' => 'mydata'
    );
//The ‘query_id’ key is the most important. The value is the name of our query plugin.
    $data['mydata']['id'] = array(
        'title' => t('ID'),
        'field' => array(
            'title' => t('ID'),
            'help' => t('Just a id for My Data.'),
            'id' => 'id',
        ),
    );


    $data['mydata']['name'] = array(
        'title' => t('Name'),
        'field' => array(
            'title' => t('Name'),
            'help' => t('Just a name for My Data.'),
            'id' => 'name',
        ),
    );

    $data['mydata']['mobilenumber'] = array(
        'title' => t('Mobile Number'),
        'field' => array(
            'title' => t('Mobile Number'),
            'help' => t('Just a mobilenumber for My Data.'),
            'id' => 'mobilenumber',
        ),
    );

    $data['mydata']['email'] = array(
        'title' => t('Email'),
        'field' => array(
            'title' => t('Email'),
            'help' => t('Just a email for My Data.'),
            'id' => 'email',
        ),
    );


    $data['mydata']['age'] = array(
        'title' => t('Age'),
        'field' => array(
            'title' => t('Age'),
            'help' => t('Just a age for My Data.'),
            'id' => 'age',
        ),
    );


    $data['mydata']['gender'] = array(
        'title' => t('Gender'),
        'field' => array(
            'title' => t('Gender'),
            'help' => t('Just a gender for My Data.'),
            'id' => 'gender',
        ),
    );


    $data['mydata']['website'] = array(
        'title' => t('Website'),
        'field' => array(
            'title' => t('Website'),
            'help' => t('Just a website for My Data.'),
            'id' => 'website',
        ),
    );

    return $data;
}

?>