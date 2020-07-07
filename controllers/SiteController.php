<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\CommentForm;
use Yii;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionComments()
    {
        $model = new CommentForm();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        { 
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        return $this->render('comments', ['model' => $model]);
    }
}
