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

    public function show($event_id)
    {
        $data = $this->db_instance->filter('events', ['id' => $event_id]);
        $this->view('dashboard/single', $data);
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
                'event_time' => 'required',
                'event_location' => 'required'
            ]);
            //redirect
            $_POST['user_id'] = $_SESSION['user_id'];
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
            header('Location: /EventMg/dashboard');
        }
    }

    public function edit($event_id)
    {
        $data = $this->db_instance->filter('events', ['id' => $event_id]);
        $this->view('event/edit', $data);
    }

    public function update($event_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //data validate
            $validate = new Validator;
            $errors = $validate->validate($_POST, [
                'event_name' => 'required',
                'event_desc' => 'required',
                'event_seat' => 'required',
                'event_date' => 'required',
                'event_time' => 'required',
                'event_location' => 'required'
            ]);
            //redirect
            $_POST['user_id'] = $_SESSION['user_id'];
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: /EventMg/event/edit/<?=$event_id?>");
            }
            //db insert
            $check = $this->db_instance->update('events', $event_id, $_POST);
            //redirect

            if (is_array($check) && sizeof($check) > 0) {
                header("Location: /EventMg/event/edit/<?=$event_id?>");
                session_destroy();
                exit();
            }
            header('Location: /EventMg/dashboard');
        }
    }

    public function delete($event_id)
    {
        $this->db_instance->delete('events', $event_id);
        header('Location: /EventMg/dashboard');
    }
}
?>