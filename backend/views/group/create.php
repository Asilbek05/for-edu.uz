<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Group $model */

// Bu fayl faqatgina modal ichida render qilinadi.
// Shuning uchun sarlavha va breadcrumbs kerak emas.

?>
<div class="group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>