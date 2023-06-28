<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Main
{
    public function home(): void
    {
        $view = new View("Main/home", "front");
        $user = new User();
        var_dump($user->getOneWhere(["email" => $_SESSION["email"]]));
        $view->assign("name", $_SESSION["firstname"] ? $_SESSION["firstname"] : "visiteur");
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