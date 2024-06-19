<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title Название мероприятия
 * @property string|null $date Дата проведения мероприятия
 * @property string|null $description Описание мероприятия
 *
 * @property EventOrganizer[] $eventOrganizers
 * @property Organizer[] $organizers
 */
class Event extends \yii\db\ActiveRecord
{
    public $organizerIds; // Виртуальное свойство для хранения идентификаторов организаторов
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название мероприятия',
            'date' => 'Дата проведения мероприятия',
            'description' => 'Описание мероприятия',
        ];
    }

    /**
     * Gets query for [[EventOrganizers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventOrganizers()
    {
        return $this->hasMany(EventOrganizer::class, ['event_id' => 'id']);
    }

    /**
     * Gets query for [[Organizers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizers()
    {
        return $this->hasMany(Organizer::class, ['id' => 'organizer_id'])->viaTable('event_organizer', ['event_id' => 'id']);
    }
}
