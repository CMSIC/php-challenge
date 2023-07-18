<?php

namespace App\Controllers;

use App\Core\View;

use App\Models\User;
use App\Models\Film;
use App\Models\Note;
use App\Models\Comment;

class Main extends Controller
{
    public function home(): void
    {
        $films = (new \App\Models\Film)->getLastInserted(8);
        $view = new View("Main/home", "front");

        $this->assignUserAndAdminStatus($view);

        $view->assign("films", $films);
        $view->assign("name", $_SESSION["firstname"] ?? "visiteur");

        $movieForm = new \App\Forms\Film();
        $view->assign("formErrors", $movieForm->errors);
        $view->assign("movieForm", $movieForm->getConfig());

    }

    public function review(): void
    {
        $id = $_GET['id'];
        $film = (new \App\Models\Film)->getOneWhere(["id" => $id]);

        // Calcul de la note moyenne
        $averageNote = (new \App\Models\Note)->getAverageNoteForFilm($id);

        // Récupération des commentaires associés au film
        $comments = (new \App\Models\Comment)->getCommentsForFilm($id);

        $view = new View("Main/review", "front");
        $view->assign("film", $film);
        $view->assign("name", $_SESSION["firstname"] ?? "visiteur");
        $view->assign("averageNote", $averageNote);
        $view->assign("comments", $comments);

        $this->assignUserAndAdminStatus($view);
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

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

}