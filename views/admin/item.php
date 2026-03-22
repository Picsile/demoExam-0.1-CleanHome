<?php

use yii\bootstrap5\Html;

/** @var app\models\Application $model */
?>
<div class="card my-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Заявка № <?= $model->id ?></h5>
        <?= Html::a('Просмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?>
    </div>
    <div class="card-body">
        <div class="border-top py-1">
            <span class="fw-bold">ФИО:</span>
            <span><?= $model->user->full_name ?></span>
        </div>

        <div class="border-top py-1">
            <span class="fw-bold">Тип услуги:</span>
            <span><?= $model->service->title ?></span>
        </div>

        <div class="border-top py-1">
            <span class="fw-bold">Дата и время:</span>
            <span><?= Yii::$app->formatter->asDatetime($model->date, 'php:d.m.Y') ?> <?= Yii::$app->formatter->asDatetime($model->time, 'php:H:i') ?></span>
        </div>

        <div class="border-top py-1">
            <span class="fw-bold">Адрес:</span>
            <span><?= $model->adress ?></span>
        </div>

        <?php if ($model->tool): ?>
            <div class="border-top py-1">
                <span class="fw-bold">Инструмент:</span>
                <span><?= $model->tool->title ?></span>
            </div>
        <?php endif; ?>

        <div class="border-top py-1">
            <span class="fw-bold">Свой инструмент:</span>
            <span><?= $model->self_tool ? 'Да' : 'Нет' ?></span>
        </div>

        <div class="border-top py-1">
            <span class="fw-bold">Оплата:</span>
            <span><?= $model->payType->title ?></span>
        </div>

        <?php if ($model->feedback): ?>
            <div class="border-top py-1">
                <span class="fw-bold">Отзыв:</span>
                <span> <?= $model->feedback->comment ?></span>
            </div>
        <?php endif; ?>

        <?php if ($model->cancelComment): ?>
            <div class="border-top py-1">
                <span class="fw-bold">Отказ:</span>
                <span><?= $model->cancelComment->comment ?></span>
            </div>
        <?php endif; ?>

        <div class="border-top py-1">
            <span class="fw-bold">Статус:</span>
            <span><?= $model->status->title ?></span>
        </div>

        <div class="border-top pt-3">
            <?= $model->status->alias == 'New' ? Html::a('Подтвердить', ['change-status', 'id' => $model->id, 'alias' => 'Accept'], ['class' => 'btn btn-outline-warning', 'data-method' => 'post']) : '' ?>
            <?= $model->status->alias == 'Accept' ? Html::a('В процессе', ['change-status', 'id' => $model->id, 'alias' => 'AtWork'], ['class' => 'btn btn-outline-warning', 'data-method' => 'post']) : '' ?>
            <?= $model->status->alias == 'AtWork' ? Html::a('Завершена', ['change-status', 'id' => $model->id, 'alias' => 'Finish'], ['class' => 'btn btn-outline-success', 'data-method' => 'post']) : '' ?>
            <?= $model->status->alias == 'New' ? Html::a('Отменить', ['cancel', 'id' => $model->id], ['class' => 'btn btn-outline-danger']) : '' ?>
        </div>

    </div>
</div>