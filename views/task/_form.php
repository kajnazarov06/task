<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'due_date')->widget(DatePicker::className(),  [
        'dateFormat' => 'php:Y-m-d',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(\app\models\Task::STATUSES_NAMES) ?>

    <?= $form->field($model, 'priority')->dropDownList(\app\models\Task::PRIORITIES) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
