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
                $decpass = Yii::$app->params['default_password'];
                $binpass .= Socket::dec2bin($decpass);
                $id = module_id_dp . \common\socket\Socket::dec2bin($module->getModuleId());
                $id .= ID_IE_NAME;
                $data = new \backend\models\DataClient();
                $data->module_id = $values['module_id'];
                $data->data = $id . $binpass;
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
