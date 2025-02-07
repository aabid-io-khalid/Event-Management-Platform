<?php

require_once 'User.php';
require_once 'Database.php';
require_once 'LoginLogoutTrait.php';
require_once 'RegisterTrait.php';
require_once 'RoleRedirectTrait.php';
require_once 'CRUD.php';

class Participant extends User {
    use LoginLogoutTrait, RegisterTrait, RoleRedirectTrait;

    private $events = [];

    public function __construct($id, $email, $name, $role_id = 3) { // Assuming 3 is the Participant role
        parent::__construct($id, $email, $name, $role_id);
    }

    // Enroll in an event (instead of a course)
    public function enrollInEvent($eventId) {
        // Check if already enrolled
        $existing = CRUD::select('Inscription', '*', 'participant_id = ? AND evenement_id = ?', [$this->id, $eventId]);
        if (!empty($existing)) {
            return "You are already registered for this event!";
        }

        // Insert into Inscription table
        return CRUD::insert('Inscription', ['participant_id' => $this->id, 'evenement_id' => $eventId])
            ? "Successfully registered for the event!"
            : "Failed to register.";
    }

    // View events the participant is enrolled in
    public function viewMyEvents() {
        return CRUD::select(
            'Evenement e JOIN Inscription i ON e.id = i.evenement_id',
            'e.id, e.titre, e.description, e.date, e.lieu',
            'i.participant_id = ?',
            [$this->id]
        );
    }
}
