<?php

namespace App\model;

class Auth {
    public static function checkAccess($requiredRole) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $requiredRole) {
            header("Location: /login.php");
            exit();
        }
    }

    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}
