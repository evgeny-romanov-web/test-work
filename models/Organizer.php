<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizer".
 *
 * @property int $id
 * @property string $fullname ФИО организатора
 * @property string $email E-mail организатора
 * @property string $phone Телефон организатора
 *
 * @property EventOrganizer[] $eventOrganizers
 * @property Event[] $events
 */
class Organizer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'phone'], 'required'],
            [['fullname', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ФИО организатора',
            'email' => 'E-mail организатора',
            'phone' => 'Телефон организатора',
        ];
    }

    /**
     * Gets query for [[EventOrganizers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventOrganizers()
    {
        return $this->hasMany(EventOrganizer::class, ['organizer_id' => 'id']);
    }

    /**
     * Gets query for [[Events]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::class, ['id' => 'event_id'])->viaTable('event_organizer', ['organizer_id' => 'id']);
    }
}
