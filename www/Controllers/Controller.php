<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Controller
{
    protected function assignUserAndAdminStatus(View $view): void
    {
        if(isset($_SESSION["user_id"])) {
            $user = new User();
            if ($user->getOneWhere(["id" => $_SESSION["user_id"]]) && $user->getStatus() === 2) {
                $view->assign("admin", true);
                $view->assign("user", true);
            } elseif ($user->getOneWhere(["id" => $_SESSION["user_id"]]) && $user->getStatus() === 1) {
                $view->assign("admin", false);
                $view->assign("user", true);
            }
        } else {
            $view->assign("admin", false);
            $view->assign("user", false);
        }

    }
}
