<?php
use App\core\CRUD;

trait RegisterTrait {
    public function register($email, $password, $role) {
      

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
            'password'=>$hashedPassword,
        ]
        CRUD::insert('utilisateur', $user);
        echo ucfirst($role) . " with email $email registered successfully.\n";
        return true;
    }
}
