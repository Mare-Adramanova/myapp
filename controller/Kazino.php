<?php

class Kazino {

    function getAllKazina(){

        $kazinomodel = new Kazinomodel;
        $kazino = $kazinomodel->getAllKazina();

        include('view/kazino/Kazino.php');
    }

    function getKazino($id){
        if($id){

            $kazinomodel = new Kazinomodel;
            $kazino = $kazinomodel->getKazino($id);

            include('view/kazino/Kazino.php');
        }else{
            $this->getAllKazina();
        }
        
    }

    function delete($id){

        $kazinomodel = new Kazinomodel;
        $kazino = $kazinomodel->delete($id);

        header('Location: ' . ROOT_URL);

    }
    function edit($id){
        $kazinomodel = new Kazinomodel;
        $kazina = $kazinomodel->getAllKazina();

        $kazino = $kazinomodel->getKazino($id)[0];

        $update_url = ROOT_URL .'kazino/update/';

        include('view/kazino/edit.php');

    }

    function update(){
        $kazinomodel = new Kazinomodel;
        $result = $kazinomodel->updateKazina($_POST);

        header('Location: ' . ROOT_URL);

    }
    function create(){
        $insert_url = ROOT_URL . 'kazino/insert/';
        include('view/kazino/create.php');
    }

    function insert(){
        $kazinomodel = new Kazinomodel;
        $result = $kazinomodel->createNewKazino($_POST);
        
        header('Location: ' . ROOT_URL);
    }

    function select(){
        $kazinomodel = new Kazinomodel;
        $result = $kazinomodel->getAllKazina();
        $insert_url = ROOT_URL . 'kazino/insertSelectedData/';
        include('view/kazino/select.php');
    }

    function insertSelectedData(){
        $kazinomodel = new Kazinomodel;
        $kazino = $kazinomodel->insertSelectedData($_POST);

    }

    function getSelectedData(){
        
    }


}