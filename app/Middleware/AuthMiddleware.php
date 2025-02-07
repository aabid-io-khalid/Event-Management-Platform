<?php
namespace App\Middleware;

class AuthMiddleware {
    public static function checkAdmin() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== "Admin") {
            header("Location: ../login");
            exit();
        }
    }
    public static function checkOrganisateur() {
        if (!isset($_SESSION['role']) || ($_SESSION['role'] !== "Organisateur" && !isset($_GET['action'])) ) {
            header("Location: ../login");
            exit();
        }
    }
    public static function checkAuth() {
      
        if (!isset($_SESSION['role']) ) {
            header("Location: login");
            exit();
        }
    }
}
