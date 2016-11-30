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
        $modules = Modules::getAll();
        if (Yii::$app->request->isPost) {
            $values = Yii::$app->request->post();
            $module = Modules::find()->where(['id' => $values['module_id']])->one();
            if ($module) {
                $id = ID_HEADER . \common\socket\Socket::dec2bin($module->getModuleId());
                $data = new \backend\models\DataClient();
                $data->module_id = $module->id;
                $data->data = PASS_RESET_HEADER . $id;
                $data->status = 0;
                $data->created_at = new Expression('NOW()');
                $data->save(false);
                \Yii::$app->session->setFlash('success', 'Reset mật khẩu mặc định cho ' . yii\helpers\Html::encode($module->name) . ' thành công!');
            }
        }

        return $this->render('index', [
                    'modules' => $modules
        ]);
    }

}
