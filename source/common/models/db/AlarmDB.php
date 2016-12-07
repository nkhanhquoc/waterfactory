<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "alarm".
 *
 * @property string $id
 * @property string $module_id
 * @property string $created_at
 * @property string $qua_nhiet
 * @property string $qua_ap_suat
 * @property string $tran_be
 * @property string $mat_dien
 * @property string $time_start_alarm
 * @property string $time_cancal_alarm
 *
 * @property ModulesDB $module
 */
class AlarmDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alarm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id'], 'integer'],
            [['created_at', 'time_start_alarm', 'time_cancal_alarm'], 'safe'],
            [['qua_nhiet', 'qua_ap_suat', 'tran_be', 'mat_dien'], 'string', 'max' => 255]
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
            'created_at' => Yii::t('backend', 'Created At'),
            'qua_nhiet' => Yii::t('backend', 'Qua Nhiet'),
            'qua_ap_suat' => Yii::t('backend', 'Qua Ap Suat'),
            'tran_be' => Yii::t('backend', 'Tran Be'),
            'mat_dien' => Yii::t('backend', 'Mat Dien'),
            'time_start_alarm' => Yii::t('backend', 'Time Start Alarm'),
            'time_cancal_alarm' => Yii::t('backend', 'Time Cancal Alarm'),
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
