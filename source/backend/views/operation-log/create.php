<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OperationLog */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Operation Log',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Operation Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
