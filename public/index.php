<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\PageController;
use App\Controllers\PageControllerBackend;
use App\Controllers\AuthController;
use App\Controllers\PaymentController;
use App\Middleware\AuthMiddleware;

session_start();

$router = new Router();

// Frontend Routes
$router->get('/', PageController::class, 'home');
$router->get('/home', PageController::class, 'home');
$router->get('/about', PageController::class, 'about');
$router->get('/pricing', PageController::class, 'pricing');
$router->get('/faq', PageController::class, 'faq');
$router->get('/contact', PageController::class, 'contact');
$router->get('/gallery', PageController::class, 'gallery');
$router->get('/news-single', PageController::class, 'newsSingle');
$router->get('/venue', PageController::class, 'venue');
$router->get('/schedule', PageController::class, 'schedule');
$router->get('/blog', PageController::class, 'blog');
$router->get('/speakers', PageController::class, 'speakers');
$router->get('/login', PageController::class, 'login');
$router->post('/login', PageController::class, 'login'); 
$router->get('/register', PageController::class, 'register');
$router->post('/register', PageController::class, 'register');
$router->get('/404', PageController::class, 'notFound');

// Login/Logout Routes
// $router->get('/login', AuthController::class, 'login');
// $router->post('/login', AuthController::class, 'processLogin');
// $router->post('/register', AuthController::class, 'processRegister');
// $router->get('/logout', AuthController::class, 'logout');

// Admin Routes - Apply Middleware


$router->before('/admin/.*', function () {
    AuthMiddleware::checkAdmin();
});
$router->before('/organisateur/.*', function () {
    AuthMiddleware::checkOrganisateur();
});
$router->before('/pricing', function () {
    AuthMiddleware::checkAuth();
});


// Admin routes

$router->get('/admin/home', PageControllerBackend::class, 'adminHome');
$router->get('/admin/organisateur', PageControllerBackend::class, 'adminOrganisateur');
$router->get('/admin/Events', PageControllerBackend::class, 'adminEvents'); 
$router->get('/admin/tag', PageControllerBackend::class, 'adminTag'); 
$router->get('/admin/profile', PageControllerBackend::class, 'adminProfile');
$router->get('/admin/gestionUtilisateurs', PageControllerBackend::class, 'adminGestionUtilisateurs'); 
$router->get('/admin/organisateurProfile', PageControllerBackend::class, 'adminOrganisateurProfile'); 
$router->get('/admin/updateProfil', PageControllerBackend::class, 'adminUpdateProfil');
$router->get('/admin/category', PageControllerBackend::class, 'adminCategory'); 
$router->post('/admin/category', PageControllerBackend::class, 'adminCategory'); 
$router->post('/admin/tag', PageControllerBackend::class, 'adminTag'); 


// New Routes for Organisateur
$router->get('/organisateur/about', PageControllerBackend::class, 'organisateurAbout');
$router->get('/organisateur/contact', PageControllerBackend::class, 'organisateurContact');
$router->get('/organisateur/eventInformation', PageControllerBackend::class, 'organisateurEventInformation');
$router->get('/organisateur/gestionUtilisateurs', PageControllerBackend::class, 'organisateurGestionUtilisateurs');
$router->get('/organisateur/home', PageControllerBackend::class, 'organisateurHome');
$router->post('/organisateur/home', PageControllerBackend::class, 'organisateurHome');
$router->get('/organisateur/myEvents', PageControllerBackend::class, 'organisateurMyEvents');
$router->post('/organisateur/myEvents', PageControllerBackend::class, 'organisateurMyEvents');
$router->get('/organisateur/profile', PageControllerBackend::class, 'organisateurProfile');
$router->get('/organisateur/update', PageControllerBackend::class, 'organisateurUpdate');
$router->get('/organisateur/users', PageControllerBackend::class, 'organisateurUsers');
$router->get('/organisateur/participent', PageControllerBackend::class, 'organisateurParticipent');
$router->get('/organisateur/ticketDetailles', PageControllerBackend::class, 'organisateurTicketDetailles');


// 
$router->get('/checkout', PaymentController::class, 'checkout');
$router->post('/stripe-webhook', PaymentController::class, 'handleWebhook');

// Dispatch all routes
$router->dispatch();
