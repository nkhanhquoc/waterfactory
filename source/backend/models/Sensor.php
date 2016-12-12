<?php

namespace backend\models;

use Yii;

class Sensor extends \common\models\SensorBase {

  public function getReport($from, $to,$moduleId){
    $sensors = Sensor::find()->where([
      '>=','created_at',$from
    ])->andWhere([
      '<=','created_at',$to
    ])->andWhere([
      'module_id'=>$moduleId
    ])->all();
    // var_dump($sensors->createCommand()->getRawSql());die;
    return $sensors;
  }

}
