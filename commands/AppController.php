<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Messages;

class AppController extends Controller
{
    /* В данном случае для тестового задания подойдет простой консольный цикл. */
    /* Для реальной реализации можно использовать cron, yii2/queue и другие механизмы */
    public function actionBot()
    {
    	while (true) {
    		Messages::botMessage();
    		sleep(rand(5,10));
    	}
    }

    public function actionTestBot()
    {
    	Messages::botMessage();
    }
}
