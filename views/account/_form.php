<?php

use app\models\PayType;
use app\models\Service;
use app\models\Tool;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form w-50">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_id')->dropDownList(Service::getServices(), ['prompt' => 'Выберите тип услуги']) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'time')->textInput(['type' => 'time']) ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'tool_id')->dropDownList(Tool::getTools(), ['prompt' => 'Выберите средств для уборки']) ?>

    <?= $form->field($model, 'self_tool')->checkbox() ?>

    <?= $form->field($model, 'pay_type_id')->dropDownList(PayType::getPayTypes(), ['prompt' => 'Выберите способ оплаты']) ?>

    <?= $form->field($model, 'rule')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn w-100 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJsFile('/js/create.js', ['depends' => JqueryAsset::class]) ?>