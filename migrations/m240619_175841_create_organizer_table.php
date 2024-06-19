<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organizer}}`.
 */
class m240619_175841_create_organizer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organizer}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string()->notNull()->comment('ФИО организатора'),
            'email' => $this->string()->notNull()->comment('E-mail организатора'),
            'phone' => $this->string()->notNull()->comment('Телефон организатора'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organizer}}');
    }
}
