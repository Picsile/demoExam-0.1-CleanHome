<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form w-50">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($feedback, 'comment')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить отзыв', ['class' => 'btn w-100 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>