<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['name', 'price', 'client_id'], 'required'],
            [['price'], 'number'],
            [['client_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}
