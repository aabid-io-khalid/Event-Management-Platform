<?php
require_once __DIR__ . '/../core/PdfService.php';

class TicketController
{
    public function download()
    {
        $ticketData = [
            'name' => 'John Doe',
            'event' => 'Rock Concert',
            'date' => '2025-03-10',
            'seat' => 'A12'
        ];

        PdfService::generateTicket($ticketData);
    }
}