<?php

use common\models\Subject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SubjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Subject List';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    /* Global styles */
    body {
        background-color: #f0f2f5;
        font-family: 'Inter', sans-serif;
        padding: 0;
    }

    /* Main page container */
    .subject-page-container {
        padding: 1.5rem 1rem;
        margin: 0;
    }

    /* Clean and modern header section */
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

    /* Main white card container */
    .content-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        padding: 2rem;
    }

    /* GridView table styling */
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

    /* Subject item styling */
    .subject-item {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .subject-icon {
        width: 3.5rem;
        height: 3.5rem;
        background: #e0e7ff;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
        color: #4f46e5;
    }

    .subject-info h6 {
        color: #1e293b;
        font-weight: 600;
        font-size: 1rem;
        margin: 0 0 0.25rem 0;
    }

    .subject-info p {
        color: #64748b;
        font-size: 0.875rem;
        margin: 0;
    }

    /* Action buttons styling */
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

    /* Specific button styles */
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

    /* Empty state */
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

    /* --- Responsive design for mobile devices --- */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header-right {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .header-stats {
            width: 100%;
            justify-content: center;
        }

        .create-btn {
            width: 100%;
            justify-content: center;
        }

        /* Hide table headers on mobile */
        .modern-table thead {
            display: none;
        }

        /* Transform table rows into cards on mobile */
        .modern-table tbody,
        .modern-table tr,
        .modern-table td {
            display: block;
            width: 100%;
        }

        .modern-table tr {
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            background-color: white;
            padding: 1rem;
        }

        .modern-table tbody td {
            padding: 0.5rem 0;
            text-align: left !important;
        }

        /* Show column name before data on mobile */
        .modern-table td::before {
            content: attr(data-label);
            display: block;
            font-weight: 600;
            color: #4f46e5;
            font-size: 0.75rem;
            text-transform: uppercase;
            margin-bottom: 0.25rem;
        }

        /* Separate layout for buttons */
        .modern-table td:last-child {
            margin-top: 1rem;
        }

        .action-buttons {
            justify-content: flex-start;
        }
    }
</style>

<div class="subject-page-container">
    <div class="content-card">
        <!-- Compact Header Section -->
        <div class="page-header">
            <div class="page-header-left">
                <h1 class="header-title">
                    <i class="fas fa-graduation-cap"></i>
                    Subject List
                </h1>
                <p class="header-subtitle">
                    Manage subjects and add new ones
                </p>
            </div>
            <div class="page-header-right">
                <div class="header-stats">
                    <i class="fas fa-chart-bar"></i>
                    Total: <?= $dataProvider->totalCount ?> subjects
                </div>
                <?= Html::a('<i class="fas fa-plus"></i> New Subject', ['create'], ['class' => 'create-btn']) ?>
            </div>
        </div>

        <?php if ($dataProvider->totalCount > 0): ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => false,
                'tableOptions' => [
                    'class' => 'table modern-table'
                ],
                'columns' => [
                    [
                        'attribute' => 'name',
                        'label' => 'Subject Name',
                        'format' => 'raw',
                        'contentOptions' => ['data-label' => 'Subject Name'],
                        'value' => function ($model) {
                            $icons = [
                                'Mathematics' => '📐', 'Physics' => '⚡',
                                'Chemistry' => '🧪', 'Biology' => '🌱',
                                'English' => '🇬🇧', 'Russian' => '🇷🇺',
                                'History' => '📜', 'Geography' => '🗺️',
                                'Literature' => '📚', 'Computer Science' => '💻',
                            ];
                            $icon = '📖';
                            foreach ($icons as $subject => $subjectIcon) {
                                if (stripos($model->name, $subject) !== false) {
                                    $icon = $subjectIcon;
                                    break;
                                }
                            }

                            return '
                                <div class="subject-item">
                                    <div class="subject-icon">' . $icon . '</div>
                                    <div class="subject-info">
                                        <h6>' . Html::encode($model->name) . '</h6>
                                        <p>' . Html::encode($model->description ?: 'No description provided') . '</p>
                                    </div>
                                </div>
                            ';
                        }
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{view} {update} {delete}',
                        'headerOptions' => ['class' => 'text-end'],
                        'contentOptions' => ['class' => 'text-end', 'data-label' => 'Actions'],
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            </svg>
        ', $url, [
                                    'class' => 'action-btn view-btn',
                                    'title' => 'View',
                                ]);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                <path d="m18.5 2.5 a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/>
            </svg>
        ', $url, [
                                    'class' => 'action-btn update-btn',
                                    'title' => 'Edit',
                                ]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="3,6 5,6 21,6"/>
                <path d="m19,6 v14a2,2 0 0 1-2,2H7a2,2 0 0 1-2-2V6m3,0V4a2,2 0 0 1 2-2h4a2,2 0 0 1 2,2v2"/>
                <line x1="10" y1="11" x2="10" y2="17"/>
                <line x1="14" y1="11" x2="14" y2="17"/>
            </svg>
        ', $url, [
                                    'class' => 'action-btn delete-btn',
                                    'title' => 'Delete',
                                    'data-confirm' => 'Are you sure you want to delete this subject?',
                                    'data-method' => 'post',
                                ]);
                            },
                        ]
                    ],
                ],
            ]); ?>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon">📚</div>
                <h3>No subjects found</h3>
                <p>
                    There are currently no subjects in your learning center.<br>
                    Start by adding the first one.
                </p>
                <?= Html::a('<i class="fas fa-plus"></i> Add the first subject', ['create'], ['class' => 'create-btn']) ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
