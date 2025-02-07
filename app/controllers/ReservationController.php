<?php
require_once 'app/models/Reservation.php';
require_once 'app/models/Mailer.php';

class ReservationController {
    public function makeReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            if (!isset($_SESSION['user_email'])) {
                die("You must be logged in to make a reservation.");
            }

            $userEmail = $_SESSION['user_email']; 
            $userName = $_SESSION['user_name'];   
            $reservationDate = $_POST['date'];
            $reservationTime = $_POST['time'];

            $organizerEmail = "organizer-email@gmail.com";

            $reservationModel = new Reservation();
            $isSaved = $reservationModel->saveReservation($userEmail, $reservationDate, $reservationTime);

            if ($isSaved) {

                $mailer = new Mailer();
                $userSubject = "Reservation Confirmed!";
                $userMessage = "
                    <p>Dear <strong>$userName</strong>,</p>
                    <p>Your reservation has been successfully confirmed.</p>
                    <p><strong>Date:</strong> $reservationDate</p>
                    <p><strong>Time:</strong> $reservationTime</p>
                    <p>Thank you for choosing us!</p>
                ";
                $mailer->sendEmail($userEmail, $userSubject, $userMessage);


                $organizerSubject = "New Reservation Alert!";
                $organizerMessage = "
                    <p>A new reservation has been made.</p>
                    <p><strong>User:</strong> $userName ($userEmail)</p>
                    <p><strong>Date:</strong> $reservationDate</p>
                    <p><strong>Time:</strong> $reservationTime</p>
                ";
                $mailer->sendEmail($organizerEmail, $organizerSubject, $organizerMessage);

                echo "Reservation successful! Email sent to user and organizer.";
            } else {
                echo "Error saving reservation. Please try again.";
            }
        }
    }
}
?>