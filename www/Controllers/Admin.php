<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Admin
{
    public function dashboard(): void
    {
        // Check if the user is logged in and has admin status
        if (isset($_SESSION['user_id']) && (new \App\Models\User)->getOneWhere(['id' => $_SESSION['user_id']])) {
            $user = User::populate($_SESSION['user_id']);
            if ($user->getStatus() == 2) {
                $users = $user->getAll();
                $allfilms = (new \App\Models\Film)->getAll();
                // The user is an admin, so show the dashboard
                $view = new View("Admin/dashboard", "back");
                $view->assign("name", $user->getFirstname());
                $view->assign("users", $users);
                $view->assign("films", $allfilms);

                $movieForm = new \App\Forms\Film();
                $view->assign("formErrors", $movieForm->errors);
                $view->assign("movieForm", $movieForm->getConfig());

                if ($movieForm->isSubmited() && $movieForm->isValid()){
                    $formData = $movieForm->getFields();
                    $film = new \App\Models\Film();
                    $film->setTitle($formData['title']);
                    $film->setDescription($formData['description']);
                    $film->setYear($formData['year']);
                    $film->setLength($formData['length']);
                    $film->setCategory($formData['category']);
                    $film->save();
                    //var_dump($film);
                    header('Location: /dashboard');
                    exit();
                }
            }

        } else {
            header('Location: /404');
            exit();
        }
    }



}