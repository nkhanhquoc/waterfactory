<?php

use backend\models\ConfigurationLogSearch;
use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use yii\web\View;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;

/* @var $this View */
/* @var $model ConfigurationLogSearch */
/* @var $form ActiveForm */
?>

<div class="configuration-log-search">

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
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
