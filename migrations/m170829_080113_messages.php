<?php

use yii\db\Schema;
use yii\db\Migration;

class m170829_080113_messages extends Migration
{
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => Schema::TYPE_PK,
            'create' => Schema::TYPE_DATETIME . ' NOT NULL',
            'update' => Schema::TYPE_DATETIME . ' NOT NULL',
            'firstname' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'message' => $this->string()->notNull(),
            'session' => $this->string()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('messages');
    }
}
