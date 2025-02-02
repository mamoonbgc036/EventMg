<?php

namespace App\Controllers;
use Config\Database;
use Core\Controller;

class BookController extends Controller
{
    protected $db_instance;

    public function __construct()
    {
        $this->db_instance = Database::getInstance();
    }

    public function book()
    {
        // Insert booking details into the 'book' table
        $this->db_instance->seed('book', $_POST);

        // Return JSON success response
        echo json_encode([
            'status' => 'success',
            'message' => 'Booking successful!'
        ]);
        exit;
    }
}
?>