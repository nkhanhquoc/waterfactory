<?php

namespace common\models;

use Yii;

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
            'distric_id' => Yii::t('backend', 'Huyện/Quận'),
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

    public function getModuleId() {
        return $this->country->code . $this->privincial->code . $this->distric->code . $this->customer_code;
    }

}
