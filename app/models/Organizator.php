<?php
namespace App\models;

use App\core\CRUD;
use App\models\User;
require_once dirname(__DIR__) . '../../vendor/autoload.php'; 
require_once __DIR__ . '/User.php';

class Organizator extends Utilisateur {


    // Add an event (instead of a course)
    public function addEvent($titre, $description, $date, $lieu, $prix, $capacite, $categorie_id, $user_id, $tags = [], $image_url = null) {
        // Prepare event data array
        $eventData = [
            'titre' => $titre,
            'description' => $description,
            'date' => $date,
            'lieu' => $lieu,
            'prix' => $prix,
            'capacite' => $capacite,
            'statut' => 'pending', // Default status
            'is_verified' => 0, // Default value as integer
            'categorie_id' => $categorie_id,
            'user_id' => $user_id, // Changed from 'utilisateur_id' to 'user_id'
            'image_url' => $image_url // Optional field
        ];

        CRUD::insert('Evenement', $eventData) ;
        $eventId = CRUD::select('Evenement ORDER BY id DESC LIMIT 1', 'id')[0]["id"];

        if ($eventId) {
            foreach ($tags as $tagId) {
                CRUD::insert('Evenement_Tag', ['evenement_id' => $eventId, 'tag_id' => $tagId]);
            }
            return "Event added successfully!";
        }
        return "Failed to add event.";
    }

    // Get all events created by this Organizator
    public function listMyEvents() {
        return CRUD::select('Evenement e JOIN Utilisateur u  ON u.id = e.user_id', 'e.* ,u.nom ', 'e.user_id = ?', [$_SESSION['user_id']]);
    }

    public function listMyEventsParticipant() {
        return CRUD::select('Evenement_Participant ep 
         JOIN Utilisateur u ON ep.user_id = u.id 
         JOIN Evenement e ON ep.evenement_id = e.id', 
        'e.id AS event_id, e.titre, u.id AS user_id, u.nom, u.email', 
        'e.user_id = ?', 
        [$_SESSION['user_id']]);
    }

    // Edit an event
    public function editEvent($eventId, $titre, $description, $date, $lieu, $prix) {
        // Prepare event data array
        $eventData = [
            'titre' => $titre,
            'description' => $description,
            'date' => $date,
            'lieu' => $lieu,
            'prix' => $prix,
            
            
        ];
    
        // Update the event record
        $updated = CRUD::update('Evenement', $eventData, 'id = ?', [$eventId]);
    
        if ($updated) {
            // Remove existing tags related to this event
            CRUD::delete('Evenement_Tag', 'evenement_id = ?', [$eventId]);
    
    
            return "Event updated successfully!";
        }
    
        return "Failed to update event.";
    }
    

    // Delete an event
    public function deleteEvent($eventId) {
        CRUD::delete('Evenement_Tag', 'evenement_id = ?', [$eventId]);
        return CRUD::delete('Evenement', 'id = ? ', [$eventId]) ? "Event deleted successfully!" : "Failed to delete event.";
    }

    public function getStatistics() {
        $Statistics = CRUD::select(' Utilisateur u
        LEFT JOIN Evenement e ON u.id = e.user_id
        LEFT JOIN Evenement_Participant ep ON e.id = ep.evenement_id',
        'u.id AS user_id,u.nom AS user_name,
        COUNT(DISTINCT e.id) AS total_events,
        COUNT(DISTINCT ep.user_id) AS total_participants',
        ' u.id = ? GROUP BY u.id, u.nom ;',[$_SESSION['user_id']])[0];

            return $Statistics;
    }

}
