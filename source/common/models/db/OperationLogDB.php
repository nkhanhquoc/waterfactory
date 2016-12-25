<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "operation_log".
 *
 * @property string $id
 * @property string $created_time
 * @property integer $module_id
 * @property string $message
 */
class OperationLogDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operation_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_time'], 'safe'],
            [['module_id'], 'integer'],
            [['message'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'created_time' => Yii::t('backend', 'Created Time'),
            'module_id' => Yii::t('backend', 'Module ID'),
            'message' => Yii::t('backend', 'Message'),
        ];
    }
}
