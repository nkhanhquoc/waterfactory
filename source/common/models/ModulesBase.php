<?php

namespace common\models;

use Yii;
use yii\db\Expression;

class ModulesBase extends \common\models\db\ModulesDB {

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Tên khách hàng'),
            'msisdn' => Yii::t('backend', 'Số điện thoại'),
            'country_id' => Yii::t('backend', 'Quốc gia'),
            'privincial_id' => Yii::t('backend', 'Tỉnh'),
            'distric_id' => Yii::t('backend', 'Quận/Huyện'),
            'customer_code' => Yii::t('backend', 'Mã khách hàng'),
            'address' => Yii::t('backend', 'Address'),
            'alarm' => Yii::t('backend', 'Alarm'),
            'created_by' => Yii::t('backend', 'Created By'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'money' => Yii::t('backend', 'Money'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImsis() {
        return \common\models\ImsiBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSensors() {
        return \common\models\SensorBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimerCounters() {
        return \common\models\TimerCounterBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuntimeStatistics() {
        return \common\models\RuntimeStatisticsBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuleStatuses() {
        return \common\models\ModuleStatusBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOutputModes() {
        return \common\models\OutputModeBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParamConfigs() {
        return \common\models\ParamConfigBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlarms() {
        return \common\models\AlarmBase::find()->where(['module_id' => $this->id])->orderBy(['created_at' => SORT_DESC])->one();
    }

    public function getModuleId() {
        return $this->country->code . $this->privincial->code . $this->distric->code . $this->customer_code;
    }

    public function checkSystemStatus() {
        $id = ID_HEADER . \common\socket\Socket::dec2bin($this->getModuleId());
        $data = new \backend\models\DataClient();
        $data->module_id = $this->id;
        $data->data = CHECK_SYSTEM_STATUS_HEADER . $id;
        $data->status = 0;
        $data->created_at = new Expression('NOW()');
        return $data->save(false);
    }

    public function checkParametter() {
        $id = ID_HEADER . \common\socket\Socket::dec2bin($this->getModuleId());
        $data = new \backend\models\DataClient();
        $data->module_id = $this->id;
        $data->data = CHECK_PARAMETER_HEADER . $id;
        $data->status = 0;
        $data->created_at = new Expression('NOW()');
        return $data->save(false);
    }

    public function checkTimerCounter() {
        $id = ID_HEADER . \common\socket\Socket::dec2bin($this->getModuleId());
        $data = new \backend\models\DataClient();
        $data->module_id = $this->id;
        $data->data = CHECK_TIMER_COUNTER_HEADER . $id;
        $data->status = 0;
        $data->created_at = new Expression('NOW()');
        return $data->save(false);
    }

    public function checkOutputMode() {
        $id = ID_HEADER . \common\socket\Socket::dec2bin($this->getModuleId());
        $data = new \backend\models\DataClient();
        $data->module_id = $this->id;
        $data->data = CHECK_OUTPUT_MODE_HEADER . $id;
        $data->status = 0;
        $data->created_at = new Expression('NOW()');
        return $data->save(false);
    }

    public function checkAlarm() {
        $alarm = $this->alarms;
        if ($alarm->qua_ap_suat == '11') {
            return 1;
        }
        if ($alarm->tran_be == '11') {
            return 1;
        }
        if ($alarm->mat_dien == '11') {
            return 1;
        }
        if ($alarm->qua_nhiet == '11') {
            return 1;
        }
        return 0;
    }

}
