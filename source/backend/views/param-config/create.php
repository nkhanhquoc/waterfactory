<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', \yii\helpers\Html::encode($model->module->name)), 'url' => ['/modules/view?id=' . $model->module->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Parameter Config');
?>
<form method="post" action="/index.php/param-config/create">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
    <div class="params">

        <div class="border row row100">
            <div class="row20 params-left padding10">
                Module
            </div>
            <div class="row80 params-right border-left">

                <div class="row50 padding10">
                    <select class="form-control row80" name="module_id">
                        <?php foreach ($modules as $key => $m): ?>
                            <option value="<?php echo $key ?>" <?php if ($model->module_id == $key) echo 'selected="selected"'; ?>><?php echo $m ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="row20">&nbsp;</span>
                </div>
            </div>
        </div>
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
                    <select class="form-control row80" name="convection_pump">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
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
                            <select class="form-control row80" name="cold_water_supply_pump_lv1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <span class="row20">&#8451;</span>
                        </div>
                    </div>
                    <div class="row100 padding10">
                        <div class="row60">Water level M2</div>
                        <div class="row40">
                            <select class="form-control row80" name="cold_water_supply_pump_lv2">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
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
                            <select class="form-control" name="return_pump_t1_start">
                                <?php
                                for ($i = 0; $i < 24; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row20">
                            <select class="form-control" name="return_pump_t2_start">
                                <?php
                                for ($i = 0; $i < 60; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row50 padding10">
                        <div class="row60">End time ilde (hh:mm)</div>
                        <div class="row20">
                            <select class="form-control" name="return_pump_t1_end">
                                <?php
                                for ($i = 0; $i < 24; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row20">
                            <select class="form-control" name="return_pump_t2_end">
                                <?php
                                for ($i = 0; $i < 60; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
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
                        <select class="form-control row80" name="return_pump_delta_t">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
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
                    <select class="form-control row80" name="pressure_pump_p1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
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
                    <select class="form-control row80" name="heat_pump_t1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
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
                        <select class="form-control row80" name="heater_resis_t1">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
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
                        <select class="form-control row80" name="heater_resister_t2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <span class="row20">&#8451;</span>
                    </div>
                </div>
                <div class="row100 border-bottom">
                    <div class="row80 padding10">
                        <p class="title">Delay time to return on Resistor</p>
                    </div>
                    <div class="row20 padding10">
                        <select class="form-control row80" name="heater_resister_delay_time">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
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
                            <select class="form-control" name="3way_t1_h">
                                <?php
                                for ($i = 0; $i < 24; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row20">
                            <select class="form-control" name="3way_t1_m">
                                <?php
                                for ($i = 0; $i < 60; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row50 padding10">
                        <div class="row60">End time ilde (hh:mm)</div>
                        <div class="row20">
                            <select class="form-control" name="3way_t2_h">
                                <?php
                                for ($i = 0; $i < 24; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row20">
                            <select class="form-control" name="3way_t2_m">
                                <?php
                                for ($i = 0; $i < 60; $i++) {
                                    if ($i < 10) {
                                        $number = '0' . $i;
                                    } else {
                                        $number = $i;
                                    }
                                    ?>
                                    <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                    <?php
                                }
                                ?>
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
                        <select class="form-control row80" name="3way_temp">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
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
                    <select class="form-control row80" name="backflow_temp">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <span class="row20">&#8451;</span>
                </div>
            </div>
        </div>

        <div class="row100">
            <input type="submit" class="btn btn-primary" value="Send" />
            <!-- <input type="button" class="btn btn-primary" value="Send to Module" /> -->
            <a href="#" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</form>
