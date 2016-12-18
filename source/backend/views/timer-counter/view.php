<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TimerCounter */
$idModule = $model->module->country->code . $model->module->privincial->code . $model->module->distric->code . $model->module->customer_code;
$this->title = $idModule . ' - ' . $model->module->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Timer Counters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timer-counter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'ID',
                'value' => $idModule,
            ],
            'module.name',
            'counter',
            'timer_1',
            'timer_2',
            'timer_3',
        ],
    ])
    ?>
    <p>
        <?= Html::a(Yii::t('backend', 'Setting'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
