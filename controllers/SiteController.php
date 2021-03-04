<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 28-Feb-21
 * Time: 13:05
 */

namespace app\controllers;


use emcode\phpmvc\Application;
use emcode\phpmvc\Controller;
use emcode\phpmvc\Request;
use emcode\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function index()
    {
        return $this->render('home', [
            'any' => "Legend",
        ]);
    }

    public function contact(Request $request, Response $response)
    {
        $model = new ContactForm();

        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->send()){
                Application::$app->session->setFlash('success', 'Thanks for contacting us!');
                return $response->redirect('/contacts');
            }
        }
        return $this->render('contacts', [
            'model' => $model
        ]);
    }

    public function handleContact($request)
    {
        Dump($request->getBody());
        return "Handle contact";

    }
}