<?php

namespace App\models;

use App\core\CRUD;
require_once dirname(__DIR__) . '../../vendor/autoload.php'; 

class Utilisateur {
    // Get all users
    public function getAllUsers() {
        return CRUD::select('Utilisateur');
    }

  

    public function changeRoleToOrganisateur ($id) {

        return CRUD::update('Utilisateur', ['role_id' => 2], 'id = ?', [$id]);
    }

    public function changeRoleToParticipant ($id) {

        return CRUD::update('Utilisateur', ['role_id' => 3], 'id = ?', [$id]);
    }
    
    public function register($nom,$email, $password) {
      

        // Check if the email already exists in the database
        
        $user = CRUD::select('utilisateur', '*', 'email = ?', [$email]);

        if ($user) {
            echo "Email is already taken.\n";
            return false;
        }

        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        $user=[
            'email'=>$email,
            'nom'=>$nom,
            'motDePasse'=>$hashedPassword,
            'role_id'=>3,
        ];
        CRUD::insert('utilisateur', $user);
        echo ucfirst($role) . " with email $email registered successfully.\n";
        return true;
    }

    public function login($email, $password) {

        $user =CRUD::select('utilisateur join role on role.id=role_id', 'utilisateur.* , role.nom as role', 'email = ?', [$email]);
        
        if ($user && password_verify($password, $user[0]['motDePasse'])) {
           
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['role'] = $user[0]['role'];
            $_SESSION['username'] = $user[0]['nom'];

            // Role redirection logic
            switch ($user[0]['role']) {
                case 'Admin':
                    header("Location: admin/home");
                    break;
                case 'Organisateur':
                    header("Location: organisateur/home");
                    break;
                case 'Participant':
                    header("Location: home");
                    exit;
            }

            return true;
        } else {
            echo "Invalid email or password!\n";
            return false;
        }
    }
    public function logout() {
        session_unset();
        session_destroy();

    }
}
?>