<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../..vendor/autoload.php';

class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'mohammedreida@gmail.com'; 
            $this->mail->Password = ''; 
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;

            $this->mail->setFrom('your-email@gmail.com', 'Your Website Name');
            $this->mail->isHTML(true);
        } catch (Exception $e) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
        }
    }

    public function sendEmail($toEmail, $subject, $message) {
        try {
            $this->mail->clearAddresses();
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;

            return $this->mail->send();
        } catch (Exception $e) {
            return "Error: " . $this->mail->ErrorInfo;
        }
    }

    public function sendMultipleEmails($recipients, $subject, $message) {
        try {
            $this->mail->clearAddresses();
            foreach ($recipients as $email) {
                $this->mail->addAddress($email);
            }
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;

            return $this->mail->send();
        } catch (Exception $e) {
            return "Error: " . $this->mail->ErrorInfo;
        }
    }
}
?>