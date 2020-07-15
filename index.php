<?php
//print_r($_GET);

$default = [
    'controller'=>'kazino',
    'method'=>'getAllKazina',
    'id'=>''
];


$params = isset($_GET['parameters']) ?
          explode("/", $_GET['parameters']) :
          [];


if(isset($params[0]) && $params[0] === 'api'){
    require_once('api/index.php');
    $api = new APIController;
    
    $method = $params[1];

    require('includes/globals.php');
    //require('includes/general_functions.php');

    if(method_exists($api, $method)){
        $api->$method($params);
    }

    die;
}          

switch(count($params)){
    case 0:
        $controller = $default['controller'];
        $method = $default['method'] ;
        $id = $default['id'];
        
        break;
    case 1:
        $controller = $params[0];
        $method = $default['method'] ;
        $id = $default['id'];

       break;  
    case 2:
        $controller = $params[0];
        $method = $params[1];
        $id = $default['id'];
       break;    
    case 3:
       $controller = $params[0];
       $method = $params[1];
       $id = $params[2];
        break;
}          


$filename_controller = 'controller/'. ucfirst($controller).'.php';
$filename_model = 'model/'. ucfirst($controller).'.php';

if(file_exists($filename_controller) && file_exists($filename_model)){
    require($filename_controller);
    require($filename_model);
    require('includes/globals.php');
    $object = new $controller;

    if(method_exists($object, $method)){
    $object->$method($id);

    }
    else{
        echo 'metodot ne postoi';
    }

}else{
    echo 'controllerot i methodot ne postojat';
}
