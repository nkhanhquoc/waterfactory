<?php

namespace backend\controllers;

use yii;
use backend\models\Modules;
use common\socket\Socket;
use yii\filters\VerbFilter;
use yii\db\Expression;

class ResetPasswordController extends AppController {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Provincial models.
     * @return mixed]
     */
    public function actionIndex() {
        $moduleId = \Yii::$app->session->get('module_id', 0);
        $module = Modules::findOne($moduleId);
        if (Yii::$app->request->isPost) {
            if ($module) {
                $id = ID_HEADER . \common\socket\Socket::dec2bin($module->getModuleId());
                $data = new \backend\models\DataClient();
                $data->module_id = $module->id;
                $data->data = PASS_RESET_HEADER . $id;
                $data->status = 0;
                $data->created_at = new Expression('NOW()');
                $data->save(false);
                \Yii::$app->session->setFlash('success', 'Reset default password to ' . yii\helpers\Html::encode($module->name) . ' success!');
            }
        }

        return $this->render('index', [
                    'module' => $module
        ]);
    }

}
