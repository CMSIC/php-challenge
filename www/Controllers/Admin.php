<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Admin
{
    public function dashboard(): void
    {
        // Check if the user is logged in and has admin status
        if (isset($_SESSION['user_id'])) {
            $user = User::populate($_SESSION['user_id']);
            if ($user->getStatus() == 2) {
                $users = $user->getAll();
                // The user is an admin, so show the dashboard
                $view = new View("Admin/dashboard", "back");
                $view->assign("name", $user->getFirstname());
                $view->assign("users", $users);
            } else {
                // The user is not an admin, so redirect them or show an error
                header('Location: /404');
                exit();
            }
        } else {
            // The user is not logged in, so redirect them to the login page
            header('Location: /login');
            exit();
        }
    }



}