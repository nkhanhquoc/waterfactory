<?php

namespace backend\models;

use Yii;

class Imsi extends \common\models\ImsiBase {

    public static function getClientRequest() {
        $model = \backend\models\Imsi::find()->where(['status' => 0])->all();
        $data = ['' => 'Select client'];
        foreach ($model as $item) {
            $data[$item->imsi] = $item->imsi;
        }
        return $data;
    }

}
