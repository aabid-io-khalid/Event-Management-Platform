<?php
namespace App\models;

use App\core\CRUD;


require_once dirname(__DIR__) . '../../vendor/autoload.php'; 


class Tag {

    private string $name;

public static function getAllTags(){
    $tags =CRUD::select('tag');
    return $tags;

}
public static function getTag($id){
    $tags =CRUD::select('tag', '*', 'id = ?', [$id]);
    return $tags;

}
public static function getCountTags(){
    $tags =CRUD::select('tag','count(*) as count');
    return $tags[0]['count'];  
   
}

public  function addTag(){
    if (isset($_POST['name'])) {

        $tags = explode(',', $_POST['name']);
        foreach($tags as $tag) {

        $this->name =$tag;
        $tagData = [
            'nom' => $this->name,
        ];
        CRUD::insert('tag', $tagData);
    }
}
}

public  function updateTag(){
    if (isset($_POST['name'])) {
        
        $this->name = $_POST['name'];
        $tag = [
            'nom' => $this->name,
        ];
        CRUD::update('tag', $tag,'id=?',[$_POST['id']]);
    }
}
public  function deleteTag(){
    if (isset($_GET['id'])) {
        
        CRUD::delete('tag','id=?',[$_GET['id']]);
    }
}

}


?>



