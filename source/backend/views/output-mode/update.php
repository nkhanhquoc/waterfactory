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
                        <span class="<?php if($model->getConvectionPump() == PUMP_ALL || $model->getConvectionPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Pump 1 Slave</span>
                    </li>
                    <li class="row50 border-top <?php if($model->getConvectionMode() == MANUAL_B1) echo 'active'; else echo ''; ?>" id="loadmode-3">
                        <span>Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-4">
                        <span class="<?php if($model->getConvectionPump() == PUMP_ALL || $model->getConvectionPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Pump 1 Master</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master pump</p>
                <select class="form-control row80">
                    <option <?php if($model->getConvectionTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getConvectionTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getConvectionTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getConvectionTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getConvectionTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Cold water supply Pump
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-5">
                        <span class="<?php if($model->getCwspMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-6">
                        <span class="<?php if($model->getCwspPump() == PUMP_ALL || $model->getCwspPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Pump 1</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-7">
                        <span class="<?php if($model->getCwspMode() == MANUAL_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-8">
                        <span class="<?php if($model->getCwspPump() == PUMP_ALL || $model->getCwspPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Pump 2</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master pump</p>
                <select class="form-control row80">
                    <option <?php if($model->getCwspTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getCwspTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getCwspTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getCwspTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getCwspTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">mins</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Return Pump
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-9">
                        <span class="<?php if($model->getReturnPumpMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-10">
                        <span class="<?php if($model->getReturnPumpPump() == PUMP_ALL || $model->getReturnPumpPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Pump 1</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-11">
                        <span class="<?php if($model->getReturnPumpMode() == MANUAL_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-12">
                        <span class="<?php if($model->getReturnPumpPump() == PUMP_ALL || $model->getReturnPumpPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Pump 2</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master pump</p>
                <select class="form-control row80">
                    <option <?php if($model->getReturnPumpTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getReturnPumpTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getReturnPumpTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getReturnPumpTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getReturnPumpTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Incresed pressure Pump
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-13">
                        <span class="<?php if($model->getPressurePumpMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-14">
                        <span class="<?php if($model->getPressurePumpPump() == PUMP_ALL || $model->getPressurePumpPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Pump 1 ON</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-15">
                        <span class="<?php if($model->getPressurePumpMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-16">
                        <span class="<?php if($model->getPressurePumpPump() == PUMP_ALL || $model->getPressurePumpPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Pump 2 ON</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master pump</p>
                <select class="form-control row80">
                    <option <?php if($model->getPressurePumpTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getPressurePumpTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getPressurePumpTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getPressurePumpTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getPressurePumpTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Heat Pump
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-17">
                        <span class="<?php if($model->getHeatPumpMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-18">
                        <span class="<?php if($model->getHeatPumpPump() == PUMP_ALL || $model->getHeatPumpPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Pump 1 Master</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-19">
                        <span class="<?php if($model->getHeatPumpMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-20">
                        <span class="<?php if($model->getHeatPumpPump() == PUMP_ALL || $model->getHeatPumpPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Pump 2 Master</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master pump</p>
                <select class="form-control row80">
                    <option <?php if($model->getHeatPumpTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getHeatPumpTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getHeatPumpTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getHeatPumpTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getHeatPumpTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Heater Resistor
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-21">
                        <span class="<?php if($model->getHeaterResisMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-22">
                        <span class="<?php if($model->getHeaterResisPump() == PUMP_ALL || $model->getHeaterResisPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Resistor 1 Master</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-23">
                        <span class="<?php if($model->getHeaterResisMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-24">
                        <span class="<?php if($model->getHeaterResisPump() == PUMP_ALL || $model->getHeaterResisPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Resistor 2 Master</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master Resistor</p>
                <select class="form-control row80">
                    <option <?php if($model->getHeaterResisTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getHeaterResisTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getHeaterResisTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getHeaterResisTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getHeaterResisTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Three way Valve
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-25">
                        <span class="<?php if($model->get3wayMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-26">
                        <span class="<?php if($model->get3wayPump() == PUMP_ALL || $model->get3wayPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Valve 1 Master</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-27">
                        <span class="<?php if($model->get3wayMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-28">
                        <span class="<?php if($model->get3wayPump() == PUMP_ALL || $model->get3wayPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Valve 2 Master</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master Valve</p>
                <select class="form-control row80">
                    <option  <?php if($model->get3wayTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option  <?php if($model->get3wayTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option  <?php if($model->get3wayTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option  <?php if($model->get3wayTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option  <?php if($model->get3wayTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

    <div class="border row row100">
        <div class="row20 params-left padding10">
            Blakflow Valve
        </div>
        <div class="row80 params-right border-left">
            <div class="row50 border-right">
                <ul class="mode-select">
                    <li class="row50" id="loadmode-29">
                        <span class="<?php if($model->getBlakflowMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Auto</span>
                    </li>
                    <li class="row50 border-left" id="loadmode-30">
                        <span class="<?php if($model->getBlakflowPump() == PUMP_ALL || $model->getBlakflowPump() == PUMP_SLAVE) echo 'active'; else echo ''; ?>">Valve 1 Master</span>
                    </li>
                    <li class="row50 border-top" id="loadmode-31">
                        <span class="<?php if($model->getBlakflowMode() == AUTO_B1) echo 'active'; else echo ''; ?>">Manual</span>
                    </li>
                    <li class="row50 border-left border-top" id="loadmode-32">
                        <span class="<?php if($model->getBlakflowPump() == PUMP_ALL || $model->getBlakflowPump() == PUMP_MASTER) echo 'active'; else echo ''; ?>">Valve 2 Master</span>
                    </li>
                </ul>
            </div>
            <div class="row50 padding10">
                <p>Time wait for master Valve</p>
                <select class="form-control row80">
                    <option <?php if($model->getBlakflowTime() == 1) echo 'selected="selected"'; ?>>1</option>
                    <option <?php if($model->getBlakflowTime() == 2) echo 'selected="selected"'; ?>>2</option>
                    <option <?php if($model->getBlakflowTime() == 3) echo 'selected="selected"'; ?>>3</option>
                    <option <?php if($model->getBlakflowTime() == 4) echo 'selected="selected"'; ?>>4</option>
                    <option <?php if($model->getBlakflowTime() == 5) echo 'selected="selected"'; ?>>5</option>
                </select>
                <span class="row20">min</span>
            </div>
        </div>
    </div>

  </div>

  <div class="row100">
      <input type="button" class="btn btn-primary" value="Send" />
      <input type="button" class="btn btn-primary" value="Send to Module" />
      <a href="#" class="btn btn-primary">Cancel</a>
  </div>
</div>
