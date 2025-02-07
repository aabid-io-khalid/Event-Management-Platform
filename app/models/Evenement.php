<?php

namespace App\models;

use App\core\CRUD;

require_once dirname(__DIR__) . '../../vendor/autoload.php'; 



class Evenement {
    // Get all events
    public function getAllEvents() {
    

        return CRUD::select(" Evenement e
        LEFT JOIN 
            Categorie c ON e.categorie_id = c.id
        LEFT JOIN 
            Evenement_Tag et ON e.id = et.evenement_id
        LEFT JOIN 
            Tag t ON et.tag_id = t.id
        LEFT JOIN 
            utilisateur u ON e.user_id = u.id
        LEFT JOIN 
            Evenement_Sponsor es ON e.id = es.evenement_id
        LEFT JOIN 
            Sponsor s ON es.sponsor_id = s.id     
        GROUP BY 
            e.id",
            "e.*,u.nom as auteur, 
            c.nom AS categorie_nom,
            GROUP_CONCAT(t.nom) AS tags,
            GROUP_CONCAT(s.nom) AS sponsors");
    }

    // Get a single event by ID with related data
    public function getEventById($eventId) {

        $events = CRUD::select("Evenement", '*', 'id = ?', [$eventId]);
        return !empty($events) ? $events[0] : null;
    }

    // Create a new event
    public function createEvent($data) {
        return CRUD::insert('Evenement', $data);
    }

    // Update an existing event
    public function updateEvent($eventId, $data) {
        return CRUD::update('Evenement', $data, 'id = ?', [$eventId]);
    }

    // Delete an event
    public function deleteEvent($eventId) {
        return CRUD::delete('Evenement', 'id = ?', [$eventId]);
    }

   
}
?>