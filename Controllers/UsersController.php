<?php
namespace Mobius\Controllers;

use Mobius\BindingModels\Users\UserBindingModel;
use Mobius\Models\IdentityUser;
use Mobius\View;
use Mobius\ViewModels\LoginInformation;
use Mobius\ViewModels\RegisterInformation;


class UsersController extends Controller
{


    public function login()
    {
        $viewModel = new LoginInformation();

        if (isset($_POST['username'], $_POST['password'])) {
            try {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $this->initLogin($user, $pass);
            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();
                return new View($viewModel);
            }
        }

        return new View($viewModel);
    }


    private function initLogin($user, $pass)
    {
        $model = new UserBindingModel($user,$pass);
        $userId = IdentityUser::create()->login($model);
        $_SESSION['id'] = $userId;
        header("Location: http://localhost:8004/MobiusTask/users/profile");
    }

    public function register()
    {
        $viewModel = new RegisterInformation();

        if (isset($_POST['username'], $_POST['password'])) {
            try {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $userModel = new UserBindingModel($user,$pass);
                if(!$userModel->isValid()){
                    throw new \Exception("Username and password must be at least 5 symbols long");
                }

                IdentityUser::add($userModel);
                IdentityUser::save();

                $this->initLogin($user, $pass);
            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();
                return new View($viewModel);
            }
        }

        return new View();
    }


    public function profile()
    {
        if (!IdentityUser::create()->filterById($_SESSION['id'])->findOne()) {
            header("Location: login");
        }

        $userInfo = IdentityUser::create()->filterById($_SESSION['id'])->findOne();

        $userViewModel = new \Mobius\ViewModels\User(
                $userInfo->getUsername(),
                $userInfo->getPass(),
                $userInfo->getId()
        );

        $this->escapeAll($userViewModel);

        return new View($userViewModel);
    }


    public function edit(){
        $userInfo = IdentityUser::create()->filterById($_SESSION['id'])->findOne();

        $userViewModel = new \Mobius\ViewModels\User(
            $userInfo->getUsername(),
            $userInfo->getPass(),
            $userInfo->getId()
        );

        if (isset($_POST['edit'])) {
            if ($_POST['password'] != $_POST['confirm'] || empty($_POST['password'])) {
                $userViewModel->error = 1;
                return new View($userViewModel);
            }

            $userInfo->setUsername($_POST['username'])->setPass($_POST['password']);
            $result = IdentityUser::save();
            if($result){
                $userViewModel->setUsername($_POST['username']);
                $userViewModel->success = 1;
                return new View($userViewModel);
            }

            $userViewModel->error = 1;
            return new View($userViewModel);
        }
        return new View($userViewModel);
    }

    public function logout(){
        $_SESSION['id']='';
        header('Location: login');
    }

    public function authorization(){

        return new View();
    }


    public function delete($id){
        IdentityUser::create()->filterById($id)->delete();
    }



}