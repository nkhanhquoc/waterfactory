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
    if(Yii::$app->request->isPost){
      $values = Yii::$app->request->post();
      $module = Modules::find()->where(['id' => $values['module_id']])->one();
      $decpass = Yii::$app->params['default_password'];
      $binpass = "";
      for($i = 0; $i < strlen($decpass);$i++){
        $binpass .= Socket::dec2bin($decpass[$i]);
      }
      $id = "";//TODO: check ID
      $data = new \backend\models\DataClient();
      $data->module_id =  $values['module_id'];
      $data->data = $id . $binpass;
      $data->status = 0;
      $data->created_at = new Expression('NOW()');
      $data->save(false);

    }

      return $this->render('index', [
                  'modules' => $modules
      ]);
  }
}
