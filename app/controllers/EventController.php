<?php
require_once '../core/Controller.php';
require_once '../models/Event.php';

class EventController extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
        }

        $event = new Event();
        $events = $event->getAllEvents();
        $this->view('events/index', ['events' => $events]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $location = $_POST['location'];
            $capacity = $_POST['capacity'];

            $event = new Event();
            if ($event->createEvent($name, $description, $date, $location, $capacity, $_SESSION['user_id'])) {
                header('Location: /events');
            } else {
                echo "Event creation failed!";
            }
        } else {
            $this->view('events/create');
        }
    }
}
?>