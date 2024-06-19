<?php

/** @var yii\web\View $this */

use app\models\EventOrganizer;
use yii\helpers\Html;

$this->title = 'Таблица мероприятий';
?>
<div class="site-index mt-5">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= Html::encode($this->title) ?></h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Описание</th>
                        <th>Организаторы</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($events as $event): ?>
                        <tr>
                            <td><?= Html::encode($event->title) ?></td>
                            <td><?= Yii::$app->formatter->asDate($event->date) ?></td>
                            <td><?= Html::encode($event->description) ?></td>
                            <td>
                                <?php
                                $organizers = [];
                                foreach ($event->organizers as $organizer) {
                                    $organizers[] = Html::a(Html::encode($organizer->fullname), ['organizer/view', 'id' => $organizer->id]);
                                }
                                echo implode(', ', $organizers);
                                ?>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>