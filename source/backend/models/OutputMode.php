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

    public function getConvectionPumpDetail() {
        $mode = "";
        if ($this->getConvectionMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getConvectionPump() == PUMP_SLAVE) {
            $pump = "PUMP 1 SLAVE";
        } else if ($this->getConvectionPump() == PUMP_MASTER) {
            $pump = "PUMP 1 MASTER";
        } else {
            $pump = "ALL";
        }
        $time = $this->getConvectionTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getColdWaterSupplyPumpDetail() {
        $mode = "";
        if ($this->getCwspMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getCwspPump() == PUMP_SLAVE) {
            $pump = "PUMP 1";
        } else if ($this->getCwspPump() == PUMP_MASTER) {
            $pump = "PUMP 2";
        } else {
            $pump = "ALL";
        }
        $time = $this->getCwspTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getReturnPumpDetail() {
        $mode = "";
        if ($this->getReturnPumpMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getReturnPumpPump() == PUMP_SLAVE) {
            $pump = "PUMP 1";
        } else if ($this->getReturnPumpPump() == PUMP_MASTER) {
            $pump = "PUMP 2";
        } else {
            $pump = "ALL";
        }
        $time = $this->getReturnPumpTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getIncresedPressurePumpDetail() {
        $mode = "";
        if ($this->getPressurePumpMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getPressurePumpPump() == PUMP_SLAVE) {
            $pump = "PUMP 1 ON";
        } else if ($this->getPressurePumpPump() == PUMP_MASTER) {
            $pump = "PUMP 2 ON";
        } else {
            $pump = "ALL";
        }
        $time = $this->getPressurePumpTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getHeatPumpDetail() {
        $mode = "";
        if ($this->getHeatPumpMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getHeatPumpPump() == PUMP_SLAVE) {
            $pump = "PUMP 1 MASTER";
        } else if ($this->getHeatPumpPump() == PUMP_MASTER) {
            $pump = "PUMP 2 MASTER";
        } else {
            $pump = "ALL";
        }
        $time = $this->getHeatPumpTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getHeaterResisterDetail() {
        $mode = "";
        if ($this->getHeaterResisMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getHeaterResisPump() == PUMP_SLAVE) {
            $pump = "RESITOR 1 MASTER";
        } else if ($this->getHeaterResisPump() == PUMP_MASTER) {
            $pump = "RESITOR 2 MASTER";
        } else {
            $pump = "ALL";
        }
        $time = $this->getHeaterResisTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getThreeWayDetail() {
        $mode = "";
        if ($this->get3wayMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->get3wayPump() == PUMP_SLAVE) {
            $pump = "VALVE 1 MASTER";
        } else if ($this->get3wayPump() == PUMP_MASTER) {
            $pump = "VALVE 2 MASTER";
        } else {
            $pump = "ALL";
        }
        $time = $this->get3wayTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getBlakflowValveDetail() {
        $mode = "";
        if ($this->getBlakflowMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getBlakflowPump() == PUMP_SLAVE) {
            $pump = "VALVE 1 MASTER";
        } else if ($this->getBlakflowPump() == PUMP_MASTER) {
            $pump = "VALVE 2 MASTER";
        } else {
            $pump = "ALL";
        }
        $time = $this->getBlakflowTime();
        return $mode . "|" . $pump . "|" . $time;
    }

    public function getReservedDetail() {
        $mode = "";
        if ($this->getReservedMode() == MANUAL_B1) {
            $mode = "MANUAL";
        } else {
            $mode = "AUTO";
        }
        $pump = "";
        if ($this->getReservedPump() == PUMP_SLAVE) {
            $pump = "VALVE 1 MASTER";
        } else if ($this->getReservedPump() == PUMP_MASTER) {
            $pump = "VALVE 2 MASTER";
        } else {
            $pump = "ALL";
        }
        $time = $this->getReservedTime();
        return $mode . "|" . $pump . "|" . $time;
    }

}
