<?php

namespace App\models;

use App\core\CRUD;
use App\models\User;
require_once dirname(__DIR__) . '../../vendor/autoload.php'; 
require_once __DIR__ . '/User.php';
require_once 'HasLogin.php';
require_once 'HasLogout.php';

class Admin extends Utilisateur {
    use LoginTrait;
    use LogoutTrait;

    

    // Add a user
    public function addUser($userDetails) {
        try {
            $userDetails['motDePasse'] = password_hash($userDetails['motDePasse'], PASSWORD_DEFAULT);
            return CRUD::insert('Utilisateur', $userDetails) ? "User added successfully." : "Failed to add user.";
        } catch (\PDOException $e) {
            return "Error adding user: " . $e->getMessage();
        }
    }

    // Remove a user
    public function removeUser($userId) {
        try {
            return CRUD::delete('Utilisateur', 'id = ?', [$userId]) ? "User removed successfully." : "Failed to remove user.";
        } catch (\PDOException $e) {
            return "Error removing user: " . $e->getMessage();
        }
    }

    // Manage event status
    public function manageEvents($eventId, $action) {
        try {
            $status = match ($action) {
                'Approve' => 'approved',
                'Reject' => 'rejected',
                default => null,
            };

            if ($status) {
                return CRUD::update('Evenement', ['statut' => $status], 'id = ?', [$eventId]) ? 
                    "Event with ID: $eventId updated to '$status'." : 
                    "Failed to update event.";
            } elseif ($action === 'Delete') {
                return CRUD::delete('Evenement', 'id = ?', [$eventId]) ? "Event deleted successfully." : "Failed to delete event.";
            }

            return "Invalid action. Use 'Approve', 'Reject', or 'Delete'.";
        } catch (\PDOException $e) {
            return "Error managing event: " . $e->getMessage();
        }
    }

    // List all users
    public function listUsers() {
        return CRUD::select('Utilisateur join role on role.id=Utilisateur.role_id','Utilisateur.* , role.nom as role');
    }

    // List all events
    public function listEvents() {
        return CRUD::select('Evenement');
    }

    public function listNonActiveOrganisateur() {
        return CRUD::select('Utilisateur join role on role.id=Utilisateur.role_id','Utilisateur.* , role.id as role','is_active=? ',[0]);
    }

    public function listNonAccepteEvent() {
        return CRUD::select('Evenement join utilisateur on user_id=utilisateur.id ','Evenement.* , utilisateur.nom as organisateur','is_verified=? ',[0]);
    }

    public function getStatistics() {
        $nombreUtilisateurs = CRUD::select('Utilisateur', 'COUNT(*) AS count','is_active=?',[1])[0]['count'];
        $nombreEvenements = CRUD::select('Evenement', 'COUNT(*) AS count','is_verified=?',[1])[0]['count'];
        $nombreOrganisateur = CRUD::select('Utilisateur', 'COUNT(*) AS count','role_id=? and is_active=?',[2,1])[0]['count'];

        return [
            'nombreUtilisateurs' => $nombreUtilisateurs,
            'nombreEvenements' => $nombreEvenements,
            'nombreOrganisateur' => $nombreOrganisateur
        ];
    }

      // Ban a user
      public function banUser ($userId) {
        return CRUD::update('Utilisateur', ['is_active' => 0], 'id = ?', [$userId]);
    }

    // Unban a user
    public function unbanUser ($userId) {
        return CRUD::update('Utilisateur', ['is_active' => 1], 'id = ?', [$userId]);
    }

    public function approveEvent($eventId) {
        return CRUD::update('Evenement', ['is_verified' => 1], 'id = ?', [$eventId]);
    }

    // Reject an event
    public function rejectEvent($eventId) {
        return CRUD::delete('Evenement', 'id = ?', [$eventId]);
    }
}
