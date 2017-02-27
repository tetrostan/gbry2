<?php
/**
 * Created by IntelliJ IDEA.
 * User: Paul
 * Date: 27.02.2017
 * Time: 15:57
 */
namespace frontend\actions;

use yii\base\Action;

class TestAction extends Action
{
    public $viewName = 'index';

    public function run()
    {
        return $this->controller->render('@frontend/actions/views/' . $this->viewName);
    }
}