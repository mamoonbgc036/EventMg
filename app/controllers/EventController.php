<?php
namespace App\Controllers;
use App\Models\Event;
use Core\Controller;
use Core\Validator;

class EventController extends Controller
{
    protected $db_instance;

    public function __construct()
    {
        $this->db_instance = Event::getInstance();
    }
    public function index()
    {
        $data = $this->db_instance->read('events', '')->results();
        $this->view('home/index', $data);
    }

    public function create()
    {
        $this->view('event/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //data validate
            $validate = new Validator;
            $errors = $validate->validate($_POST, [
                'event_name' => 'required',
                'event_desc' => 'required',
                'event_seat' => 'required',
                'event_date' => 'required',
                'event_time' => 'required'
            ]);
            //redirect
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: /EventMg/event/create');
            }
            //db insert
            $is_array = $this->db_instance->seed('events', $_POST);
            //redirect

            if (is_array($is_array) && sizeof($is_array) > 0) {
                header('Location: /EventMg/event/create');
                session_destroy();
                exit();
            }
            header('Location: /EventMg/events');
        }
    }
}
?>