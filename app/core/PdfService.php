<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use TCPDF;

class PdfService
{
    public static function generateTicket($ticketData)
    {
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Event Ticket');
        $pdf->AddPage();

        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Your Event Ticket', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Ln(10);
        $pdf->Cell(50, 10, 'Name: ' . $ticketData['name'], 0, 1);
        $pdf->Cell(50, 10, 'Event: ' . $ticketData['event'], 0, 1);
        $pdf->Cell(50, 10, 'Date: ' . $ticketData['date'], 0, 1);
        $pdf->Cell(50, 10, 'Seat: ' . $ticketData['seat'], 0, 1);

        // Force Download
        $pdf->Output('ticket.pdf', 'D'); 
    }
}