<?php

use common\models\Subject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SubjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fanlar ro\'yxati';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .subject-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
        position: relative;
    }

    .subject-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffeaa7);
        background-size: 300% 300%;
        animation: gradientShift 3s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .card-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .subject-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        margin-right: 15px;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .subject-name {
        font-weight: 700;
        color: #2d3436;
        font-size: 16px;
        margin-bottom: 5px;
        text-decoration: none;
    }

    .subject-description {
        color: #636e72;
        font-size: 13px;
        line-height: 1.4;
    }

    .table-modern {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .table-modern thead th {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border: none;
        color: #495057;
        font-weight: 600;
        padding: 20px 15px;
        position: relative;
    }

    .table-modern tbody tr {
        transition: all 0.3s ease;
        border: none;
    }

    .table-modern tbody tr:hover {
        background-color: #f8f9ff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .table-modern tbody td {
        border: none;
        padding: 20px 15px;
        vertical-align: middle;
    }

    .action-btn {
        display: inline-block;
        padding: 8px 15px;
        margin: 0 3px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-view {
        background: linear-gradient(135deg, #74b9ff, #0984e3);
        color: white;
        box-shadow: 0 4px 15px rgba(116, 185, 255, 0.4);
    }

    .btn-view:hover {
        background: linear-gradient(135deg, #0984e3, #74b9ff);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(116, 185, 255, 0.6);
        color: white;
        text-decoration: none;
    }

    .btn-edit {
        background: linear-gradient(135deg, #55a3ff, #003d82);
        color: white;
        box-shadow: 0 4px 15px rgba(85, 163, 255, 0.4);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #003d82, #55a3ff);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(85, 163, 255, 0.6);
        color: white;
        text-decoration: none;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ff7675, #d63031);
        color: white;
        box-shadow: 0 4px 15px rgba(255, 118, 117, 0.4);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #d63031, #ff7675);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 118, 117, 0.6);
        color: white;
        text-decoration: none;
    }

    .create-btn {
        background: linear-gradient(135deg, #00b894, #00a085);
        border: none;
        border-radius: 12px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 184, 148, 0.3);
    }

    .create-btn:hover {
        background: linear-gradient(135deg, #00a085, #00b894);
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 184, 148, 0.4);
        color: white;
        text-decoration: none;
    }

    .stats-badge {
        background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
        color: #2d3436;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #636e72;
    }

    .empty-state-icon {
        font-size: 64px;
        color: #ddd;
        margin-bottom: 20px;
    }

    .page-title {
        color: #2d3436;
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 28px;
    }

    .page-subtitle {
        color: #636e72;
        font-size: 16px;
        margin-bottom: 30px;
    }

    .filter-section {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="subject-index">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="page-title">📚 Fanlar ro'yxati</h1>
                    <p class="page-subtitle">O'quv markazi fanlarini boshqaring va yangi fanlar qo'shing</p>
                </div>
                <div>
                    <?= Html::a('
                        <i class="fas fa-plus"></i>
                        Yangi fan qo\'shish
                    ', ['create'], ['class' => 'create-btn']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="subject-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1" style="color: #2d3436; font-weight: 600;">
                            <i class="fas fa-graduation-cap me-2" style="color: #667eea;"></i>
                            Barcha fanlar
                        </h5>
                        <p class="mb-0" style="color: #636e72; font-size: 14px;">
                            Jami <?= $dataProvider->totalCount ?> ta fan mavjud
                        </p>
                    </div>
                    <span class="stats-badge">
                        <i class="fas fa-chart-bar"></i> <?= $dataProvider->totalCount ?> ta fan
                    </span>
                </div>

                <div class="card-body p-0">
                    <?php if ($dataProvider->totalCount > 0): ?>
                        <div class="table-modern">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'summary' => false,
                                'tableOptions' => [
                                    'class' => 'table table-modern mb-0'
                                ],
                                'columns' => [
                                    [
                                        'attribute' => 'name',
                                        'label' => 'Fan nomi va tavsifi',
                                        'format' => 'raw',
                                        'headerOptions' => ['style' => 'width: 40%;'],
                                        'value' => function ($model) {
                                            $icons = [
                                                'Matematika' => '🔢',
                                                'Fizika' => '⚛️',
                                                'Kimyo' => '🧪',
                                                'Biologiya' => '🧬',
                                                'Ingliz tili' => '🇬🇧',
                                                'Rus tili' => '🇷🇺',
                                                'Tarix' => '📜',
                                                'Geografiya' => '🌍',
                                                'Adabiyot' => '📖',
                                            ];

                                            $icon = $icons[$model->name] ?? '📚';

                                            return '
                                                <div class="d-flex align-items-center">
                                                    <div class="subject-icon">
                                                        ' . $icon . '
                                                    </div>
                                                    <div>
                                                        <div class="subject-name">' . Html::encode($model->name) . '</div>
                                                        <div class="subject-description">' . Html::encode($model->description ?: 'Tavsif mavjud emas') . '</div>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    ],
                                    [
                                        'attribute' => 'created_at',
                                        'label' => 'Yaratilgan sana',
                                        'format' => 'raw',
                                        'headerOptions' => ['class' => 'text-center', 'style' => 'width: 20%;'],
                                        'contentOptions' => ['class' => 'text-center'],
                                        'value' => function ($model) {
                                            $date = Yii::$app->formatter->asDate($model->created_at);
                                            return '<div style="color: #636e72; font-weight: 500;">' . $date . '</div>';
                                        }
                                    ],
                                    [
                                        'attribute' => 'updated_at',
                                        'label' => 'Yangilangan sana',
                                        'format' => 'raw',
                                        'headerOptions' => ['class' => 'text-center', 'style' => 'width: 20%;'],
                                        'contentOptions' => ['class' => 'text-center'],
                                        'value' => function ($model) {
                                            $date = Yii::$app->formatter->asDate($model->updated_at);
                                            return '<div style="color: #636e72; font-weight: 500;">' . $date . '</div>';
                                        }
                                    ],
                                    [
                                        'class' => ActionColumn::className(),
                                        'template' => '{view} {update} {delete}',
                                        'headerOptions' => ['class' => 'text-center', 'style' => 'width: 20%;'],
                                        'contentOptions' => ['class' => 'text-center'],
                                        'buttons' => [
                                            'view' => function ($url, $model, $key) {
                                                return Html::a(
                                                    '<i class="fas fa-eye"></i> Ko\'rish',
                                                    Url::to(['view', 'id' => $model->id]),
                                                    ['class' => 'action-btn btn-view']
                                                );
                                            },
                                            'update' => function ($url, $model, $key) {
                                                return Html::a(
                                                    '<i class="fas fa-edit"></i> Tahrirlash',
                                                    Url::to(['update', 'id' => $model->id]),
                                                    ['class' => 'action-btn btn-edit']
                                                );
                                            },
                                            'delete' => function ($url, $model, $key) {
                                                return Html::a(
                                                    '<i class="fas fa-trash"></i> O\'chirish',
                                                    Url::to(['delete', 'id' => $model->id]),
                                                    [
                                                        'class' => 'action-btn btn-delete',
                                                        'data-confirm' => 'Haqiqatan ham bu fanni o\'chirmoqchimisiz?',
                                                        'data-method' => 'post',
                                                    ]
                                                );
                                            },
                                        ]
                                    ],
                                ],
                            ]); ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">📚</div>
                            <h4>Hozircha fanlar mavjud emas</h4>
                            <p>O'quv markazingiz uchun birinchi fanni qo'shishdan boshlang</p>
                            <?= Html::a('
                                <i class="fas fa-plus"></i>
                                Birinchi fanni qo\'shish
                            ', ['create'], ['class' => 'create-btn mt-3']) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.table-modern tbody tr');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            setTimeout(() => {
                row.style.transition = 'all 0.5s ease';
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>