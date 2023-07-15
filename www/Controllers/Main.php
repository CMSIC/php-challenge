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
        $films = (new \App\Models\Film)->get(8);
        $view = new View("Main/home", "front");
        $view->assign("films", $films);
        $view->assign("name", $_SESSION["firstname"] ?? "visiteur");
        if(isset($_SESSION["user_id"])){
            $user = new User();
            if($user->getOneWhere(["id"=>$_SESSION["user_id"]])->getStatus() === 2){
                $view->assign("admin", true);
            } else {
                $view->assign("admin", false);
            }
        }
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