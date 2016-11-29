<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Modules */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Modules',
]) . ' ' . $model->getModuleId() . ' - ' . \yii\helpers\Html::encode($model->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="modules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
