<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;

class Auth
{
    public function login()
    {
        $form = new Login();
        $view = new View("Auth/login", "front");
        $view->assign("formErrors", $form->errors);
        $view->assign("form", $form->getConfig());

        if($form->isSubmited() && $form->isValid()){
            $formData = $form->getFields();
            if ($formData['email'] && $formData['pwd']) {
                $user = new User();
                $user = $user->getOneWhere(['email' => $formData['email']]);
                // Assuming you have a getPassword method in User model which return the user's password.
                if($user && password_verify($formData['pwd'], $user->getPwd())) {
                    // Start session and store user details in session
                    session_start();
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['email'] = $user->getEmail();
                    // Other user details you want to store in session

                    // Redirect to homepage after successful login
                    header('Location: /');
                    exit();
                } else {
                    // Invalid email or password
                    $view->assign("formErrors", ["email" => "Invalid email or password"]);
                }
            }
        }
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
                $user->setCountry($formData['country']);
                $user->setStatus(1);
                $user->save();
            }
        }



    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}