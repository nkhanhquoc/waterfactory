<?php

namespace common\models;

use Yii;

class ModulesBase extends \common\models\db\ModulesDB {

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

}
