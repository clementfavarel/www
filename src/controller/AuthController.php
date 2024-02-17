<?php

class AuthController
{
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
                // $this->register();
                echo 'register';
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
}
