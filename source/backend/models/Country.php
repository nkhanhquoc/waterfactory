<?php

namespace backend\models;

use common\models\CountryBase;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Country extends CountryBase {

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
            [['code', 'name'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'min' => 3, 'max' => 3],
            [['code'], 'match', 'pattern' => '((?=.*\d))'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'unique']
        ];
    }

    public static function getAll() {
        $country = \backend\models\Country::find()->all();
        $data = [];
        foreach ($country as $item) {
            $data[$item->id] = \yii\helpers\Html::encode($item->name);
        }
        return $data;
    }

}
