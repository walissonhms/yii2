<?php

use yii\db\Schema;
use yii\db\Migration;

class m160616_000010_create_client_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'client_id' => $this->integer()->notNull(),
            'photo' => $this->string()->defaultValue(null),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    
        $this->addForeignKey(
            'fk-product-client_id',
            'product',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );
    }
    
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-client_id', 'product');
        $this->dropTable('product');
    }    
}