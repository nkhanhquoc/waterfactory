<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "imsi".
 *
 * @property integer $id
 * @property string $imsi
 * @property string $module_id
 * @property string $module_id_assignment
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property ModulesDB $module
 */
class ImsiDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imsi', 'module_id_assignment'], 'required'],
            [['module_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['imsi'], 'string', 'max' => 20],
            [['module_id_assignment'], 'string', 'max' => 255],
            [['imsi'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'imsi' => Yii::t('backend', 'Imsi'),
            'module_id' => Yii::t('backend', 'Module ID'),
            'module_id_assignment' => Yii::t('backend', 'Module Id Assignment'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(ModulesDB::className(), ['id' => 'module_id']);
    }
}
