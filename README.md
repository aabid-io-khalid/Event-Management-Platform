# D-veloppement-d-un-Clone-d-Eventbrite-en-PHP-MVC-PostgreSQL

## Project Overview
This project aims to develop an advanced event management platform inspired by Eventbrite. The platform will allow event organizers to create, manage, and promote events while enabling participants to book tickets online. The system will be built using PHP MVC with PostgreSQL and will integrate AJAX for dynamic interactions.

## Objectives
- Enable organizers to publish and manage events.
- Allow participants to book tickets online securely.
- Provide administrators with a back-office to manage users and events.
- Offer advanced analytics for event tracking and sales monitoring.

## Core Features

### User Management
- Secure user registration and login (hashed passwords using bcrypt).
- Role management: Organizer, Participant, Admin.
- User profile with avatar, name, and event history.
- Notification system (email and on-site alerts).

### Event Management
- Create and edit events (title, description, date, location, price, capacity).
- Categorization and tagging (Conference, Concert, Sports, etc.).
- Add promotional images and videos.
- Admin validation for event approval.
- Featured event system for sponsored events.

### Booking and Payment
- Ticket purchase with different options (free, paid, VIP, early bird).
- Secure payments via Stripe or PayPal (sandbox mode).
- QR code generation for ticket validation.
- Refund and ticket cancellation system.
- PDF ticket download after purchase.

### Organizer Dashboard
- List of created events with status (active, pending, completed).
- Real-time statistics on sales and reservations.
- Export participant list in CSV/PDF format.
- Manage promotions and discount codes.

### Admin Back-office
- User management (ban, delete, modify roles).
- Event management (validate, delete, modify).
- Global statistics (users, tickets sold, revenue).
- Comment moderation and report handling.

### Dynamic Interactions with AJAX
- Dynamic event loading (pagination without page reload).
- Advanced search and filters (category, price, date, location).
- Autocomplete search suggestions.
- Real-time form validation (email uniqueness, password security).

## Tech Stack

### Backend (PHP MVC & PostgreSQL)
- PHP 8.x - Backend development.
- PostgreSQL - Optimized relational database.
- PDO - Secure SQL queries (prepared statements).
- Twig - Template engine for structuring views.
- Composer - PHP dependency manager.

### Frontend (AJAX & UI/UX)
- HTML5, CSS3, JavaScript (ES6) - UI development.
- Bootstrap 5 or TailwindCSS - Responsive design.
- AJAX (Fetch API & jQuery) - Dynamic interactions.

### Security and Tools
- .htaccess - URL security and rewriting.
- Session-Based Authentication - Secure user sessions.
- Validator & Security Classes - XSS, CSRF, SQL Injection protection.
- Secure session management (Session Class).

## Business Logic

### Role and Permissions Management
- Participants can only book public events.
- Organizers can manage only their own events.
- Admins have full control (validation, moderation).

### Booking System
- Seat availability verification before booking.
- Email confirmation with ticket attachment after purchase.
- Cancellation policies (partial or full refund options).

### Advanced Security
- CSRF and SQL injection protection.
- Passwords hashed with bcrypt.
- Secure session management.

### Performance Optimization
- PostgreSQL query optimization with indexes and partitions.
- Lazy loading of events using AJAX.
