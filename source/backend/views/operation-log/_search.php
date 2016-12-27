<?php

use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OperationLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-log-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?=
    Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [
            'fromDate' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => DateTimePicker::className(),
                'label' => 'From date',
                'options' => [
                    'value' => date('Y-m-d', strtotime('-1 days')),
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ],
            'toDate' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => DateTimePicker::className(),
                'label' => 'To date',
                'options' => [
                    'value' => date('Y-m-d', strtotime('-1 days')),
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
