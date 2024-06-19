<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_organizer}}`.
 */
class m240619_175846_create_event_organizer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_organizer}}', [
            'event_id' => $this->integer(),
            'organizer_id' => $this->integer(),
            'PRIMARY KEY(event_id, organizer_id)',
        ]);

        // Индексы
        $this->createIndex(
            'idx-event_organizer-event_id',
            '{{%event_organizer}}',
            'event_id'
        );

        $this->createIndex(
            'idx-event_organizer-organizer_id',
            '{{%event_organizer}}',
            'organizer_id'
        );

        // Внешние ключи
        $this->addForeignKey(
            'fk-event_organizer-event_id',
            '{{%event_organizer}}',
            'event_id',
            '{{%event}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-event_organizer-organizer_id',
            '{{%event_organizer}}',
            'organizer_id',
            '{{%organizer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_organizer}}');
    }
}
