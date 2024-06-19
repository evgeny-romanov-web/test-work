<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Event $model */

$this->title = 'Создать мероприятие';
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
