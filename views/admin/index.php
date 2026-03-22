<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\ApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php Pjax::begin(); ?>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 my-3">
        <div class="d-flex flex-wrap align-items-center gap-1">
            <?= $dataProvider->sort->link('id') . ' | ' ?>
            <?= $dataProvider->sort->link('date') . ' | ' ?>
            <?= $dataProvider->sort->link('time') . ' | ' ?>
            <?= $dataProvider->sort->link('created_at') ?>
        </div>

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => LinkPager::class,
        ],
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
    ]) ?>

    <?php Pjax::end(); ?>

</div>