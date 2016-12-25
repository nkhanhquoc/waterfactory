<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ConfigurationLog */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Configuration Log',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Configuration Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
