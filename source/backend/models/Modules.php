<?php

namespace backend\models;

use common\models\ModulesBase;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Modules extends ModulesBase {

    public $van_dien_tu_ba_nga_up;
    public $van_dien_tu_ba_nga_down;

    function getVan_dien_tu_ba_nga_up() {
        return $this->van_dien_tu_ba_nga_up;
    }

    function getVan_dien_tu_ba_nga_down() {
        return $this->van_dien_tu_ba_nga_down;
    }

    function setVan_dien_tu_ba_nga_down() {
        if ($this->van_dien_tu_ba_nga_up == '00') {
            $this->van_dien_tu_ba_nga_down = '11';
        } else {
            $this->van_dien_tu_ba_nga_down = '00';
        }
    }

    function setVan_dien_tu_ba_nga_up() {
        date_default_timezone_set('Asia/Saigon');
        if (trim($this->moduleStatuses->van_dien_tu_ba_nga) == '00') {
            if (strtotime(date('Y-m-d 6:00:00')) <= strtotime(date('Y-m-d H:i:s')) && strtotime(date('Y-m-d H:i:s')) <= strtotime(date('Y-m-d 18:00:00'))) {
                $this->van_dien_tu_ba_nga_up = '00';
                $this->van_dien_tu_ba_nga_down = '11';
            } else {
                if (bindec(trim($this->sensors->cam_bien_nhiet_dinh_bon_solar)) >= bindec(trim($this->sensors->cam_bien_nhiet_do_bon_gia_nhiet))) {
                    $this->van_dien_tu_ba_nga_up = '11';
                    $this->van_dien_tu_ba_nga_down = '00';
                } else {
                    $this->van_dien_tu_ba_nga_up = '00';
                    $this->van_dien_tu_ba_nga_down = '11';
                }
            }
        } else {
            $this->van_dien_tu_ba_nga_up = '11';
            $this->van_dien_tu_ba_nga_down = '11';
        }
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    public static function getAll() {
        $model = \backend\models\Modules::find()->all();
        $data = [];
        foreach ($model as $item) {
            $data[$item->id] = \yii\helpers\Html::encode($item->name);
        }
        return $data;
    }

    public function getMaxCustomerCode() {
        $model = \backend\models\Modules::find()->orderBy(['created_at' => SORT_DESC])->one();
        $customerCode = bindec($model->customer_code) + 1;
        return \common\socket\Socket::alldec2bin($customerCode, 6);
    }

    public function toClient() {
        $id = module_id_dp . \common\socket\Socket::dec2bin($this->getModuleId());
        $id .= ID_IE_NAME;

        $client = new \backend\models\DataClient();
        $client->data = $id;
        $client->module_id = $this->id;
        $client->status = 0;
        $client->created_at = new Expression('NOW()');
        $client->save(false);
    }

}
