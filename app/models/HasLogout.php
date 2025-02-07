<?php
namespace App\models;

trait LogoutTrait {
    public function logout() {
        session_unset();
        session_destroy();

    }
}