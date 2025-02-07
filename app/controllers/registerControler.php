<?php
use App\Controllers\AuthController;
use App\core\CRUD;
use App\models\Utilisateur;


$user = new Utilisateur();

$user->register($_POST['username'],$_POST['email'],$_POST['password']);

