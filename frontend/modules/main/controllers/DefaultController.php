<?php
namespace app\modules\main\controllers;

use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'inner';

        return $this->render('index');
    }

    public function actionPath()
    {
        // @yii
        // @app
        // @runtime
        // @webroot - path frontend/web or backend/web
        // @web - URL to current root web - frontend/web or backend/web
        // @vendor
        // @bower
        // @npm
        // @frontend
        // @backend

        // E:/OpenServer/domains/gbry2.loc/www/frontend/web
//        print \Yii::getAlias('@webroot');
//        print \Yii::getAlias('@test');
    }
}
