<?php
namespace frontend\widgets;

use common\models\LoginForm;
use yii\bootstrap\Widget;
use \yii\helpers\Url;

class Login extends Widget
{
    public function run()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            // $controller = \Yii::$app->controller;
            // $controller->redirect($controller->goBack()); // error
            // redirect to home page
            // \Yii::$app->controller->redirect('/');
            // redirect to home page
            // \Yii::$app->controller->goBack();
            // redirect to previous page
            \Yii::$app->controller->redirect(Url::to(''));
        }

        return $this->render("login", ['model' => $model]);
    }
}