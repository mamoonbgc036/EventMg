<?php
namespace App\Controllers;
use App\Models\Event;
use App\Models\User;
use Core\Controller;
use Core\Validator;


class DashboardController extends Controller
{
    protected $db_instance;

    public function __construct()
    {
        $this->db_instance = Event::getInstance();
    }

    public function index()
    {
        $data = $this->db_instance->filter('events', ['user_id' => $_SESSION['user_id']]);
        $this->view('dashboard/index', $data);
    }
    public function logout()
    {
        session_destroy();
        header('Location: /EventMg/login');
    }
}
?>