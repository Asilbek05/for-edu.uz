<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Subject $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    /* Global styles */
    body {
        background-color: #f0f2f5;
        font-family: 'Inter', sans-serif;
    }

    /* Main page container */
    .subject-page-container {
        padding: 1.5rem 1rem;
        margin: 0;
    }

    /* Card container */
    .content-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        padding: 2rem;
    }

    /* Header section */
    .page-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 2rem;
    }

    .page-header-icon {
        width: 6rem;
        height: 6rem;
        background: #e0e7ff;
        border-radius: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #4f46e5;
        margin-bottom: 1rem;
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 0.25rem 0;
    }

    .page-header p {
        font-size: 1rem;
        color: #64748b;
        margin: 0;
    }

    /* Main data section */
    .detail-section {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    /* Data blocks */
    .detail-block {
        background: #f8fafc;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid #e2e8f0;
    }

    .detail-block h4 {
        font-size: 0.9rem;
        font-weight: 600;
        color: #4f46e5;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0 0 0.75rem 0;
    }

    .detail-block p {
        font-size: 1rem;
        color: #334155;
        margin: 0;
        line-height: 1.6;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-action {
        background-color: #4f46e5;
        color: #fff;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-action:hover {
        background-color: #4338ca;
        transform: translateY(-2px);
        color: #fff;
    }

    .btn-danger {
        background-color: #ef4444;
    }

    .btn-danger:hover {
        background-color: #dc2626;
    }

    .btn-secondary {
        background-color: #cbd5e1;
        color: #475569;
    }

    .btn-secondary:hover {
        background-color: #94a3b8;
        color: #fff;
    }

    /* --- Responsive design for mobile devices --- */
    @media (min-width: 768px) {
        .detail-section {
            grid-template-columns: repeat(2, 1fr);
        }

        .description-block {
            grid-column: 1 / -1; /* full width for description */
        }
    }
</style>

<div class="subject-page-container">
    <div class="content-card">
        <div class="page-header">
            <?php
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
            ?>
            <div class="page-header-icon"><?= $icon ?></div>
            <h1><?= Html::encode($model->name) ?></h1>
            <p>Subject details and information</p>
        </div>

        <div class="detail-section">
            <div class="detail-block">
                <h4>ID</h4>
                <p><?= Html::encode($model->id) ?></p>
            </div>

            <div class="detail-block">
                <h4>Created At</h4>
                <p><?= Yii::$app->formatter->asDatetime($model->created_at, 'php:d M Y, H:i') ?></p>
            </div>

            <div class="detail-block">
                <h4>Last Updated</h4>
                <p><?= Yii::$app->formatter->asDatetime($model->updated_at, 'php:d M Y, H:i') ?></p>
            </div>

            <div class="detail-block description-block">
                <h4>Description</h4>
                <p><?= nl2br(Html::encode($model->description ?: 'No description provided')) ?></p>
            </div>
        </div>

        <div class="action-buttons">
            <?= Html::a('<i class="fas fa-edit"></i> Edit', ['update', 'id' => $model->id], ['class' => 'btn-action']) ?>
            <?= Html::a('<i class="fas fa-trash-alt"></i> Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn-action btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<i class="fas fa-arrow-left"></i> Back to list', ['index'], ['class' => 'btn-action btn-secondary']) ?>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">