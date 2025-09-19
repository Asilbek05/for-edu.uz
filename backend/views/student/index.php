<?php

use common\models\Student;
use common\models\Group;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var common\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\Student $model */
/** @var common\models\Group[] $groups */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;

// Select2 kutubxonasi uchun kerakli resurslar
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>
<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Inter', sans-serif;
    }

    .content-card {
        background: #ffffff;
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08), 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 2rem;
    }

    .student-page-container {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 2rem;
        padding: 1.5rem 1rem;
    }

    .form-card {
        background: #f8fafc;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .form-card h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
    }

    .form-control, .form-select, .select2-container--bootstrap5 .select2-selection {
        border-radius: 0.75rem !important;
        padding: 0.75rem 1rem !important;
        border: 1px solid #e2e8f0 !important;
        transition: all 0.3s ease !important;
        background-color: #f9fafb !important;
    }

    .form-control:focus, .form-select:focus, .select2-container--bootstrap5 .select2-selection:focus {
        border-color: #4f46e5 !important;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1) !important;
        background-color: white !important;
    }

    .btn-action {
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background-color: #4f46e5;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #4338ca;
        transform: translateY(-2px);
    }

    .modern-table {
        margin: 0;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 1rem;
    }

    .modern-table thead th {
        background: none;
        border: none;
        color: #64748b;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 0.75rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .modern-table tbody tr {
        background: #f8fafc;
        border-radius: 0.75rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }

    .modern-table tbody tr:hover {
        background-color: #f1f5f9;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .modern-table tbody td {
        padding: 1.5rem;
        vertical-align: middle;
        font-size: 0.95rem;
        color: #475569;
        border: none;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 50%;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .view-btn {
        color: #6366f1;
        background: #f1f5f9;
    }

    .view-btn:hover {
        color: white;
        background-color: #6366f1;
    }

    .update-btn {
        color: #10b981;
        background: #f0fdf4;
    }

    .update-btn:hover {
        color: white;
        background-color: #10b981;
    }

    .delete-btn {
        color: #ef4444;
        background: #fef2f2;
    }

    .delete-btn:hover {
        color: white;
        background-color: #ef4444;
    }
</style>

<div class="student-page-container">
    <div class="form-card content-card">
        <h2><i class="fas fa-user-plus"></i> New Student</h2>

        <?php $form = ActiveForm::begin([
            'id' => 'student-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]); ?>

        <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter full name']) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => '+998 xx xxx xx xx']) ?>

        <?= $form->field($model, 'group_id')->widget(Select2::class, [
            'data' => ArrayHelper::map($groups, 'id', 'name'),
            'options' => [
                'placeholder' => 'Select or create a group...',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true, // Bu yangi guruh yaratish imkonini beradi
            ],
        ])->label('Group') ?>

        <div class="form-group mt-4">
            <?= Html::submitButton('<i class="fas fa-save"></i> Save Student', ['class' => 'btn btn-primary btn-action']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="list-card content-card">
        <h2 class="mb-4"><i class="fas fa-users"></i> Student List</h2>

        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table modern-table'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'full_name',
                'phone',
                [
                    'attribute' => 'group_id',
                    'label' => 'Group',
                    'value' => function ($model) {
                        return $model->group->name ?? 'N/A';
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                    'label' => 'Registered On',
                ],
                [
                    'class' => ActionColumn::class,
                    'headerOptions' => ['class' => 'text-end'],
                    'contentOptions' => ['class' => 'text-end'],
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            return Html::a('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="m18.5 2.5 a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>', Url::to(['update', 'id' => $model->id]), [
                                'class' => 'action-btn update-btn',
                                'title' => 'Edit',
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3,6 5,6 21,6"/><path d="m19,6 v14a2,2 0 0 1-2,2H7a2,2 0 0 1-2-2V6m3,0V4a2,2 0 0 1 2-2h4a2,2 0 0 1 2,2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>', $url, ['class' => 'action-btn delete-btn', 'title' => 'Delete', 'data' => ['confirm' => 'Are you sure you want to delete this student?', 'method' => 'post'], ]);
                        },
                    ]
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>