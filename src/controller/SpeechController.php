<?php

class SpeechController
{
    public function start()
    {
        // $questions = $this->getQuestions();
        // $question = $questions[0];
        // include('view/question.php');
        echo 'start';
    }

    public function getSpeech($speech)
    {
        // $speeches = $this->getSpeeches();
        // if ($speech > count($speeches)) {
        //     $img = 'assets/img/404.jpg';
        //     $errorCode = 404;
        //     $errorMessage = 'Question not found';
        //     $link = 'index.php?page=start';
        //     include('view/error.php');
        // } else {
        //     $question = $questions[$question - 1];
        //     include('view/question.php');
        // }
        echo 'speech ' . $speech;
    }
}
