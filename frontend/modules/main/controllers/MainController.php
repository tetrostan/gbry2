<?php
namespace app\modules\main\controllers;

use \yii\web\Controller;

class MainController extends Controller
{
    public $layout = 'bootstrap';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
