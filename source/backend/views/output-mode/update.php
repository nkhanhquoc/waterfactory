<?php

use yii;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutputMode */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
            'modelClass' => 'Output Mode',
        ]) . ' ' . \yii\helpers\Html::encode($model->module->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['/modules/view?id=' . $model->module->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Output Modes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="output-mode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?> -->
    <form id="update-output-mode" method="post" action="/index.php/output-mode/update?id=<?php echo $model->id ?>">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
        <div class="params">
            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Convection Pump
                </div>
                <input type="hidden" id="convection_pump_mode" name="OutputMode[convection_pump][mode]" value="<?php echo $model->getConvectionMode() ?>">
                <input type="hidden" id="convection_pump_pump" name="OutputMode[convection_pump][pump]" value="<?php echo $model->getConvectionPump() ?>">
                <input type="hidden" id="convection_pump_time" name="OutputMode[convection_pump][time]" value="<?php echo $model->getConvectionTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-1">
                                <span id="convection_pump_auto" onclick="setPumpMode('convection_pump', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getConvectionMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-2">
                                <span id="convection_pump_slave" onclick="setPumpPump('convection_pump', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getConvectionPump() == PUMP_ALL || $model->getConvectionPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 1 Slave</span>
                            </li>
                            <li class="row50 border-top <?php
                            if ($model->getConvectionMode() == MANUAL_B1)
                                echo 'active';
                            else
                                echo '';
                            ?>" id="loadmode-3">
                                <span id="convection_pump_manual" onclick="setPumpMode('convection_pump', '<?php echo MANUAL_B1 ?>')">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-4">
                                <span id="convection_pump_master" onclick="setPumpPump('convection_pump', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getConvectionPump() == PUMP_ALL || $model->getConvectionPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 1 Master</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master pump</p>
                        <select class="form-control row80" id="convection_pump_select" onchange="changePumpTime('convection_pump')" <?php if ($model->getConvectionMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getConvectionTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getConvectionTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getConvectionTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getConvectionTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getConvectionTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getConvectionTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Cold water supply Pump
                </div>
                <input type="hidden" id="cwsp_pump_mode" name="OutputMode[cwsp_pump][mode]" value="<?php echo $model->getCwspMode() ?>">
                <input type="hidden" id="cwsp_pump_pump" name="OutputMode[cwsp_pump][pump]" value="<?php echo $model->getCwspPump() ?>">
                <input type="hidden" id="cwsp_pump_time" name="OutputMode[cwsp_pump][time]" value="<?php echo $model->getCwspTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-5">
                                <span id="cwsp_pump_auto" onclick="setPumpMode('cwsp_pump', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getCwspMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-6">
                                <span id="cwsp_pump_slave" onclick="setPumpPump('cwsp_pump', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getCwspPump() == PUMP_ALL || $model->getCwspPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 1</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-7">
                                <span id="cwsp_pump_manual" onclick="setPumpMode('cwsp_pump', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getCwspMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-8">
                                <span id="cwsp_pump_master" onclick="setPumpPump('cwsp_pump', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getCwspPump() == PUMP_ALL || $model->getCwspPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 2</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master pump</p>
                        <select class="form-control row80" id="cwsp_pump_select" onchange="changePumpTime('cwsp_pump')" <?php if ($model->getCwspMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getCwspTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getCwspTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getCwspTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getCwspTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getCwspTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getCwspTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">mins</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Return Pump
                </div>
                <input type="hidden" id="return_pump_mode" name="OutputMode[return_pump][mode]" value="<?php echo $model->getReturnPumpMode() ?>">
                <input type="hidden" id="return_pump_pump" name="OutputMode[return_pump][pump]" value="<?php echo $model->getReturnPumpPump() ?>">
                <input type="hidden" id="return_pump_time" name="OutputMode[return_pump][time]" value="<?php echo $model->getReturnPumpTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-9">
                                <span id="return_pump_auto" onclick="setPumpMode('return_pump', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getReturnPumpMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-10">
                                <span id="return_pump_slave" onclick="setPumpPump('return_pump', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getReturnPumpPump() == PUMP_ALL || $model->getReturnPumpPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 1</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-11">
                                <span id="return_pump_manual" onclick="setPumpMode('return_pump', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getReturnPumpMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-12">
                                <span id="return_pump_master" onclick="setPumpPump('return_pump', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getReturnPumpPump() == PUMP_ALL || $model->getReturnPumpPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 2</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master pump</p>
                        <select class="form-control row80" id="return_pump_select" onchange="changePumpTime('return_pump')" <?php if ($model->getReturnPumpMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getReturnPumpTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getReturnPumpTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getReturnPumpTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getReturnPumpTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getReturnPumpTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getReturnPumpTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Incresed pressure Pump
                </div>
                <input type="hidden" id="pressure_pump_mode" name="OutputMode[pressure_pump][mode]" value="<?php echo $model->getPressurePumpMode() ?>">
                <input type="hidden" id="pressure_pump_pump" name="OutputMode[pressure_pump][pump]" value="<?php echo $model->getPressurePumpPump() ?>">
                <input type="hidden" id="pressure_pump_time" name="OutputMode[pressure_pump][time]" value="<?php echo $model->getPressurePumpTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-13">
                                <span id="pressure_pump_auto" onclick="setPumpMode('pressure_pump', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getPressurePumpMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-14">
                                <span id="pressure_pump_slave" onclick="setPumpPump('pressure_pump', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getPressurePumpPump() == PUMP_ALL || $model->getPressurePumpPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 1 ON</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-15">
                                <span id="pressure_pump_manual" onclick="setPumpMode('pressure_pump', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getPressurePumpMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-16">
                                <span id="pressure_pump_master" onclick="setPumpPump('pressure_pump', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getPressurePumpPump() == PUMP_ALL || $model->getPressurePumpPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 2 ON</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master pump</p>
                        <select class="form-control row80" id="pressure_pump_select" onchange="changePumpTime('pressure_pump')" <?php if ($model->getPressurePumpMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getPressurePumpTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getPressurePumpTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getPressurePumpTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getPressurePumpTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getPressurePumpTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getPressurePumpTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Heat Pump
                </div>
                <input type="hidden" id="heat_pump_mode" name="OutputMode[heat_pump][mode]" value="<?php echo $model->getHeatPumpMode() ?>">
                <input type="hidden" id="heat_pump_pump" name="OutputMode[heat_pump][pump]" value="<?php echo $model->getHeatPumpPump() ?>">
                <input type="hidden" id="heat_pump_time" name="OutputMode[heat_pump][time]" value="<?php echo $model->getHeatPumpTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-17">
                                <span id="heat_pump_auto" onclick="setPumpMode('heat_pump', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getHeatPumpMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-18">
                                <span id="heat_pump_slave" onclick="setPumpPump('heat_pump', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getHeatPumpPump() == PUMP_ALL || $model->getHeatPumpPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 1 Master</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-19">
                                <span id="heat_pump_manual" onclick="setPumpMode('heat_pump', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getHeatPumpMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-20">
                                <span id="heat_pump_master" onclick="setPumpPump('heat_pump', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getHeatPumpPump() == PUMP_ALL || $model->getHeatPumpPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Pump 2 Master</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master pump</p>
                        <select class="form-control row80" id="heat_pump_select" onchange="changePumpTime('heat_pump')" <?php if ($model->getHeatPumpMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getHeatPumpTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getHeatPumpTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getHeatPumpTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getHeatPumpTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getHeatPumpTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getHeatPumpTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Heater Resistor
                </div>
                <input type="hidden" id="heater_resis_mode" name="OutputMode[heater_resis][mode]" value="<?php echo $model->getHeaterResisMode() ?>">
                <input type="hidden" id="heater_resis_pump" name="OutputMode[heater_resis][pump]" value="<?php echo $model->getHeaterResisPump() ?>">
                <input type="hidden" id="heater_resis_time" name="OutputMode[heater_resis][time]" value="<?php echo $model->getHeaterResisTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-21">
                                <span id="heater_resis_auto" onclick="setPumpMode('heater_resis', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getHeaterResisMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-22">
                                <span id="heater_resis_slave" onclick="setPumpPump('heater_resis', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getHeaterResisPump() == PUMP_ALL || $model->getHeaterResisPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Resistor 1 Master</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-23">
                                <span id="heater_resis_manual" onclick="setPumpMode('heater_resis', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getHeaterResisMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-24">
                                <span id="heater_resis_master" onclick="setPumpPump('heater_resis', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getHeaterResisPump() == PUMP_ALL || $model->getHeaterResisPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Resistor 2 Master</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master Resistor</p>
                        <select class="form-control row80" id="heater_resis_select" onchange="changePumpTime('heater_resis')" <?php if ($model->getHeaterResisMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getHeaterResisTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getHeaterResisTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getHeaterResisTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getHeaterResisTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getHeaterResisTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getHeaterResisTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Three way Valve
                </div>
                <input type="hidden" id="3way_mode" name="OutputMode[3way][mode]" value="<?php echo $model->get3wayMode() ?>">
                <input type="hidden" id="3way_pump" name="OutputMode[3way][pump]" value="<?php echo $model->get3wayPump() ?>">
                <input type="hidden" id="3way_time" name="OutputMode[3way][time]" value="<?php echo $model->get3wayTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-25">
                                <span id="3way_auto" onclick="setPumpMode('3way', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->get3wayMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-26">
                                <span id="3way_slave" onclick="setPumpPump('3way', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->get3wayPump() == PUMP_ALL || $model->get3wayPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Valve 1 Master</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-27">
                                <span id="3way_manual" onclick="setPumpMode('3way', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->get3wayMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-28">
                                <span id="3way_master" onclick="setPumpPump('3way', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->get3wayPump() == PUMP_ALL || $model->get3wayPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Valve 2 Master</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master Valve</p>
                        <select class="form-control row80" id="3way_select" onchange="changePumpTime('3way')" <?php if ($model->get3wayMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->get3wayTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option  <?php if ($model->get3wayTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option  <?php if ($model->get3wayTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option  <?php if ($model->get3wayTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option  <?php if ($model->get3wayTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option  <?php if ($model->get3wayTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Blakflow Valve
                </div>
                <input type="hidden" id="blakflow_mode" name="OutputMode[blakflow][mode]" value="<?php echo $model->getBlakflowMode() ?>">
                <input type="hidden" id="blakflow_pump" name="OutputMode[blakflow][pump]" value="<?php echo $model->getBlakflowPump() ?>">
                <input type="hidden" id="blakflow_time" name="OutputMode[blakflow][time]" value="<?php echo $model->getBlakflowTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-29">
                                <span id="3blakflow_auto" onclick="setPumpMode('blakflow', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getBlakflowMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-30">
                                <span id="blakflow_slave" onclick="setPumpPump('blakflow', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getBlakflowPump() == PUMP_ALL || $model->getBlakflowPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Valve 1 Master</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-31">
                                <span id="blakflow_manual" onclick="setPumpMode('blakflow', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getBlakflowMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-32">
                                <span id="blakflow_master" onclick="setPumpPump('blakflow', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getBlakflowPump() == PUMP_ALL || $model->getBlakflowPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Valve 2 Master</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master Valve</p>
                        <select class="form-control row80" id="blakflow_select" onchange="changePumpTime('blakflow')" <?php if ($model->getBlakflowMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getBlakflowTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getBlakflowTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getBlakflowTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getBlakflowTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getBlakflowTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getBlakflowTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Reserved
                </div>
                <input type="hidden" id="reserved_mode" name="OutputMode[reserved][mode]" value="<?php echo $model->getReservedMode() ?>">
                <input type="hidden" id="reserved_pump" name="OutputMode[reserved][pump]" value="<?php echo $model->getReservedPump() ?>">
                <input type="hidden" id="reserved_time" name="OutputMode[reserved][time]" value="<?php echo $model->getReservedTime() ?>">
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <ul class="mode-select">
                            <li class="row50" id="loadmode-33">
                                <span id="reserved_auto" onclick="setPumpMode('reserved', '<?php echo AUTO_B1 ?>')" class="<?php
                                if ($model->getReservedMode() == AUTO_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Auto</span>
                            </li>
                            <li class="row50 border-left" id="loadmode-34">
                                <span id="reserved_slave" onclick="setPumpPump('reserved', '<?php echo PUMP_SLAVE ?>')" class="<?php
                                if ($model->getReservedPump() == PUMP_ALL || $model->getReservedPump() == PUMP_SLAVE)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Valve 1 Master</span>
                            </li>
                            <li class="row50 border-top" id="loadmode-35">
                                <span id="reserved_manual" onclick="setPumpMode('reserved', '<?php echo MANUAL_B1 ?>')" class="<?php
                                if ($model->getReservedMode() == MANUAL_B1)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Manual</span>
                            </li>
                            <li class="row50 border-left border-top" id="loadmode-36">
                                <span id="reserved_master" onclick="setPumpPump('reserved', '<?php echo PUMP_MASTER ?>')" class="<?php
                                if ($model->getReservedPump() == PUMP_ALL || $model->getReservedPump() == PUMP_MASTER)
                                    echo 'active';
                                else
                                    echo '';
                                ?>">Valve 2 Master</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row50 padding10">
                        <p>Time wait for master Valve</p>
                        <select class="form-control row80" id="reserved_select" onchange="changePumpTime('reserved')" <?php if ($model->getReservedMode() == MANUAL_B1) echo 'disabled' ?>>
                            <option <?php if ($model->getReservedTime() == 0) echo 'selected="selected"'; ?>>0</option>
                            <option <?php if ($model->getReservedTime() == 1) echo 'selected="selected"'; ?>>1</option>
                            <option <?php if ($model->getReservedTime() == 2) echo 'selected="selected"'; ?>>2</option>
                            <option <?php if ($model->getReservedTime() == 3) echo 'selected="selected"'; ?>>3</option>
                            <option <?php if ($model->getReservedTime() == 4) echo 'selected="selected"'; ?>>4</option>
                            <option <?php if ($model->getReservedTime() == 5) echo 'selected="selected"'; ?>>5</option>
                        </select>
                        <span class="row20">min</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row100">
            <input type="submit" class="btn btn-primary"/>
            <!-- <input type="button" class="btn btn-primary" value="Send to Module" /> -->
            <a href="#" class="btn btn-primary">Cancel</a>
        </div>
    </form>
</div>
