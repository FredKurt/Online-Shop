<?php

namespace OlineShop\Controllers;

class UsersController extends A_Controller
{
    protected function indexAction(): string
    {
        if(!empty($_SESSION['user'])) {
            header('location: /');
        }
        echo $this->view->render('index', $this->dataToRender);
    }
    protected function editAction(): void
    {
        //TODO: implements editAction() method

    }
    protected function deleteAction($id): void
    {
        $this->checkAcces();
        $users = new Users();
        $result = $users->deleteById($id);
        if($result === true) {

        }else {
            $this->dataToRrender['error'] = "deletion failed!";

        }

    }
    protected function addAction(): void
    {
        $this->checkAcces();
        if($userData["Users::DB_TABLE_FIELD_EMAIL"] = filter_var($_POST["Users::DB_TABLE_FIELD_EMAIL"], FILTER_VALIDATE_EMAIL)) {
            $userData["Users::DB_TABLE_FIELD_PASSWORD"] = htmlentities($_POST["Users::DB_TABLE_FIELD_PASSWORD"]);
            $userData["Users::DB_TABLE_FIELD_ADDRESS"] = htmlentities($_POST["Users::DB_TABLE_FIELD_ADDRESS"]);
            $userData["Users::DB_TABLE_FIELD_PASSWORD"] = password_hash($userData["Users::DB_TABLE_FIELD_PASSWORD"], PASSWORD_DEFAULT);

            $users = new Users();
            $result = $users->insert($userData);
            if($result === true) {
                $_SESSION['successMessage'] = "You have created your account user";
                header('location: /login');
            }else {
                $this->dataToRrender['error'] = "Registration failed! Please try again";
                $this->view->render('registration', $this->dataToRender);
            }
        } else {
            $_SESSION['errorMessage'] = "the password don't correspond with email";
            header('location: /register');
        }

    }

    protected function loginAction(): void
    {
        $this->dataToRrender['pageTitle'] = "log in";
        $userLoginFailed = $_SESSION['userLoginFailed']?? false;
        if($userLoginFailed) {
            $this->dataToRrender['error'] = $_SESSION['errorMessage'] ?? "Authentication failed! Please try again";
        }
        if(!empty($_SESSION['successMessage'])) {
            $this->dataToRrender["success"] = $_SESSION["successMessage"];
        }
        $this->view->render('login', $this->dataToRender);
    }

    protected function authenticateAction(): void
    {
        $userExists = false;
        $userData = [];
        $_SESSION['userLoginFailed'] = false;
        if($userEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user = new Users();
            $userData = $user->findByEmail($userEmail);
            if(empty($userData)) {
                $_SESSION['errorMessage'] = "the user not exists!";
                header('location: /login');
            } else {
                if(!password_verify($_POST['password'], $userData['password'])) {
                    $_SESSION['errorMessage'] = "the password don't correspond with email";
                    header('location: /login');
                } else {
                    $userExists = true;
                }
            }

        } else {
            $_SESSION['errorMessage'] = "Please put correct email!";
            header('location: /login');

        }
        //Authentication logic
        $_SESSION['user'] = $userData;
        if($userExists) {
            header('location: /');
        } else {
            $_SESSION['userLoginFailed'] = true;
            header('location: /login');
        }
    }
    protected function logoutAction(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        header('location: /login');

    }

}