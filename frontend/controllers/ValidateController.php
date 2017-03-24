<?php
namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Subscribe;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ValidateController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get', 'post'],
                    'subscribe' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new LoginForm();
        /*debug(Yii::$app->request->post()); contains $_POST:
        Array
        (
            [_csrf-frontend] => Y3NuTW9SMnQlNCQuWxUDQAsiWCoHK2YrKgk4LjcDdEQKNhwrDDVIRA==
                [LoginForm] => Array
            (
                [username] => optimus
                [password] => 123123
                    [rememberMe] => 1
                )
            [ajax] => w3
        )*/
        //        debug($model->load(Yii::$app->request->post())); // 1
        //        debug(Yii::$app->request->isAjax); // 1
        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON; // string "json"

            return ActiveForm::validate($model);
        }
    }

    public function actionSubscribe()
    {
        $model = new Subscribe();
        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }
    }
}