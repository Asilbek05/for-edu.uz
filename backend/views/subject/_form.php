<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Subject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    /* Global styles (already defined in previous examples) */
    body {
        background-color: #f0f2f5;
        font-family: 'Inter', sans-serif;
    }

    /* Form container card */
    .form-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        max-width: 600px;
        margin: 2rem auto;
    }

    /* Form header */
    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .form-header p {
        color: #64748b;
        margin-top: 0.5rem;
    }

    /* Form field styling */
    .form-group label {
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-group .form-control {
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        color: #1e293b;
        transition: all 0.3s ease;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
    }

    .form-group .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        outline: none;
    }

    /* Button group */
    .button-group {
        display: flex;
        gap: 0.75rem; /* Tugmalar orasidagi masofani qisqartirish */
        justify-content: flex-end;
        align-items: center;
        margin-top: 2rem;
    }

    /* Button styles */
    .btn-action {
        font-weight: 600;
        padding: 0.65rem 1rem; /* Yanada kichikroq o'lcham */
        border-radius: 0.75rem;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
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
    }
</style>

<div class="subject-form-container">
    <div class="form-card">
        <div class="form-header">
            <?php if (!$model->isNewRecord): ?>
                <h2>Update Subject</h2>
                <p>Edit the details of this subject below.</p>
            <?php else: ?>
                <h2>Create New Subject</h2>
                <p>Fill in the form to add a new subject.</p>
            <?php endif; ?>
        </div>

        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group mb-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'e.g., Mathematics, Physics']) ?>
        </div>

        <div class="form-group mb-4">
            <?= $form->field($model, 'description')->textarea(['rows' => 4, 'placeholder' => 'A brief description of the subject...']) ?>
        </div>

        <div class="button-group">
            <?= Html::submitButton('<i class="fas fa-save"></i> Save', ['class' => 'btn-action btn-primary']) ?>

            <?php if (!$model->isNewRecord): ?>
                <?= Html::button('<i class="fas fa-eraser"></i> Clear', ['class' => 'btn-action btn-secondary', 'onclick' => 'document.getElementById("subject-form").reset();']) ?>
            <?php else: ?>
                <?= Html::resetButton('<i class="fas fa-eraser"></i> Clear', ['class' => 'btn-action btn-secondary']) ?>
            <?php endif; ?>

            <?= Html::a('<i class="fas fa-arrow-left"></i> Back', Url::to(['index']), ['class' => 'btn-action btn-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">