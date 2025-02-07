<?php

namespace App\Controllers;

class PageControllerBackend {
   
    // Admin Pages
    public function adminCategory() {
        require_once '../app/models/Category.php';
        $CategorieModel = new \App\Models\Category();

        if (isset($_GET['action']) && $_GET['action']== "add") {
            
            $CategorieModel->addCategorie();
            
        }elseif (isset($_GET['action']) && $_GET['action']== "update") {
            
            $CategorieModel->updateCategorie();
            
        }elseif (isset($_GET['action']) && $_GET['action']== "delete") {
            
            $CategorieModel->deleteCategorie();
            
        }
        $categories = $CategorieModel->getAllCategories();
        require_once __DIR__ . "/../views/back-office/admin/category.php";
    }

    public function adminEvents() {
        require_once '../app/models/Evenement.php';
        $EventsModel = new \App\Models\Evenement();
        $events = $EventsModel->getAllEvents();
        require_once __DIR__ . "/../views/back-office/admin/events.php";
    }


    public function adminGestionUtilisateurs() {
        require_once __DIR__ . "/../views/back-office/admin/gestionUtilisateurs.php";
    }


    public function adminHome() {
        require_once '../app/models/Adminstarotor.php';
        $adminModel = new \App\Models\Admin();

        if (isset($_GET['action']) && $_GET['action']== "banUser") {
            
            $adminModel->banUser($_GET['id']);
            
        }elseif (isset($_GET['action']) && $_GET['action']== "unbanUser") {
            
            $adminModel->unbanUser($_GET['id']);
            
        }elseif (isset($_GET['action']) && $_GET['action']== "approveEvent") {
            
            $adminModel->approveEvent($_GET['id']);
            
        }elseif (isset($_GET['action']) && $_GET['action']== "rejectEvent") {
            
            $adminModel->rejectEvent($_GET['id']);
            
        }

        $users = $adminModel->listNonActiveOrganisateur();
        $events = $adminModel->listNonAccepteEvent();
        $statistique = $adminModel->getStatistics();
        require_once __DIR__ . "/../views/back-office/admin/home.php";
    }

    public function adminOrganisateurProfile() {
        require_once __DIR__ . "/../views/back-office/admin/organisateur_profile.php";
    }

    public function adminOrganisateur() {
        require_once '../app/models/Adminstarotor.php';
        $adminModel = new \App\Models\Admin();
        $users = $adminModel->listUsers();
        require_once __DIR__ . "/../views/back-office/admin/organisateur.php";
    }

    public function adminProfile() {
        require_once __DIR__ . "/../views/back-office/admin/profile.php";
    }

    public function adminTag() {
        require_once '../app/models/Tag.php';
        $tagModel = new \App\Models\Tag();

        if (isset($_GET['action']) && $_GET['action']== "add") {
            
            $tagModel->addTag();
            
        }elseif (isset($_GET['action']) && $_GET['action']== "update") {
            
            $tagModel->updateTag();
            
        }elseif (isset($_GET['action']) && $_GET['action']== "delete") {
            
            $tagModel->deleteTag();
            
        }
        strtok($_SERVER["REQUEST_URI"], '?');
        $tags = $tagModel->getAllTags();
        require_once __DIR__ . "/../views/back-office/admin/tag.php";
       
    }

    public function adminUpdateProfil() {
        require_once __DIR__ . "/../views/back-office/admin/updateProfil.php";
    }

    public function organisateurAbout() {
        require_once __DIR__ . "/../views/back-office/organisateur/about.php";
    }
    
    public function organisateurContact() {
        require_once __DIR__ . "/../views/back-office/organisateur/contact.php";
    }
    
    public function organisateurEventInformation() {
        require_once __DIR__ . "/../views/back-office/organisateur/eventInformation.php";
    }
    
    public function organisateurGestionUtilisateurs() {
        require_once __DIR__ . "/../views/back-office/organisateur/gestionUtilisateurs.php";
    }
    
    public function organisateurHome() {
        require_once '../app/models/User.php';
        require_once '../app/models/Organizator.php';
        $user = new \App\Models\Utilisateur();
        $organisateur = new \App\Models\Organizator();
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action']== "changeRoleToOrganisateur") {
           
            $user->changeRoleToOrganisateur($_SESSION['user_id']);
            $_SESSION['role']="Organisateur";
            

        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['event_title'] ?? null;
            $description = $_POST['event_description'] ?? null;
            $categorie_id = $_POST['event_category'] ?? null;
            $tags = $_POST['event_tags'] ?? [];
            $date = $_POST['event_date'] ?? null;
            $lieu = $_POST['event_location'] ?? null;
            $prix = $_POST['event_price'] ?? null;
            $capacity = $_POST['event_capacity'] ?? null;
            $image_url = $_POST['event_image'] ?? null;
            $user_id=$_SESSION["user_id"];
            $organisateur->addEvent($titre, $description, $date, $lieu, $prix, $capacity, $categorie_id, $user_id, $tags, $image_url);
            
        }
        require_once '../app/models/Tag.php';
        $tagModel = new \App\Models\Tag();
        $tags = $tagModel->getAllTags();
        require_once '../app/models/Category.php';
        $CategorieModel = new \App\Models\Category();
        $categories = $CategorieModel->getAllCategories();
        require_once '../app/models/Organizator.php';
        $organisateurModel = new \App\Models\Organizator();
        $statistique = $organisateurModel->getStatistics() ?? 0;
        

        require_once __DIR__ . "/../views/back-office/organisateur/home.php";
        
    }
    
    public function organisateurMyEvents() {
        require_once '../app/models/Organizator.php';
        $organisateurModel = new \App\Models\Organizator();

        if (isset($_GET['action']) && $_GET['action']== "update") {

            $eventId = $_POST['id'] ?? null;
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;
            $date = $_POST['date'] ?? null;
            $lieu = $_POST['location'] ?? null;
            $prix = $_POST['price'] ?? null;


            $organisateurModel->editEvent($eventId, $title, $description, $date, $lieu, $prix);
            
        }elseif (isset($_GET['action']) && $_GET['action']== "delete") {
            
            $organisateurModel->deleteEvent($_GET['id']);
            
        }

        $events = $organisateurModel->listMyEvents();
        require_once __DIR__ . "/../views/back-office/organisateur/myEvents.php";
    }
    
    public function organisateurProfile() {
        require_once __DIR__ . "/../views/back-office/organisateur/profile.php";
    }
    
    public function organisateurUpdate() {
        require_once __DIR__ . "/../views/back-office/organisateur/update.php";
    }
    
    public function organisateurUsers() {
        require_once __DIR__ . "/../views/back-office/organisateur/users.php";
    }
    public function organisateurParticipent() {
        require_once '../app/models/Organizator.php';
        $organisateurModel = new \App\Models\Organizator();
        $participants = $organisateurModel->listMyEventsParticipant();
        require_once __DIR__ . "/../views/back-office/organisateur/participent.php";
    }
    public function organisateurTicketDetailles() {
        require_once __DIR__ . "/../views/back-office/organisateur/ticketDetailles.php";
    }
}

