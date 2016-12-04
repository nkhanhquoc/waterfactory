<?php

namespace backend\controllers;

use Yii;
use backend\models\OutputMode;
use backend\models\Modules;
use backend\models\DataClient;
use backend\models\OutputModeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\socket\Socket;

/**
 * OutputModeController implements the CRUD actions for OutputMode model.
 */
class OutputModeController extends AppController {

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
     * Lists all OutputMode models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new OutputModeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OutputMode model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OutputMode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new OutputMode();
        $moduleId = ($_GET['module_id']) ? intval($_GET['module_id']) : 0;
        $model->module_id = $moduleId;
        $modules = Modules::getAll();

        if (Yii::$app->request->isPost) {
            $values = Yii::$app->request->post();
            $model->module_id = $values['module_id'];
            if($values['OutputMode']['convection_pump']['time'] > 255){
              $convectionPumptime = Socket::alldec2bin($values['OutputMode']['convection_pump']['time'],16);
            } else {
              $convectionPumptime = Socket::alldec2bin($values['OutputMode']['convection_pump']['time'],8).'00000000';
            }
            $model->convection_pump = $values['OutputMode']['convection_pump']['mode'] . $values['OutputMode']['convection_pump']['pump'] . $convectionPumptime;

            if($values['OutputMode']['cwsp_pump']['time'] > 255){
              $cwspPumptime = Socket::alldec2bin($values['OutputMode']['cwsp_pump']['time'],16);
            } else {
              $cwspPumptime = Socket::alldec2bin($values['OutputMode']['cwsp_pump']['time'],8).'00000000';
            }
            $model->cold_water_supply_pump = $values['OutputMode']['cwsp_pump']['mode'] . $values['OutputMode']['cwsp_pump']['pump'] . $cwspPumptime;

            if($values['OutputMode']['return_pump']['time'] > 255){
              $returnPumptime = Socket::alldec2bin($values['OutputMode']['return_pump']['time'],16);
            } else {
              $returnPumptime = Socket::alldec2bin($values['OutputMode']['return_pump']['time'],8).'00000000';
            }
            $model->return_pump = $values['OutputMode']['return_pump']['mode'] . $values['OutputMode']['return_pump']['pump'] . $returnPumptime;

            if($values['OutputMode']['pressure_pump']['time'] > 255){
              $pressurePumptime = Socket::alldec2bin($values['OutputMode']['pressure_pump']['time'],16);
            } else {
              $pressurePumptime = Socket::alldec2bin($values['OutputMode']['pressure_pump']['time'],8).'00000000';
            }
            $model->incresed_pressure_pump = $values['OutputMode']['pressure_pump']['mode'] . $values['OutputMode']['pressure_pump']['pump'] . $pressurePumptime;

            if($values['OutputMode']['heat_pump']['time'] > 255){
              $heatPumptime = Socket::alldec2bin($values['OutputMode']['heat_pump']['time'],16);
            } else {
              $heatPumptime = Socket::alldec2bin($values['OutputMode']['heat_pump']['time'],8).'00000000';
            }
            $model->heat_pump = $values['OutputMode']['heat_pump']['mode'] . $values['OutputMode']['heat_pump']['pump'] . $heatPumptime;

            if($values['OutputMode']['heater_resis']['time'] > 255){
              $heaterResisPumptime = Socket::alldec2bin($values['OutputMode']['heater_resis']['time'],16);
            } else {
              $heaterResisPumptime = Socket::alldec2bin($values['OutputMode']['heater_resis']['time'],8).'00000000';
            }
            $model->heater_resister = $values['OutputMode']['heater_resis']['mode'] . $values['OutputMode']['heater_resis']['pump'] . $heaterResisPumptime;

            if($values['OutputMode']['3way']['time'] > 255){
              $twayPumptime = Socket::alldec2bin($values['OutputMode']['3way']['time'],16);
            } else {
              $twayPumptime = Socket::alldec2bin($values['OutputMode']['3way']['time'],8).'00000000';
            }
            $model->three_way_valve = $values['OutputMode']['3way']['mode'] . $values['OutputMode']['3way']['pump'] . $twayPumptime;

            if($values['OutputMode']['blakflow']['time'] > 255){
              $blakflowPumptime = Socket::alldec2bin($values['OutputMode']['blakflow']['time'],16);
            } else {
              $blakflowPumptime = Socket::alldec2bin($values['OutputMode']['blakflow']['time'],8).'00000000';
            }
            $model->backflow_valve = $values['OutputMode']['blakflow']['mode'] . $values['OutputMode']['blakflow']['pump'] . $blakflowPumptime;

            //thang nay khong co du phong
            $model->reserved = $values['OutputMode']['reserved']['mode'] . $values['OutputMode']['reserved']['pump'] . Socket::alldec2bin($values['OutputMode']['reserved']['time'], 8);

            if ($model->save(false)) {
                $model->toClient();
                return $this->redirect(['/modules/view', 'id' => $model->module_id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
                    'modules' => $modules
        ]);
    }

    /**
     * Updates an existing OutputMode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $values = Yii::$app->request->post();
            $model->convection_pump = $values['OutputMode']['convection_pump']['mode'] . $values['OutputMode']['convection_pump']['pump'] . Socket::alldec2bin($values['OutputMode']['convection_pump']['time'], 8);
            $model->cold_water_supply_pump = $values['OutputMode']['cwsp_pump']['mode'] . $values['OutputMode']['cwsp_pump']['pump'] . Socket::alldec2bin($values['OutputMode']['cwsp_pump']['time'], 8);
            $model->return_pump = $values['OutputMode']['return_pump']['mode'] . $values['OutputMode']['return_pump']['pump'] . Socket::alldec2bin($values['OutputMode']['return_pump']['time'], 8);
            $model->incresed_pressure_pump = $values['OutputMode']['pressure_pump']['mode'] . $values['OutputMode']['pressure_pump']['pump'] . Socket::alldec2bin($values['OutputMode']['pressure_pump']['time'], 8);
            $model->heat_pump = $values['OutputMode']['heat_pump']['mode'] . $values['OutputMode']['heat_pump']['pump'] . Socket::alldec2bin($values['OutputMode']['heat_pump']['time'], 8);
            $model->heater_resister = $values['OutputMode']['heater_resis']['mode'] . $values['OutputMode']['heater_resis']['pump'] . Socket::alldec2bin($values['OutputMode']['heater_resis']['time'], 8);
            $model->three_way_valve = $values['OutputMode']['3way']['mode'] . $values['OutputMode']['3way']['pump'] . Socket::alldec2bin($values['OutputMode']['3way']['time'], 8);
            $model->backflow_valve = $values['OutputMode']['blakflow']['mode'] . $values['OutputMode']['blakflow']['pump'] . Socket::alldec2bin($values['OutputMode']['blakflow']['time'], 8);
            $model->reserved = $values['OutputMode']['reserved']['mode'] . $values['OutputMode']['reserved']['pump'] . Socket::alldec2bin($values['OutputMode']['reserved']['time'], 8);
            if ($model->save(false)) {
                $model->toClient();
                return $this->redirect(['/modules/view', 'id' => $model->module_id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OutputMode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OutputMode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return OutputMode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = OutputMode::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
