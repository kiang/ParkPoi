<?php

App::uses('AppModel', 'Model');

class Park extends AppModel {

    public $name = 'Park';
    public $validate = array();
    public $hasMany = array(
        'Issue' => array(
            'foreignKey' => 'park_id',
            'dependent' => true,
            'className' => 'Issue',
        ),
    );

}
