<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    public static function tableName()
    {
        return 'client';
    }

    public function rules()
    {
        return [
            [['name', 'cpf', 'cep', 'address', 'number', 'city', 'state'], 'required'],
            [['cpf'], 'string', 'max' => 11],
            [['cep'], 'string', 'max' => 8],
            [['state'], 'string', 'max' => 2],
            [['cpf'], 'unique'],
        ];
    }
}
