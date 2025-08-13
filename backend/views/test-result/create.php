<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TestResult $model */

$this->title = 'Create Test Result';
$this->params['breadcrumbs'][] = ['label' => 'Test Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
