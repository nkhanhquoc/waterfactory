<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ParamConfig */

$idModule = $model->module->country->code . $model->module->privincial->code . $model->module->distric->code . $model->module->customer_code;
$this->title = $idModule . ' - ' . $model->module->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['/modules/view?id=' . $model->module->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Param Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="param-config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?> -->


        <div class="params">
            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Convection Pump
                </div>
                <div class="row80 params-right border-left">
                    <div class="row80 padding10">
                        <p class="title">Temperature range to turn on the Pump</p>
                        <i>(Temperature difference between Solar panels and Solar tank)</i>
                    </div>
                    <div class="row20 padding10">
                        <select class="form-control row80" name="convection_pump" disabled="disabled">
                                <option value="<?php echo $model->getConvectionTemp() ?>" ><?php echo $model->getConvectionTemp() ?></option>
                        </select>
                        <span class="row20">&#8451;</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Cold water supply Pump
                </div>
                <div class="row80 params-right border-left">
                    <div class="row50 border-right">
                        <div class="row100 border-bottom padding10">
                            <div class="row60">Water level M1</div>
                            <div class="row40">
                                <select class="form-control row80" name="cold_water_supply_pump_lv1" disabled="disabled">
                                        <option value="<?php echo $model->getCwsplv1() ?>" <?php echo $model->getCwsplv1() ?></option>

                                </select>
                                <span class="row20">&#8451;</span>
                            </div>
                        </div>
                        <div class="row100 padding10">
                            <div class="row60">Water level M2</div>
                            <div class="row40">
                                <select class="form-control row80" name="cold_water_supply_pump_lv2" disabled="disabled">
                                        <option value="<?php echo $model->getCwsplv2() ?>" ><?php echo $model->getCwsplv2() ?></option>

                                </select>
                                <span class="row20">&#8451;</span>
                            </div>
                        </div>
                    </div>
                    <div class="row50 padding10">
                        <p>Pump ON when water level lower than M2 and OFF when water level upper than M1</p>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Return Pump
                </div>
                <div class="row80 params-right border-left">
                    <div class="row100 border-bottom">
                        <div class="row50 border-right padding10">
                            <div class="row60">Begin time ilde (hh:mm)</div>
                            <div class="row20">
                                <select class="form-control" name="return_pump_t1_start" disabled="disabled">

                                        <option value="<?php echo $model->getReturnPumpT1Start() ?>" ><?php echo $model->getReturnPumpT1Start(); ?></option>

                                </select>
                            </div>
                            <div class="row20">
                                <select class="form-control" name="return_pump_t2_start" disabled="disabled">

                                        <option value="<?php echo $model->getReturnPumpT2Start(); ?>" ><?php echo $model->getReturnPumpT2Start(); ?></option>

                                </select>
                            </div>
                        </div>
                        <div class="row50 padding10">
                            <div class="row60">End time ilde (hh:mm)</div>
                            <div class="row20">
                                <select class="form-control" name="return_pump_t1_end" disabled="disabled">

                                        <option value="<?php echo $model->getReturnPumpT1End(); ?>"><?php echo $model->getReturnPumpT1End(); ?></option>

                                </select>
                            </div>
                            <div class="row20">
                                <select class="form-control" name="return_pump_t2_end" disabled="disabled">

                                        <option value="<?php echo $model->getReturnPumpT2End(); ?>"><?php echo $model->getReturnPumpT2End(); ?></option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row100 padding10 border-bottom">
                        <div class="row80 padding10">
                            <p class="title">Temperature range to turn on the Pump</p>
                            <i>(Temperature difference between Heater tank and pipeline)</i>
                        </div>
                        <div class="row20 padding10">
                            <select class="form-control row80" name="return_pump_delta_t" disabled="disabled">
                                    <option value="<?php echo $model->getReturnPumpDeltat() ?>"><?php echo $model->getReturnPumpDeltat() ?></option>
                            </select>
                            <span class="row20">&#8451;</span>
                        </div>
                    </div>
                    <div class="row100 padding10">
                        <p>Pump ON when time out of Begin time and End time, and the temperature between Heater tank and pipeline upper than range</p>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Incresed pressure Pump
                </div>
                <div class="row80 params-right border-left">
                    <div class="row80 padding10">
                        <p class="title">Pressure value to turn on the Pump</p>
                        <i>(Pump ON when pressure in pipeline lower than this value)</i>
                    </div>
                    <div class="row20 padding10">
                        <select class="form-control row80" name="pressure_pump_p1" disabled="disabled">
                                <option value="<?php echo $model->getPressurePumpP1() ?>"><?php echo $model->getPressurePumpP1() ?></option>
                        </select>
                        <span class="row20">Psi</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Heat Pump
                </div>
                <div class="row80 params-right border-left">
                    <div class="row80 padding10">
                        <p class="title">Temperature value to turn on the Pump</p>
                        <i>(Pump ON when temperqature in the Heater tank lower than this value)</i>
                    </div>
                    <div class="row20 padding10">
                        <select class="form-control row80" name="heat_pump_t1" disabled="disabled">
                                <option value="<?php echo $model->getHeatPumpT1() ?>" ><?php echo $model->getHeatPumpT1() ?></option>
                        </select>
                        <span class="row20">&#8451;</span>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Heat Resistor
                </div>
                <div class="row80 params-right border-left">
                    <div class="row100 border-bottom">
                        <div class="row80 padding10">
                            <p class="title">Temperature value to turn on Resistor 1</p>
                            <i>(R1 ON when temperature in the Heater tank lower than this value)</i>
                        </div>
                        <div class="row20 padding10">
                            <select class="form-control row80" name="heater_resis_t1" disabled="disabled">
                                    <option value="<?php echo $model->getHeaterResisT1() ?>"><?php echo $model->getHeaterResisT1() ?></option>
                            </select>
                            <span class="row20">&#8451;</span>
                        </div>
                    </div>
                    <div class="row100 border-bottom">
                        <div class="row80 padding10">
                            <p class="title">Temperature value to turn on Resistor 2</p>
                            <i>(R2 ON when temperature in the Heater tank lower than this value)</i>
                        </div>
                        <div class="row20 padding10">
                            <select class="form-control row80" name="heater_resister_t2" disabled="disabled">
                                    <option value="<?php echo $model->getHeaterResisT2() ?>"><?php echo $model->getHeaterResisT2() ?></option>
                            </select>
                            <span class="row20">&#8451;</span>
                        </div>
                    </div>
                    <div class="row100 border-bottom">
                        <div class="row80 padding10">
                            <p class="title">Delay time to return on Resistor</p>
                        </div>
                        <div class="row20 padding10">
                            <select class="form-control row80" name="heater_resister_delay_time" disabled="disabled">
                                    <option value="<?php echo $model->getHeaterResisDelay() ?>"><?php echo $model->getHeaterResisDelay() ?></option>
                            </select>
                            <span class="row20">min</span>
                        </div>
                    </div>
                    <div class="row100 padding10">
                        <p>When the Heat Pump turn on a time, if temperature in Heater tank lower than T1, R1 turn on, if R1 turn on a time, temperature in Heater tanl lower than T2, R2 turn on.</p>
                    </div>

                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Three way Valve
                </div>
                <div class="row80 params-right border-left">
                    <div class="row100 border-bottom">
                        <div class="row50 border-right padding10">
                            <div class="row60">Begin time ilde (hh:mm)</div>
                            <div class="row20">
                                <select class="form-control" name="3way_t1_h" disabled="disabled">

                                        <option value="<?php echo $model->get3wayT1h(); ?>"><?php echo $model->get3wayT1h(); ?></option>

                                </select>
                            </div>
                            <div class="row20">
                                <select class="form-control" name="3way_t1_m" disabled="disabled">

                                        <option value="<?php echo $model->get3wayT1m(); ?>" ><?php echo $model->get3wayT1m(); ?></option>

                                </select>
                            </div>
                        </div>
                        <div class="row50 padding10">
                            <div class="row60">End time ilde (hh:mm)</div>
                            <div class="row20">
                                <select class="form-control" name="3way_t2_h" disabled="disabled">

                                        <option value="<?php echo $model->get3wayT2h(); ?>" ><?php echo $model->get3wayT2h(); ?></option>

                                </select>
                            </div>
                            <div class="row20">
                                <select class="form-control" name="3way_t2_m" disabled="disabled">

                                        <option value="<?php echo $model->get3wayT2m(); ?>" ><?php echo $model->get3wayT2m(); ?></option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row100 padding10 border-bottom">
                        <div class="row80 padding10">
                            <p class="title">Temperature range to turn on the Pump</p>
                            <i>(Temperature difference between Heater tank and Solar tank)</i>
                        </div>
                        <div class="row20 padding10">
                            <select class="form-control row80" name="3way_temp" disabled="disabled">
                                    <option value="<?php echo $model->get3wayTemp() ?>"><?php echo $model->get3wayTemp() ?></option>
                            </select>
                            <span class="row20">&#8451;</span>
                        </div>
                    </div>
                    <div class="row100 padding10">
                        <p>Valve change direction when time out of Begin time and End time, and the temperature between Heater tank and Solar tank upper than range.</p>
                    </div>
                </div>
            </div>

            <div class="border row row100">
                <div class="row20 params-left padding10">
                    Backflow Valve
                </div>
                <div class="row80 params-right border-left">
                    <div class="row80 padding10">
                        <p class="title">Temperature value to open Valve</p>
                        <i>(When temperature in the pipeline lower than this value, Valve open)</i>
                    </div>
                    <div class="row20 padding10">
                        <select class="form-control row80" name="backflow_temp" disabled="disabled">
                                <option value="<?php echo $model->getBackflowTemp() ?>"><?php echo $model->getBackflowTemp() ?></option>
                        </select>
                        <span class="row20">&#8451;</span>
                    </div>
                </div>
            </div>

            <div class="row100" style="text-align:center">
                <a href="/param-config/update?id=<?php echo $model->id ?>" class="btn btn-primary">Update</a>
            </div>
        </div>
</div>
