<?php
require_once('controller/AuthController.php');
require_once('controller/QuestionController.php');
require_once('controller/SpeechController.php');

class Controller
{
    private $authController;
    private $questionController;
    private $speechController;

    public function __construct()
    {
        $this->authController = new AuthController();
        $this->questionController = new QuestionController();
        $this->speechController = new SpeechController();
    }

    public function invoke()
    {
        if (!isset($_SESSION['user'])) {
            $page = isset($_GET['page']) ? $_GET['page'] : 'welcome';
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
            $page = isset($_GET['page']) ? $_GET['page'] : 'start';
            switch ($page) {
                case 'logout':
                    session_destroy();
                    break;
                case 'start':
                    $this->speechController->start();
                    break;
                case 'speech':
                    $speech = isset($_GET['speech']) ? $_GET['speech'] : '1';
                    $this->speechController->getSpeech($speech);
                    break;
                case 'question':
                    $question = isset($_GET['question']) ? $_GET['question'] : '1';
                    $this->questionController->getQuestion($question);
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
