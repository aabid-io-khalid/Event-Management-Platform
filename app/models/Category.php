<?php
namespace App\models;

use App\core\CRUD;

require_once dirname(__DIR__) . '../../vendor/autoload.php'; 


class Category {

    private string $name;
    

    public static function getAllCategories(){
        $categories =CRUD::select('categorie');
        return $categories;
    
    }
    public static function getCountCategories(){
        $categories =CRUD::select('categorie','count(*) as count');
        
            return $categories[0]['count'];
            
    }

    public static function getCategorie($id){
        $categories =CRUD::select('categorie', '*', 'id = ?', [$id]);;
        return $categories;
    
    }
    public function addCategorie(){
        if (isset($_POST['name'])) {
            $this->name = $_POST['name'];
            $category = [
                'nom' => $this->name,
            ];
            CRUD::insert('categorie', $category);
        }
    }
    public  function updateCategorie(){
        if (isset($_POST['name'])) {
            $this->name = $_POST['name'];
            $category = [
                'nom' => $this->name,
            ];
            CRUD::update('categorie', $category,'id=?',[$_GET['id']]);
        }
    }
    public function deleteCategorie(){
        if (isset($_GET['id'])) {

            CRUD::delete('cours','category_id=?',[$_GET['id']]);
            CRUD::delete('categorie','id=?',[$_GET['id']]);
           
        }
    }

   
}



?>

