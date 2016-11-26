<?php

namespace backend\controllers;

use Yii;
use backend\models\ParamConfig;
use backend\models\Modules;
use backend\models\DataClient;
use backend\models\ParamConfigSearch;
use common\socket\Socket;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParamConfigController implements the CRUD actions for ParamConfig model.
 */
class ParamConfigController extends AppController {

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
     * Lists all ParamConfig models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ParamConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ParamConfig model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ParamConfig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ParamConfig();
        $modules = Modules::getAll();
        if (Yii::$app->request->isPost) {
          $values = Yii::$app->request->post();

          $model->module_id = $values['module_id'];
          $model->convection_pump = Socket::alldec2bin($values['convection_pump']);
          $model->cold_water_supply_pump = Socket::alldec2bin($values['cold_water_supply_pump_lv1'])
                                          .Socket::alldec2bin($values['cold_water_supply_pump_lv2']);
          $model->return_pump = Socket::alldec2bin($values['return_pump_t1_start'])
                                .Socket::alldec2bin($values['return_pump_t2_start'])
                                .Socket::alldec2bin($values['return_pump_t1_end'])
                                .Socket::alldec2bin($values['return_pump_t2_end'])
                                .Socket::alldec2bin($values['return_pump_delta_t']);
          $model->incresed_pressure_pump = Socket::alldec2bin($values['pressure_pump_p1']);
          $model->heat_pump = Socket::alldec2bin($values['heat_pump_t1']);
          $model->heat_resistor = Socket::alldec2bin($values['heater_resis_t1'])
                                    .Socket::alldec2bin($values['heater_resister_t2'])
                                    .Socket::alldec2bin($values['heater_resister_delay_time']);
          $model->three_way_valve = Socket::alldec2bin($values['3way_t1_h'])
                                    .Socket::alldec2bin($values['3way_t1_m'])
                                    .Socket::alldec2bin($values['3way_t2_h'])
                                    .Socket::alldec2bin($values['3way_t2_m'])
                                    .Socket::alldec2bin($values['3way_temp']);
          $model->backflow_valve = Socket::alldec2bin($values['backflow_temp']);
          $model->save(false);


          $data = new DataClient();
          $data->module_id = $model->module_id;
          $data->data = $model->convection_pump
                        .$model->cold_water_supply_pump
                        .$model->return_pump
                        .$model->incresed_pressure_pump
                        .$model->heat_pump
                        .$model->heat_resistor
                        .$model->three_way_valve
                        .$model->backflow_valve;
          $data->status = 0;
          $data->save(false);
            return $this->redirect(['/modules/view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'modules' => $modules
            ]);
        }
    }

    /**
     * Updates an existing ParamConfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modules = Modules::getAll();
        if (Yii::$app->request->isPost) {
          $values = Yii::$app->request->post();

          $model->module_id = $values['module_id'];
          $model->convection_pump = Socket::alldec2bin($values['convection_pump']);
          $model->cold_water_supply_pump = Socket::alldec2bin($values['cold_water_supply_pump_lv1'])
                                          .Socket::alldec2bin($values['cold_water_supply_pump_lv2']);
          $model->return_pump = Socket::alldec2bin($values['return_pump_t1_start'])
                                .Socket::alldec2bin($values['return_pump_t2_start'])
                                .Socket::alldec2bin($values['return_pump_t1_end'])
                                .Socket::alldec2bin($values['return_pump_t2_end'])
                                .Socket::alldec2bin($values['return_pump_delta_t']);
          $model->incresed_pressure_pump = Socket::alldec2bin($values['pressure_pump_p1']);
          $model->heat_pump = Socket::alldec2bin($values['heat_pump_t1']);
          $model->heat_resistor = Socket::alldec2bin($values['heater_resis_t1'])
                                    .Socket::alldec2bin($values['heater_resister_t2'])
                                    .Socket::alldec2bin($values['heater_resister_delay_time']);
          $model->three_way_valve = Socket::alldec2bin($values['3way_t1_h'])
                                    .Socket::alldec2bin($values['3way_t1_m'])
                                    .Socket::alldec2bin($values['3way_t2_h'])
                                    .Socket::alldec2bin($values['3way_t2_m'])
                                    .Socket::alldec2bin($values['3way_temp']);
          $model->backflow_valve = Socket::alldec2bin($values['backflow_temp']);
          $model->save(false);

          $data = new DataClient();
          $data->module_id = $model->module_id;
          $data->data = $model->convection_pump
                        .$model->cold_water_supply_pump
                        .$model->return_pump
                        .$model->incresed_pressure_pump
                        .$model->heat_pump
                        .$model->heat_resistor
                        .$model->three_way_valve
                        .$model->backflow_valve;
          $data->status = 0;
          $data->save(false);

            return $this->redirect(['/modules/view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'modules' => $modules
            ]);
        }
    }

    /**
     * Deletes an existing ParamConfig model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParamConfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ParamConfig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ParamConfig::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
