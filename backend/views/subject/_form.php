<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Subject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group mb-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group mt-4">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
