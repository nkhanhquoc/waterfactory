<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "configuration_log".
 *
 * @property string $id
 * @property string $module_id
 * @property string $created_time
 * @property string $message
 * @property integer $created_by
 *
 * @property ModulesDB $module
 * @property UserDB $createdBy
 */
class ConfigurationLogDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuration_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'created_by'], 'integer'],
            [['created_time'], 'safe'],
            [['created_by'], 'required'],
            [['message'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'module_id' => Yii::t('backend', 'Module ID'),
            'created_time' => Yii::t('backend', 'Created Time'),
            'message' => Yii::t('backend', 'Message'),
            'created_by' => Yii::t('backend', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(ModulesDB::className(), ['id' => 'module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserDB::className(), ['id' => 'created_by']);
    }
}
