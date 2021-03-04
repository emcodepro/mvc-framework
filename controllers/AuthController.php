<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 28-Feb-21
 * Time: 18:38
 */

namespace app\controllers;


use emcode\phpmvc\Application;
use emcode\phpmvc\Controller;
use emcode\phpmvc\middlewares\AuthMiddleware;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleWare(new AuthMiddleWare(['profile']));
    }

    public function login($request, $response)
    {
        $model = new LoginForm();

        if($request->method() == 'post'){
            $model->loadData($request->getBody());
            if($model->validate() && $model->login())
            {
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function register($request)
    {
        $model = new User();
//        $model->status = $model::STATUS_ACTIVE;
        if($request->method() == 'post'){
            $model->loadData($request->getBody());
            if($model->validate() && $model->save()){
                Application::$app->session->setFlash('success', 'Thanks for registering!');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', [
                'model' => $model
            ]);
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function profile()
    {
        return $this->render('profile');
    }
    public function logout($request, $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}