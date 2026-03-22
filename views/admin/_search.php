<?php

use app\models\PayType;
use app\models\Status;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApplicationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="d-flex flex-wrap gap-1">
        <div class="d-flex flex-wrap gap-1">
            <?= $form->field($model, 'pay_type_id', ['options' => ['class' => 'm-0']])->label(false)->dropDownList(PayType::getPayTypes(), ['prompt' => 'Способ оплаты']) ?>
            <?= $form->field($model, 'status_id', ['options' => ['class' => 'm-0']])->label(false)->dropDownList(Status::getStatuses(), ['prompt' => 'Статус']) ?>
        </div>
        <div class="d-flex flex-wrap gap-1">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Сброс', 'index', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>