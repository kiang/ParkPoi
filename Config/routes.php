<?php

Router::connect('/', array('admin' => false, 'controller' => 'parks', 'action' => 'map'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
