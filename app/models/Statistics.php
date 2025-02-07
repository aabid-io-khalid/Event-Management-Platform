<?php

namespace App\models;

use App\core\CRUD;

class Statistiques {
    // Get statistics
    public function getStatistics() {
        $nombreUtilisateurs = CRUD::select('Utilisateur', 'COUNT(*) AS count')[0]['count'];
        $nombreEvenements = CRUD::select('Evenement', 'COUNT(*) AS count')[0]['count'];
        $nombreOrganisateur = CRUD::select('Utilisateur', 'COUNT(*) AS count','role_id=?',[2])[0]['count'];

        return [
            'nombreUtilisateurs' => $nombreUtilisateurs,
            'nombreEvenements' => $nombreEvenements,
            'revenusTotal' => $revenusTotal
        ];
    }
}
?>