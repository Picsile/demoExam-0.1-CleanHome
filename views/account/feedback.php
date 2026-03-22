<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Отзыв на заявку №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заявки №' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Отзыв';
?>
<div class="application-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form_feedback', [
        'model' => $model,
        'feedback' => $feedback,
    ]) ?>

</div>