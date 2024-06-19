<?php

use app\models\Event;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать мероприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'date',
            'description:ntext',
            [
                'attribute' => 'organizerIds',
                'label' => 'Организаторы',
                'format' => 'raw',
                'value' => function ($model) {
                    $organizers = [];
                    foreach ($model->organizers as $organizer) {
                        $organizers[] = Html::a(Html::encode($organizer->fullname), ['organizer/view', 'id' => $organizer->id]);
                    }
                    return implode(', ', $organizers);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Event $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
