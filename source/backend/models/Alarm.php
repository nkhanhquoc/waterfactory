\<?php

namespace backend\models;

use Yii;

class Alarm extends \common\models\AlarmBase {

  public function getReport($from,$to,$moduleId){
    $alarms = Alarm::find()->where([
      '>=','created_at',$from
    ])->andWhere([
      '<=','created_at',$to
    ])->andWhere([
      'module_id'=>$moduleId
    ])->all();
    // var_dump($sensors->createCommand()->getRawSql());die;
    return $alarms;
  }
}
