<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Заявка №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <div class="d-flex gap-3 align-items-center mb-3">
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-outline-primary']) ?>

        <h3 class="m-0"><?= Html::encode($this->title) ?></h3>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => $model->user->full_name,
            ],
            [
                'attribute' => 'service_id',
                'value' => $model->service->title,
            ],
            [
                'attribute' => 'date',
                'value' => Yii::$app->formatter->asDatetime($model->date, 'php: d.m.Y'),
            ],
            [
                'attribute' => 'time',
                'value' => Yii::$app->formatter->asDatetime($model->time, 'php: H:i'),
            ],
            [
                'attribute' => 'adress',
                'value' => $model->adress,
            ],
            [
                'visible' => (bool) $model->tool,
                'attribute' => 'tool_id',
                'value' => $model->tool?->title,
            ],
            [
                'attribute' => 'self_tool',
                'value' => $model->self_tool ? 'Да' : 'Нет',
            ],
            [
                'attribute' => 'pay_type_id',
                'value' => $model->payType->title,
            ],
            [
                'attribute' => 'status_id',
                'value' => $model->status->title,
            ],
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDatetime($model->created_at, 'php: d.m.Y H:i:s'),
            ],
            [
                'visible' => (bool) $model->feedback,
                'label' => 'Отзыв',
                'value' => $model->feedback?->comment,
            ],
            [
                'visible' => (bool) $model->cancelComment,
                'label' => 'Причина отмены',
                'value' => $model->cancelComment?->comment,
            ],
        ],
    ]) ?>

    <?= $model->status->alias == 'New' ? Html::a('Подтвердить', ['change-status', 'id' => $model->id, 'alias' => 'Accept'], ['class' => 'btn btn-outline-warning', 'data-method' => 'post']) : '' ?>
    <?= $model->status->alias == 'Accept' ? Html::a('В процессе', ['change-status', 'id' => $model->id, 'alias' => 'AtWork'], ['class' => 'btn btn-outline-warning', 'data-method' => 'post']) : '' ?>
    <?= $model->status->alias == 'AtWork' ? Html::a('Завершена', ['change-status', 'id' => $model->id, 'alias' => 'Finish'], ['class' => 'btn btn-outline-success', 'data-method' => 'post']) : '' ?>
    <?= $model->status->alias == 'New' ? Html::a('Отменить', ['cancel', 'id' => $model->id], ['class' => 'btn btn-outline-danger']) : '' ?>

</div>