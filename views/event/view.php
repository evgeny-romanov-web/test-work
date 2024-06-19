<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Event $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить это мероприятие?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
            ]
        ],
    ]) ?>

</div>
