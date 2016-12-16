<?php

namespace backend\controllers;

use Yii;
use backend\models\Modules;
use backend\models\Mode;
use backend\models\ModulesSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModulesController implements the CRUD actions for Modules model.
 */
class ModulesController extends AppController {

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
     * Lists all Modules models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ModulesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        \Yii::$app->session->set('module_id', null);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAllView() {
        return $this->redirect(['view', 'id' => \Yii::$app->session->get('module_id')]);
    }

    /**
     * Displays a single Modules model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        \Yii::$app->session->set('module_id', $model->id);

        $sensors = $model->sensors;
        $statuses = $model->moduleStatuses;
        $alarms = $model->alarms;
        $model->setVan_dien_tu_ba_nga_up();
        return $this->render('view', [
                    'model' => $model,
                    'sensors' => $sensors,
                    'statuses' => $statuses,
                    'alarms' => $alarms,
        ]);
    }

    /**
     * Creates a new Modules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Modules();
        $model->customer_code = $model->getMaxCustomerCode();

        $clients = \backend\models\Imsi::getClientRequest();
        if (sizeof($clients) == 1) {
            Yii::$app->session->setFlash('error', 'Hiện không có client nào gửi request khởi tạo ID');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->toClient()) {
                Yii::$app->session->setFlash('success', 'Set ID tới module ' . $model->getModuleId() . ' thành công!');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Không tìm thấy client nào có imsi ' . $model->msisdn);
                $this->findModel($model->id)->delete();
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
                    'model' => $model,
                    'clients' => $clients,
        ]);
    }

    /**
     * Updates an existing Modules model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Modules model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionMode($id) {
        $model = $this->findModel($id);
        $modes = Mode::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            die("abc");
            if ($model->save(false, ['mode_id'])) {
                if ($model->mode2Client()) {
                    Yii::$app->session->setFlash('success', 'Đã gửi bản tin set System Mode thành công!');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('success', 'Gửi bản tin set System Mode không thành công!');
                }
            }
        }
        return $this->render('mode', [
                    'model' => $model,
                    'modes' => $modes
        ]);
    }

    /**
     * Deletes an existing Modules model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        \backend\models\Imsi::deleteAll(['module_id' => $model->id]);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Modules the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Modules::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAccountmanager() {
        $id = \Yii::$app->session->get('module_id');
        $model = $this->findModel($id);
        $modules = Modules::getAll();
        if (Yii::$app->request->isPost) {
            $values = Yii::$app->request->post();
            if ($values['check']) {
                try {
                    $model->toClientManager();
                    $alert = "Gửi yêu cầu kiểm tra thành công!";
                } catch (Exception $e) {
                    $alert = "Có lỗi xảy ra";
                }
            }
            if ($values['pay']) {
                if ($values['card_info']) {
                    if (is_numeric($values['card_info'])) {
                        try {
                            $model->toClientPay(trim($values['card_info']));
                            $alert = "Gửi yêu cầu thanh toán thành công!";
                        } catch (Exception $e) {
                            $alert = "Có lỗi xảy ra";
                        }
                    } else {
                        $alert = "Mã thẻ cào chưa chính xác!";
                    }
                } else {
                    $alert = "Bạn phải nhập mã thẻ!";
                }
            }
        }
        return $this->render('accountManager', [
                    'model' => $model,
                    'alert' => $alert,
                    'modules' => $modules
        ]);
    }

    public function actionLoadinfo($id) {
        $this->layout = false;
        $model = $this->findModel($id);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'money' => number_format($model->money),
            'data' => number_format($model->data),
        ];
    }

}
