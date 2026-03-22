<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Формирование заявки';
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>