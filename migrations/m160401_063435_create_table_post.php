<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

class m160401_063435_create_table_post extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_TEXT.' NOT NULL',
            'content' => Schema::TYPE_TEXT.' NOT NULL',
            'author' => Schema::TYPE_STRING.' NOT NULL',
            'created_at' => Schema::TYPE_DATE. ' NOT NULL',
            'update_at' => Schema::TYPE_DATE
        ]);
        //$this->addForeignKey('post_author','post','author','users','id_user');
    }

    public function down()
    {
        $this->dropTable('post');
    }
}
