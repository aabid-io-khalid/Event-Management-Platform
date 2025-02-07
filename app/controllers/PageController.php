<?php

namespace App\Controllers;

class PageController {
    public function home() {
        require_once '../app/models/User.php';
        $user = new \App\Models\Utilisateur();
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action']== "changeRoleToParticipant") {
           
            $user->changeRoleToParticipant($_SESSION['user_id']);
            $_SESSION['role']="Participant";
            require_once __DIR__ . "/../views/front-office/home.php"; 

        }else{
        require_once __DIR__ . "/../views/front-office/home.php"; 
        }
    }

    public function about() {
        require_once __DIR__ . "/../views/front-office/about.php";
    }

    public function pricing() {
        require_once '../app/models/Evenement.php';
        $EventsModel = new \App\Models\Evenement();
        $event = $EventsModel->getEventById($_GET["id"]);
        require_once __DIR__ . "/../views/front-office/pricing.php";
    }

    public function faq() {
        require_once __DIR__ . "/../views/front-office/faq.php";
    }

    public function contact() {
        require_once __DIR__ . "/../views/front-office/contact.php";
    }

    public function gallery() {
        require_once __DIR__ . "/../views/front-office/gallery.php";
    }

    public function newsSingle() {
        require_once __DIR__ . "/../views/front-office/news-single.php";
    }

    public function venue() {
        require_once __DIR__ . "/../views/front-office/venue.php";
    }

    public function schedule() {
        require_once __DIR__ . "/../views/front-office/schedule.php";
    }

    public function blog() {
        require_once '../app/models/Evenement.php';
        $organisateurModel = new \App\Models\Evenement();
        $events = $organisateurModel->getAllEvents();
        require_once __DIR__ . "/../views/front-office/blog.php";
    }

    public function speakers() {
        require_once __DIR__ . "/../views/front-office/speakers.php";
    }

    public function notFound() {
        require_once __DIR__ . "/../views/front-office/404.php";
    }

    public function login() { 
        require_once '../app/models/User.php';
        $user = new \App\Models\Utilisateur();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $user->login($_POST['email'], $_POST['password']);
           

        }else{
        $user->logout();
        require_once __DIR__ . "/../views/front-office/login.php"; // Load the login view
    }}

    public function register() {
            require_once '../app/models/User.php';
            $user = new \App\Models\Utilisateur();
            $user->logout();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           

            // Validate the input data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $phone = $_POST['phone'];

            // Check if passwords match
            if ($password !== $confirmPassword) {
                // Handle error: passwords do not match
                echo 'Passwords do not match.';
                return;
            }

            // Call the register method
            $user->register($username, $email, $password, $phone); // Make sure to pass phone if needed

            // Redirect or show success message
            header('Location: login'); // Redirect to login page after successful registration
            exit;
        }

            
        require_once __DIR__ . "/../views/front-office/register.php"; // Load the registration view
    }
}
