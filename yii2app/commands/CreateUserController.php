<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;

class CreateUserController extends Controller
{
    public function actionIndex($username, $password, $name)
    {
        $user = new User();
        $user->username = $username;
        $user->password_hash = Yii::$app->security->generatePasswordHash($password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->access_token = Yii::$app->security->generateRandomString();
        $user->save();
        echo "User $username created successfully.\n";
    }
}
