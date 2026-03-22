<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Отмена заявки №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заявка №' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="application-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form_cancel', [
        'model' => $model,
        'cancelComment' => $cancelComment,
    ]) ?>

</div>