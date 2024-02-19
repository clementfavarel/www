<?php

class QuestionController
{
    public function getQuestion($question)
    {
        // $questions = $this->getQuestions();
        // if ($question > count($questions)) {
        //     $img = 'assets/img/404.jpg';
        //     $errorCode = 404;
        //     $errorMessage = 'Question not found';
        //     $link = 'index.php?page=start';
        //     include('view/error.php');
        // } else {
        //     $question = $questions[$question - 1];
        //     include('view/question.php');
        // }
        echo 'question ' . $question;
    }

    // private function getQuestions()
    // {
    // }
}
