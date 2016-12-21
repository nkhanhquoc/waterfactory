<?php

namespace backend\models;

use common\models\ProvincialBase;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Provincial extends ProvincialBase {

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

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'code', 'country_id'], 'required'],
            [['country_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'min' => 3, 'max' => 3],
            [['code'], 'match', 'pattern' => '((?=.*\d))'],
            [['code'], 'unique']
        ];
    }

    public static function getAll() {
        $country = \backend\models\Provincial::find()->all();
        $data = [];
        foreach ($country as $item) {
            $data[$item->id] = \yii\helpers\Html::encode($item->name);
        }
        return $data;
    }

}
