<?php
namespace App\Controllers;
use App\Models\User;
use Core\Controller;
use Core\Validator;


class AuthController extends Controller
{
    protected $db_instance;

    public function __construct()
    {
        $this->db_instance = User::getInstance();
    }
    public function login()
    {
        $this->view('auth/login');
    }

    public function getRform()
    {
        $this->view('auth/register');
    }

    public function enter()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $validator = new Validator;

            $errors = $validator->validate($_POST, [
                'email' => 'required',
                'password' => 'required',
            ]);

            if (is_array($errors) && sizeof($errors) > 0) {
                $_SESSION['errors'] = $errors;
                header('Location: /EventMg/login');
                session_destroy();
                exit();
            }

            $check = $this->db_instance->check('users', ['email' => $_POST['email']]);
            if ($check && password_verify($_POST['password'], $check['password'])) {
                if (isset($_SESSION['errors'])) {
                    session_destroy();
                }
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $check['id'];
                $_SESSION['role_id'] = $check['role_id'];
                setcookie('email', $_POST['email'], time() + (86400 * 30), "/");
                header('Location: /EventMg/dashboard');
            } else {
                $_SESSION['invalid'] = "Invalid credentials!";
                header('Location: /EventMg/login');
                exit();
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator;

            $errors = $validator->validate($_POST, [
                'email' => 'required',
                'password' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'role_id' => 'required'
            ]);

            //error show
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: /EventMg/getRform');
            }
            //db insert

            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $check = $this->db_instance->seed('users', $_POST);
            //dublicate show
            if (is_array($check)) {
                $_SESSION['duplicate'] = $check;
                header('Location: /EventMg/getRform');
                exit();
            }
            // redirect
            if ($check) {
                session_destroy();
                header('Location: /EventMg/login');
            } else {
                echo "Registration failed!";
            }
        } else {
            $this->view('auth/register');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /EventMg/login');
    }
}
?>