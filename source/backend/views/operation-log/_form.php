<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OperationLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-log-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'module_id')->textInput() ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
