<?php

namespace backend\controllers;

use yii;
use backend\models\Modules;
use yii\filters\VerbFilter;
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
   * @return mixed
   */
  public function actionIndex() {
    $modules = Modules::getAll();
    if(Yii::$app->request->isPost){
      $values = Yii::$app->request->post();
      var_dump($values);die;
    }

      return $this->render('index', [
                  'modules' => $modules
      ]);
  }
}
