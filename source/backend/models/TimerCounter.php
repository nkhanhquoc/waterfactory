<?php

namespace backend\models;

use Yii;

class TimerCounter extends \common\models\TimerCounterBase {

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('backend', 'ID'),
            'module_id' => Yii::t('backend', 'Module'),
            'counter' => Yii::t('backend', 'Counter'),
            'timer_1' => Yii::t('backend', 'Confirm Timer (sec)'),
            'timer_2' => Yii::t('backend', 'Resend Timer (sec)'),
            'timer_3' => Yii::t('backend', 'Report Timer (min)'),
            'created_at' => Yii::t('backend', 'Tạo lúc'),
        ];
    }

    public function toClient() {
        $id = ID_HEADER . \common\socket\Socket::dec2bin($this->module->country->code . $this->module->privincial->code . $this->module->distric->code . $this->module->customer_code);
        $data = new \backend\models\DataClient();
        $data->module_id = $this->module_id;
        $data->data = TIMER_COUNTER_CONFIG_HEADER
                . $id
                . TIMER_COUNTER_HEADER
                . \common\socket\Socket::alldec2bin($this->timer_1, 8)
                . \common\socket\Socket::alldec2bin($this->timer_2, 8)
                . \common\socket\Socket::alldec2bin($this->timer_3, 8)
                . \common\socket\Socket::alldec2bin($this->counter, 8);
        $data->status = 0;
        $data->created_at = new \yii\db\Expression('NOW()');
        return $data->save(false);
    }

}
