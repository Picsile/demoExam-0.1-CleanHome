<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <h3><?= Html::encode($this->title) ?></h3>

            <?= $form->field($model, 'full_name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'login') ?>

            <?= $form->field($model, 'password') ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '+7(999)-999-99-99',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn w-100 btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <div class="mb-3">
                <span>Уже есть аккаунт? 👉</span>
                <?= Html::a('Войти', 'login') ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>