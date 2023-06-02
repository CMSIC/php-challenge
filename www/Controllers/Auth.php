<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Register;
use App\Models\User;

class Auth
{
    public function login(): void
    {
        echo "Page de connexion";
    }

    public function register(): void
    {
        $form = new Register();
        $view = new View("Auth/register", "front");
        $view->assign("formErrors", $form->errors);
        $view->assign("form", $form->getConfig());

        //Form validé ? et correct ?
        if($form->isSubmited() && $form->isValid()){
            $formData = $form->getFields();
            if ($formData['firstname'] && $formData['lastname'] && $formData['email'] && $formData['pwd']) {
                $user = new User();
                $user->setFirstname($formData['firstname']);
                $user->setLastname($formData['lastname']);
                $user->setEmail($formData['email']);
                $user->setPwd($formData['pwd']);
                $user->save();
            }
        }



    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}