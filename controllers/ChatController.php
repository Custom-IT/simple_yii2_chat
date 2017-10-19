<?php

namespace app\controllers;

use Yii;
use app\models\Messages;
use yii\web\Controller;

class ChatController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->session->open();
        if (Yii::$app->request->isPost) {
            $addMessage = new Messages();
            if ( $addMessage->load(Yii::$app->request->post()) ) {
                $addMessage->session = Yii::$app->session->id;
                $addMessage->save();
            }
        }
        $messages = Messages::find()->all();
        if (Yii::$app->request->isAjax) {
            if (Yii::$app->request->isPost) {
                return $this->renderAjax('index', [
                    "messages" => $messages,
                    "preFirstname" => $addMessage->firstname ?? null,
                    "preLastname" => $addMessage->lastname ?? null,
                ]);
            } else {
                return $this->renderAjax('messagescontainer', [
                    "messages" => $messages,
                ]);
            }
        }
        return $this->render('index', [
            "messages" => $messages,
        ]);
    }
}