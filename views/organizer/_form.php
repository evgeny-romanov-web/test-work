    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Organizer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="organizer-form">

    <?php
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::class, [
        'clientOptions' => [
            'alias' => 'email'
        ],
    ]) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'name' => 'phone',
        'mask' => '+7 (999) 999-99-99',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    ActiveForm::end(); ?>

</div>
