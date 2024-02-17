<?php
require_once('controller/AuthController.php');
require_once('controller/QuestionController.php');
require_once('controller/BossController.php');

class Controller
{
    private $authController;
    private $questionController;
    private $bossController;

    public function __construct()
    {
        $this->authController = new AuthController();
        $this->questionController = new QuestionController();
        $this->bossController = new BossController();
    }

    public function invoke()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'welcome';
        if (!isset($_SESSION['user'])) {
            switch ($page) {
                case 'welcome':
                    include('view/welcome.php');
                    break;
                case 'login':
                case 'register':
                    $this->authController->handleRequest($page);
                    break;
                default:
                    include('view/welcome.php');
                    break;
            }
        } else {
            switch ($page) {
                case 'logout':
                    session_destroy();
                    break;
                case 'start':
                    $this->questionController->start();
                    break;
                case 'question':
                    $question = isset($_GET['question']) ? $_GET['question'] : '1';
                    $this->questionController->getQuestion($question);
                    break;
                case 'boss':
                    $boss = isset($_GET['boss']) ? $_GET['boss'] : '1';
                    $this->bossController->getBoss($boss);
                    break;
                case 'results':
                    // TODO: implement results
                    break;
                default:
                    $img = 'assets/img/404.jpg';
                    $errorCode = 404;
                    $errorMessage = 'Page not found';
                    $link = 'index.php?page=welcome';
                    include('view/error.php');
                    break;
            }
        }
    }
}
