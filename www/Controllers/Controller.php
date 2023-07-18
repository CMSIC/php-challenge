<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Controller
{
    protected function assignUserAndAdminStatus(View $view): void
    {
        $isAdmin = false;
        $isUser = false;


        if (isset($_SESSION["user_id"])) {
            $user = new User();
            $userStatus = $user->getOneWhere(["id" => $_SESSION["user_id"]])->getStatus();

            $isAdmin = $userStatus >= 2;
            $isUser = $userStatus >= 1;

            if ($isAdmin) {
                $movieForm = new \App\Forms\Film();
                $view->assign("formErrors", $movieForm->errors);
                $view->assign("movieForm", $movieForm->getConfig());
            }
        }

        $view->assign("user", $isUser);
        $view->assign("admin", $isAdmin);

    }
}
