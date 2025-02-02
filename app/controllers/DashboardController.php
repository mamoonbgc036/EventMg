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
        if ($_SESSION['role_id'] == 1) {
            $data = $this->db_instance->filter('events', []);
        } else {
            $data = $this->db_instance->filter('events', ['user_id' => $_SESSION['user_id']]);
        }

        $this->view('dashboard/index', $data);
    }

    public function downloadCsv()
    {
        $events = $this->db_instance->filter('events', []);

        if (empty($events)) {
            die("No records found.");
        }

        // Define CSV filename
        $filename = "users_export.csv";

        // Set headers for download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);

        // Open output stream
        $output = fopen('php://output', 'w');

        // Add UTF-8 BOM to fix character encoding issues
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Write column headers
        fputcsv($output, array_keys($events[0]));

        // Write user records
        foreach ($events as $event) {
            fputcsv($output, $event);
        }

        // Close output stream
        fclose($output);
        exit;
    }
    public function logout()
    {
        session_destroy();
        header('Location: /EventMg/login');
    }
}
?>