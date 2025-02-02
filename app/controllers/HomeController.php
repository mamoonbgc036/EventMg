<?php

namespace App\Controllers;
use Config\Database;
use Core\Controller;
class HomeController extends Controller
{
    protected $db_instance;

    public function __construct()
    {
        $this->db_instance = Database::getInstance();
    }
    public function index()
    {
        $data = $this->db_instance->read('events', '')->results();
        $this->view('home/index', $data);
    }
}
?>