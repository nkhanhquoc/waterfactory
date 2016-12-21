<?php

namespace common\models;

use Yii;

/**
 * @property ModulesBase $module
 */
class OutputModeBase extends \common\models\db\OutputModeDB {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule() {
        return $this->hasOne(ModulesBase::className(), ['id' => 'module_id']);
    }

}
