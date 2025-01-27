<?php
namespace App\Controllers;
use App\Models\User;
use Core\Controller;
use Core\Validator;


class AuthController extends Controller
{
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

            // if (!empty($errors)) {
            //     $_SESSION['errors'] = $errors;
            //     header('Location: /EventMg/login');
            //     exit();
            // }


            $user = User::getInstance();
            $check = $user->check('users', ['email' => $_POST['email']]);
            if ($check && password_verify($_POST['password'], $check['password'])) {
                if (isset($_SESSION['errors'])) {
                    $errors = $_SESSION['errors'];
                    unset($_SESSION['errors']);
                }
                $_SESSION['login'] = true;
                $_SESSION['email'] = $_POST['email'];
                setcookie('email', $_POST['email'], time() + (86400 * 30), "/");
                header('Location: /EventMg/events');
            } else {
                echo "Invalid credentials!";
            }
        }
    }

    public function register()
    {
        $connection = User::getInstance();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $_POST['password'] = $password;

            $check = $connection->store('users', $_POST);
            if ($check) {
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