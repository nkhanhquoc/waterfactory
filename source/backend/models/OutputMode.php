<?php

namespace backend\models;

use common\models\OutputModeBase;
use common\socket\Socket;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class OutputMode extends OutputModeBase {

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    public function getConvectionMode() {
        return substr($this->convection_pump, 0, 8);
    }

    public function getConvectionPump() {
        return substr($this->convection_pump, 8, 8);
    }

    public function getConvectionTime() {
        $bin = substr($this->convection_pump, 16, 8);
        return bindec($bin);
    }

    public function getCwspMode() {
        return substr($this->cold_water_supply_pump, 0, 8);
    }

    public function getCwspPump() {
        return substr($this->cold_water_supply_pump, 8, 8);
    }

    public function getCwspTime() {
        $bin = substr($this->cold_water_supply_pump, 16, 8);
        return bindec($bin);
    }

    public function getReturnPumpMode() {
        return substr($this->return_pump, 0, 8);
    }

    public function getReturnPumpPump() {
        return substr($this->return_pump, 8, 8);
    }

    public function getReturnPumpTime() {
        $bin = substr($this->return_pump, 16, 8);
        return bindec($bin);
    }

    public function getPressurePumpMode() {
        return substr($this->incresed_pressure_pump, 0, 8);
    }

    public function getPressurePumpPump() {
        return substr($this->incresed_pressure_pump, 8, 8);
    }

    public function getPressurePumpTime() {
        $bin = substr($this->incresed_pressure_pump, 16, 8);
        return bindec($bin);
    }

    public function getHeatPumpMode() {
        return substr($this->heat_pump, 0, 8);
    }

    public function getHeatPumpPump() {
        return substr($this->heat_pump, 8, 8);
    }

    public function getHeatPumpTime() {
        $bin = substr($this->heat_pump, 16, 8);
        return bindec($bin);
    }

    public function getHeaterResisMode() {
        return substr($this->heater_resister, 0, 8);
    }

    public function getHeaterResisPump() {
        return substr($this->heater_resister, 8, 8);
    }

    public function getHeaterResisTime() {
        $bin = substr($this->heater_resister, 16, 8);
        return bindec($bin);
    }

    public function get3wayMode() {
        return substr($this->three_way_valve, 0, 8);
    }

    public function get3wayPump() {
        return substr($this->three_way_valve, 8, 8);
    }

    public function get3wayTime() {
        $bin = substr($this->three_way_valve, 16, 8);
        return bindec($bin);
    }

    public function getBlakflowMode() {
        return substr($this->backflow_valve, 0, 8);
    }

    public function getBlakflowPump() {
        return substr($this->backflow_valve, 8, 8);
    }

    public function getBlakflowTime() {
        $bin = substr($this->backflow_valve, 16, 8);
        return bindec($bin);
    }

    public function getReservedMode() {
        return substr($this->reserved, 0, 8);
    }

    public function getReservedPump() {
        return substr($this->reserved, 8, 8);
    }

    public function getReservedTime() {
        $bin = substr($this->reserved, 16, 8);
        return bindec($bin);
    }

    public function toClient() {
        $id = ID_HEADER . \common\socket\Socket::dec2bin($this->module->country->code . $this->module->privincial->code . $this->module->distric->code . $this->module->customer_code);
        $data = new \backend\models\DataClient();
        $data->module_id = $this->module_id;
        $data->data = OUTPUT_MODE_CONFIG_HEADER
                . $id
                . OUTPUT_MODE_HEADER
                . $this->convection_pump
                . $this->cold_water_supply_pump
                . $this->return_pump
                . $this->incresed_pressure_pump
                . $this->heat_pump
                . $this->heater_resister
                . $this->reserved
                . $this->three_way_valve
                . $this->backflow_valve;
        $data->status = 0;
        $data->created_at = new Expression('NOW()');
        $data->save(false);
    }

}
