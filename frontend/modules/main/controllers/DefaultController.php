<?php
namespace app\modules\main\controllers;

use frontend\components\Common;
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
        $this->layout = 'bootstrap'; // only home page

        return $this->render('index');
    }

    public function actionEvent()
    {
//        $component = new Common();
// если common подключен в конфиг. файле (main.php в данном случае)
        $component = \Yii::$app->common;

        // подключение обработчика
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        // можно привязывать другие события
        // которые запускаются одной командой через триггер
//        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin2']);
//        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin3']);
        $component->sendMail('test@domain.com', 'Test', 'Test text');

        // отключение обработчика
        $component->off(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
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
