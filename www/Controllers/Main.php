<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Film;
use App\Models\Note;
use App\Models\Comment;

class Main
{
    public function home(): void
    {
        $view = new View("Main/home", "front");
        $view->assign("name", $_SESSION["firstname"] ?? "visiteur");
        //var_dump($_SESSION);
    }
    
    public function notFound(): void
    {
        $view = new View("Main/404", "front");
        $view->assign("title", "Page Not Found");
    }

    public function contact(): void
    {
        echo "Page contact";
    }

    public function generation(): void
    {
        echo "Page contact";
        $film = new Film();
        $film->generate();
        $user = new User();
        $user->generate();
        $note = new Note();
        $note->generate();
        $comment = new Comment();
        $comment->generate();
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

}