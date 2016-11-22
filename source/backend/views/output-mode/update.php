<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutputMode */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Output Mode',
]) . ' ' . $model->module->name.", ID: ".$model->module->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Output Modes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="output-mode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <?= $this->render('_form', [
        'model' => $model,
    ]) ?> -->
    <div class="params">
    <div class="border row row100">
        <div class="row20 params-left padding10">
            Convection Pump
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-1">
                        <span class="<?php if($model->getConvectionMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                        <input type="hidden" name="OutputMode[convection_pump][mode]" value="<?php echo $model->getConvectionMode() ?>">
                    </li>
                    <li class="row50 border-left" id="loadmode-2">
                        <span>Pump 1 Slave</span>
                    </li>
                    <li class="row50 border-top <?php if($model->getConvectionMode() == MANUAL_B1) echo 'active'; else echo ''; ?>" id="loadmode-3">
                        <span>Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-4">
                        <span>Pump 1 Master</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master pump</p>
                <select class="form-control row80">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

  </div>
</div>
