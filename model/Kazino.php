<?php

class Kazinomodel {

function getAllKazina(){

    global $db;

    $sql = ' SELECT * FROM kazina ';

    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
    
}

function getKazino($id){
    
        global $db;

        $sql = " 
            SELECT * FROM kazina WHERE id = $id
        ";
        $query = $db->prepare($sql);
        $query->execute();
        $result [] = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
}

function delete($id){
    global $db;
    if($id){
        $sql = "
            DELETE FROM kazina
            WHERE id = :id
    ";

    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    
    return $query->execute();

    }else{
        return false;
    }
    
}

function updateKazina($post){
    global $db;
    if(!empty($post)){

    $sql = '
    UPDATE kazina
    SET image = :image,
        name = :name,
        content = :content,
        bonuses_text = :bonuses_text,
        bullet_points = :bullet_points,
        casino_number = :casino_number
    WHERE id = :id
   
    ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $post['id'], PDO::PARAM_INT);
    $query->bindValue(':image', $post['image'], PDO::PARAM_STR);
    $query->bindValue(':name', $post['name'], PDO::PARAM_STR);
    $query->bindValue(':content', $post['content'], PDO::PARAM_STR);
    $query->bindValue(':bonuses_text', $post['bonuses_text'], PDO::PARAM_STR);
    $query->bindValue(':bullet_points', $post['bullet_points'], PDO::PARAM_STR);
    $query->bindValue(':casino_number', $post['casino_number'], PDO::PARAM_INT);

    return $query->execute();
        
    }else{
        return false;
    }   

}

function createNewKazino($post){
    global $db;
    if( !empty($post['name']) &&
    !empty($post['content']) &&
    !empty($post['bonuses_text']) &&
    !empty($post['bullet_points']) &&
    !empty($post['casino_number'])
    ){
        
        
        $image = rand() . $_FILES['image']['name'];
        $temp_filename =$_FILES['image']['tmp_name'];
       
        $target_dir = "../uploads/ . $image";
       
        //$root_dir_for_images = 'php1/uploads/';
        
        
        $sql = '
            INSERT INTO kazina ( image, name, content, bonuses_text, bullet_points, casino_number)
            VALUES ( :image, :name, :content, :bonuses_text, :bullet_points, :casino_number )
        ';
        
        $query = $db->prepare($sql);
       // $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':image', $target_dir, PDO::PARAM_STR);
        $query->bindValue(':name', $post['name'], PDO::PARAM_STR);
        $query->bindValue(':content', $post['content'], PDO::PARAM_STR);
        $query->bindValue(':bonuses_text', $post['bonuses_text'], PDO::PARAM_STR);
        $query->bindValue(':bullet_points', $post['bullet_points'], PDO::PARAM_STR);
        $query->bindValue(':casino_number', $post['casino_number'], PDO::PARAM_INT);

       
       
        if(!file_exists('../uploads')){
            mkdir('../uploads');
            }
        if (move_uploaded_file($temp_filename, $target_dir)) { 
           
            echo "Image uploaded successfully";
        }else{
            echo "Failed to upload image";
        }


        return $query->execute(); 
} else {
    return false;
}
    

}
function insertSelectedData($post){
    global $db;
    if(isset($post['save'])){
        $sql = "
        INSERT INTO priorities ( kazina_id )
        VALUES ( :id )
        ";

        $query = $db->prepare($sql);
        
        $query->bindValue(':id', $post['id'], PDO::PARAM_INT);

        return $query->execute();
    }else{
        return false;
    }

}

function getSelectedData(){
    global $db;

    $sql = " SELECT k.* , p.*
            FROM priorities p 
            JOIN kazina k 
            ON k.id = p.kazina_id  ";

    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;

}

function getPrioritiesKazina(){
    global $db;

    $sql = " SELECT * FROM kazina 
    ORDER BY casino_number ASC
    LIMIT 5

    ";
        
     $query = $db->query($sql);
     $result = $query->fetchAll(PDO::FETCH_ASSOC);
     
     return $result;
}

}