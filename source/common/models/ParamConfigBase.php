<?php

namespace common\models;

use Yii;

/**
 * @property ModulesBase $module
 */
class ParamConfigBase extends \common\models\db\ParamConfigDB {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule() {
        return $this->hasOne(ModulesBase::className(), ['id' => 'module_id']);
    }

}
