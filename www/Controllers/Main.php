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