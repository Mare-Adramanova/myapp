<?php

class ApiController {
    function getAllKazina($params){

        require_once('model/Kazino.php');
        $kazinomodel = new Kazinomodel;
        $kazina = $kazinomodel->getPrioritiesKazina();

        echo json_encode($kazina);
       

    }

}