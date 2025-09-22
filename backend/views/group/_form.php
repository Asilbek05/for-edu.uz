<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Group $model */
/** @var yii\widgets\ActiveForm $form */
/** @var common\models\Subject[] $subjects */
?>

<style>
    /* ... Avvalgi CSS kodi o'zgarishsiz qoladi ... */
    .modal-body .form-group {
        margin-bottom: 1.5rem;
    }

    .modal-body .form-group label {
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.5rem;
        display: block;
    }

    .modal-body .form-control,
    .modal-body .form-select {
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        color: #1e293b;
        transition: all 0.3s ease;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        background-color: #f9fafb;
        width: 100%;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
    }

    .modal-body .form-control:focus,
    .modal-body .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        outline: none;
        background-color: white;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
        margin-top: 1rem;
    }

    .btn-action {
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #4f46e5;
        color: #fff;
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.2);
    }

    .btn-primary:hover {
        background-color: #4338ca;
        transform: translateY(-2px);
        color: #fff;
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.3);
    }

    .btn-secondary {
        background-color: #f1f5f9;
        color: #64748b;
        box-shadow: none;
    }

    .btn-secondary:hover {
        background-color: #e2e8f0;
        transform: translateY(-2px);
        color: #64748b;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="group-form">
    <?php $form = ActiveForm::begin([
        'id' => 'group-form-modal',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'validateOnBlur' => true,
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'e.g., G-1, Mathematics A']) ?>


    <?= $form->field($model, 'subject_id')->dropDownList(
        ArrayHelper::map($subjects, 'id', 'name'),
        ['prompt' => 'Select a subject...', 'class' => 'form-select']
    ) ?>

    <div class="modal-footer">
        <?= Html::submitButton('<i class="fas fa-save"></i> Save', ['class' => 'btn-action btn-primary']) ?>
        <?= Html::button('<i class="fas fa-times"></i> Cancel', ['class' => 'btn-action btn-secondary', 'data-bs-dismiss' => 'modal']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>