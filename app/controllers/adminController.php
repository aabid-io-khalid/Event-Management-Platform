<?php

namespace App;

use App\core\CRUD;
use App\Models\User;
use App\Models\Evenement;
use App\Models\Statistiques;

class AdminController {
    // Display the admin dashboard
    public function dashboard() {
        // Fetch statistics
        $statsModel = new Statistiques();
        $statistics = $statsModel->getStatistics();

        // Load the admin dashboard view
        include '../views/admin/dashboard.php';
    }

    // Manage users
    public function manageUsers() {
        $userModel = new Utilisateur();
        $users = $userModel->getAllUsers();

        // Load the manage users view
        include '../views/admin/manage_users.php';
    }

    // Ban a user
    public function banUser ($userId) {
        $userModel = new Utilisateur();
        $userModel->banUser ($userId);
        header("Location: /admin/manage_users.php");
    }

    // Unban a user
    public function unbanUser ($userId) {
        $userModel = new Utilisateur();
        $userModel->unbanUser ($userId);
        header("Location: /admin/manage_users.php");
    }

    // Manage events
    public function manageEvents() {
        $eventModel = new Evenement();
        $events = $eventModel->getAllEvents();

        // Load the manage events view
        include '../views/admin/manage_events.php';
    }

    // Approve an event
    public function approveEvent($eventId) {
        $eventModel = new Evenement();
        $eventModel->approveEvent($eventId);
        header("Location: /admin/manage_events.php");
    }

    // Reject an event
    public function rejectEvent($eventId) {
        $eventModel = new Evenement();
        $eventModel->rejectEvent($eventId);
        header("Location: /admin/manage_events.php");
    }

    // View statistics
    public function viewStatistics() {
        $statsModel = new Statistiques();
        $statistics = $statsModel->getStatistics();

        // Load the statistics view
        include '../views/admin/statistics.php';
    }
}
?>