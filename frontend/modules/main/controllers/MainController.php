<?php
namespace app\modules\main\controllers;

use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\SignupForm;
use yii\bootstrap\ActiveForm;
use \yii\web\Controller;
use yii\web\Response;

class MainController extends Controller
{
    public $layout = 'inner';

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'test' => [
                'class' => 'frontend\actions\TestAction',
                //                'viewName' => 'test1',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        // 1 variant scenario
        //        $model = new SignupForm(['scenario' => 'short_register1']);
        // 2 variant scenario
        //        $model = new SignupForm();
        //        $model->scenario = 'short_register1';
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            if ($model->load(\Yii::$app->request->post())) {
                \Yii::$app->response->format = Response::FORMAT_JSON;

                return ActiveForm::validate($model);
            }
        }
        if ($model->load(\Yii::$app->request->post()) && $model->signup()) {
            //            print_r($model->getAttributes());
            //            die;
            \Yii::$app->session->setflash('success', 'Register Success');
        }

        return $this->render('register', ['model' => $model]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            $this->goBack();
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            print 'Send success';
            die();
        }

        return $this->render('contact', ['model' => $model]);
    }
}
