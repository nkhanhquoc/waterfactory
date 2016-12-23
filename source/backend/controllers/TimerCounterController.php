<?php

namespace backend\controllers;

use Yii;
use backend\models\TimerCounter;
use backend\models\TimerCounterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TimerCounterController implements the CRUD actions for TimerCounter model.
 */
class TimerCounterController extends AppController {

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
     * Lists all TimerCounter models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TimerCounterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHome() {
        $moduleId = \Yii::$app->session->get('module_id', 0);
        if (!$moduleId) {
            return $this->goHome();
        }
        if ($moduleId) {
            $module = \backend\models\Modules::findOne($moduleId);
            if ($module && $module->timerCounters) {
                return $this->redirect(['view', 'id' => $module->timerCounters->id]);
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Displays a single TimerCounter model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        $module = $model->module;
        if ($_GET['reload'] == 'true') {
            $module->checkTimerCounter();
            sleep(TIME_OUT_REFRESH);
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new TimerCounter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TimerCounter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->toClient();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TimerCounter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $module = $model->module;
        if ($_GET['reload'] == 'true') {
            $module->checkTimerCounter();
            sleep(TIME_OUT_REFRESH);
            return $this->redirect(['update', 'id' => $id]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->toClient();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TimerCounter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TimerCounter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TimerCounter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TimerCounter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
