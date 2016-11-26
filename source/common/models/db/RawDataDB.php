<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "raw_data".
 *
 * @property integer $module_id
 * @property string $customer_code
 * @property string $message
 * @property string $created_at
 */
class RawDataDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'raw_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id'], 'integer'],
            [['created_at'], 'safe'],
            [['customer_code'], 'string', 'max' => 150],
            [['message'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'module_id' => Yii::t('backend', 'Module ID'),
            'customer_code' => Yii::t('backend', 'Customer Code'),
            'message' => Yii::t('backend', 'Message'),
            'created_at' => Yii::t('backend', 'Created At'),
        ];
    }
}
