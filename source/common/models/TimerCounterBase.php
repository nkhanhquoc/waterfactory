<?php

namespace common\models;

use Yii;

class TimerCounterBase extends \common\models\db\TimerCounterDB {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule() {
        return $this->hasOne(ModulesBase::className(), ['id' => 'module_id']);
    }

}
