<?php
namespace App\models;

trait LoginTrait {
    public function login($email, $password) {

        $user =CRUD::select('users', '*', 'email = ?', [$email]);

        if ($user && password_verify($password, $user['password'])) {
            if ($user['role'] !== $this->role) {
                echo "Unauthorized access for this role.\n";
                return false;
            }
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            echo ucfirst($this->role) . " with email $email logged in successfully.\n";

            // Role redirection logic
            switch ($this->role) {
                case 'Admin':
                    header("Location: admin_dashboard.php");
                    break;
                case 'Teacher':
                    header("Location: teacher_page.php");
                    break;
                case 'Student':
                    header("Location: student_page.php");
                    break;
                default:
                    echo "Invalid role!";
                    exit;
            }

            return true;
        } else {
            echo "Invalid email or password!\n";
            return false;
        }
    }
}