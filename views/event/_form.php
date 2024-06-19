<?php

use app\models\Organizer;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Event $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    select.form-control[size], select.form-control[multiple] {
        width: 50%;
        min-height: 50px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        font-size: 16px;
        color: #555;
    }
     .btn_multiselect {
         margin-right: 5px;
         margin-bottom: 5px;
         background-color: #ebe4fb;
         border: none;
         border-radius: 4px;
         padding: 5px 10px;
         cursor: pointer;
         font-size: 14px;
     }

    .btn_multiselect:hover {
        background-color: #dbd1ee;
    }
</style>
<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'organizerIds')->dropDownList(
        ArrayHelper::map(Organizer::find()->all(), 'id', 'fullname'),
        ['multiple' => true]
    )->label('Организаторы') ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
