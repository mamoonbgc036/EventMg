<?php
require_once ROOT . '/core/Controller.php';
require_once ROOT . '/app/models/User.php';

class AuthController extends Controller
{
    public function login()
    {
        die('check');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $loggedInUser = $user->login($username, $password);

            if ($loggedInUser) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['role'] = $loggedInUser['role'];
                header('Location: /events');
            } else {
                echo "Invalid credentials!";
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user = new User();
            if ($user->register($username, $email, $password)) {
                header('Location: /login');
            } else {
                echo "Registration failed!";
            }
        } else {
            $this->view('auth/register');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}
?>