<?php

use common\models\Group;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\GroupSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;

// Required for icons and page styles
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
?>

    <style>
        /* Avvalgi dizayndagi barcha CSS kodlari bu yerga joylashtiriladi */
        /* ... (CSS styles for .group-page-container, .content-card, .page-header, etc.) ... */

        .group-page-container {
            padding: 1.5rem 1rem;
            margin: 0;
        }
        .page-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            gap: 1.5rem;
        }
        .page-header-left {
            display: flex;
            flex-direction: column;
        }
        .page-header-left h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 0.25rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .page-header-left h1 i {
            color: #4f46e5;
        }
        .page-header-left p {
            font-size: 0.95rem;
            color: #64748b;
            margin: 0;
        }
        .page-header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .header-stats {
            background-color: white;
            color: #4f46e5;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .create-btn {
            background-color: #4f46e5;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.2);
        }
        .create-btn:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            color: #fff;
        }
        .content-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            padding: 2rem;
        }
        .modern-table {
            margin: 0;
            width: 100%;
        }
        .modern-table thead th {
            background: #f8fafc;
            border: none;
            color: #64748b;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .modern-table tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: background-color 0.2s ease;
        }
        .modern-table tbody tr:hover {
            background-color: #f8fafc;
        }
        .modern-table tbody tr:last-child {
            border-bottom: none;
        }
        .modern-table tbody td {
            padding: 1.5rem;
            vertical-align: middle;
            font-size: 0.95rem;
            color: #475569;
        }
        .modern-table .filters input {
            border: 1px solid #cbd5e1;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            width: 100%;
            font-size: 0.9rem;
            transition: border-color 0.3s ease;
        }
        .modern-table .filters input:focus {
            outline: none;
            border-color: #4f46e5;
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
        .action-btn:hover {
            transform: scale(1.1);
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .view-btn, .update-btn, .delete-btn {
            color: white;
            padding: 8px;
            border-radius: 8px;
            background-color: transparent;
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
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: #64748b;
        }
        .empty-state .icon {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1.5rem;
        }
        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }
        .empty-state p {
            font-size: 1rem;
            margin-bottom: 2rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        .modal-content {
            border-radius: 1.5rem;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .modal-header {
            border-bottom: none;
            padding: 1.5rem 2rem 0.5rem;
        }
        .modal-header h5 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
        }
        .modal-header .btn-close {
            font-size: 1rem;
            color: #94a3b8;
        }
        .modal-body {
            padding: 0 2rem 1.5rem;
        }
    </style>

    <div class="group-page-container">
        <div class="content-card">
            <div class="page-header">
                <div class="page-header-left">
                    <h1 class="header-title">
                        <i class="fas fa-users"></i>
                        Groups
                    </h1>
                    <p class="header-subtitle">
                        Manage all student groups
                    </p>
                </div>
                <div class="page-header-right">
                    <div class="header-stats">
                        <i class="fas fa-chart-bar"></i>
                        Total: <?= $dataProvider->totalCount ?> groups
                    </div>
                    <?= Html::button('<i class="fas fa-plus"></i> New Group', ['class' => 'create-btn', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#createGroupModal']) ?>
                </div>
            </div>

            <?php Pjax::begin(); ?>
            <?php if ($dataProvider->totalCount > 0): ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => false,
                    'tableOptions' => [
                        'class' => 'table modern-table'
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        'teacher_id',
                        'subject_id',
                        [
                            'attribute' => 'created_at',
                            'format' => 'datetime',
                            'label' => 'Created At',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'headerOptions' => ['class' => 'text-end'],
                            'contentOptions' => ['class' => 'text-end'],
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>', $url, ['class' => 'action-btn view-btn', 'title' => 'View',]);
                                },
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="m18.5 2.5 a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>', $url, ['class' => 'action-btn update-btn', 'title' => 'Edit',]);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3,6 5,6 21,6"/><path d="m19,6 v14a2,2 0 0 1-2,2H7a2,2 0 0 1-2-2V6m3,0V4a2,2 0 0 1 2-2h4a2,2 0 0 1 2,2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>', $url, ['class' => 'action-btn delete-btn', 'title' => 'Delete','data-confirm' => 'Are you sure you want to delete this group?','data-method' => 'post',]);
                                },
                            ]
                        ],
                    ],
                ]); ?>
            <?php else: ?>
                <div class="empty-state">
                    <div class="icon">👥</div>
                    <h3>No groups found</h3>
                    <p>
                        There are currently no groups in your system.<br>
                        Create a new group to get started.
                    </p>
                    <?= Html::button('<i class="fas fa-plus"></i> Create the first group', ['class' => 'create-btn', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#createGroupModal']) ?>
                </div>
            <?php endif; ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

<?php Modal::begin([
    'id' => 'createGroupModal',
    'title' => '<h5>Create New Group</h5>',
    'options' => ['tabindex' => false],
    'footer' => false,
]); ?>

    <div id="modal-content">
        <div class="text-center p-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-secondary">Loading form...</p>
        </div>
    </div>

<?php Modal::end(); ?>

<?php
$createUrl = Url::to(['create']);
$js = <<<JS
$(document).ready(function() {
    $('#createGroupModal').on('show.bs.modal', function () {
        $.ajax({
            url: '$createUrl',
            type: 'GET',
            success: function(response) {
                $('#modal-content').html(response);
                // Agar forma ichida yii-active-form mavjud bo'lsa, uni ishga tushirish
                $('#group-form-modal').yiiActiveForm('resetForm');
            },
            error: function() {
                $('#modal-content').html('<div class="alert alert-danger">An error occurred while loading the form.</div>');
            }
        });
    });

    $('#createGroupModal').on('hidden.bs.modal', function () {
        $('#modal-content').html('<div class="text-center p-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-3 text-secondary">Loading form...</p></div>');
    });

    $(document).on('beforeSubmit', '#group-form-modal', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#createGroupModal').modal('hide');
                    $.pjax.reload({container: '#p0', async: false});
                } else {
                    form.yiiActiveForm('updateMessages', response.errors, true);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                alert('An error occurred during save.');
            }
        });
        return false;
    });
});
JS;
$this->registerJs($js);
?>