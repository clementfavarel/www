<?php
require_once('model/User.php');

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function handleRequest($page)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
            $this->handlePostRequest($page);
        } else {
            $this->handleGetRequest($page);
        }
    }

    private function handlePostRequest($page)
    {
        switch ($page) {
            case 'login':
                // $this->login();
                echo 'login';
                break;
            case 'register':
                $this->register();
                break;
            default:
                $img = 'assets/img/500.jpg';
                $errorCode = 500;
                $errorMessage = 'Internal Server Error';
                $link = 'index.php?page=' . $page;
                include('view/error.php');
                break;
        }
    }

    private function handleGetRequest($page)
    {
        switch ($page) {
            case 'login':
                include('view/login.php');
                break;
            case 'register':
                include('view/register.php');
                break;
            default:
                $img = 'assets/img/404.jpg';
                $errorCode = 404;
                $errorMessage = 'Page not found';
                $link = 'index.php?page=' . $page;
                include('view/error.php');
                break;
        }
    }

    private function register()
    {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];

        if (empty($pseudo) || empty($email)) {
            $img = 'assets/img/400.jpg';
            $errorCode = 400;
            $errorMessage = 'Empty fields';
            $link = 'index.php?page=register';
            include('view/error.php');
        }

        if (strlen($pseudo) < 3 || strlen($pseudo) > 60) {
            $img = 'assets/img/400.jpg';
            $errorCode = 400;
            $errorMessage = 'Username must be between 3 and 60 characters';
            $link = 'index.php?page=register';
            include('view/error.php');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $img = 'assets/img/400.jpg';
            $errorCode = 400;
            $errorMessage = 'Email is not valid';
            $link = 'index.php?page=register';
            include('view/error.php');
        }

        $user = $this->userModel->createUser($pseudo, $email);
        $_SESSION['user'] = $user;
        header('Location: index.php');
    }
}
