<?php

namespace App\Controllers;

use App\Core\View;

class Main
{
    public function home(): void
    {
        $view = new View("Main/home", "front");
        $view->assign("name", $_SESSION["firstname"] ?? "visiteur");
    }

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

}