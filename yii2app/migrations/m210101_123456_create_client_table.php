<?php

use yii\db\Schema;
use yii\db\Migration;

class m210101_123456_create_client_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'cpf' => $this->string(11)->notNull()->unique(),
            'cep' => $this->string(8)->notNull(),
            'address' => $this->string()->notNull(),
            'number' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'state' => $this->string(2)->notNull(),
            'complement' => $this->string()->defaultValue(null),
            'photo' => $this->string()->defaultValue(null),
            'gender' => $this->string(1)->defaultValue(null),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('client');
    }
}