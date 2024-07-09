<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\User;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;

class AuthController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['login'],
        ];
        return $behaviors;
    }

    public function actionLogin()
    {
        $params = Yii::$app->request->bodyParams;
        $user = User::findByUsername($params['username']);
        if ($user && $user->validatePassword($params['password'])) {
            $user->access_token = Yii::$app->security->generateRandomString();
            $user->save();
            return [
                'token' => $user->access_token,
            ];
        }
        return [
            'error' => 'Invalid username or password',
        ];
    }
}
