<?php

namespace backend\controllers;

use Yii;
use backend\models\Sensor;
use backend\models\Alarm;
use backend\models\Modules;

class ReportController extends AppController {

    public function actionIndex() {
        $sensors = array();
        $from = "";
        $to = "";
        $module_id = \Yii::$app->session->get('module_id', 0);
        if (!$module_id) {
            return $this->goHome();
        }
        $modules = Modules::findOne($module_id);
        if (Yii::$app->request->isPost) {
            $values = Yii::$app->request->post();
            //$module_id = $values['module_id'];
            $from = $values['from'];
            $to = $values['to'];
            if ($values['export']) {
                $this->exportCsv($module_id, $from, $to);
            }
            $sensors = Sensor::getReport($from, $to, $module_id);
            // $alarms = Alarm::getReport($from,$to,$module_id);
            // var_dump($sensors);die;
        }
        return $this->render('index.php', [
                    'sensors' => $sensors,
                    'from' => $from,
                    'to' => $to,
                    'module' => $modules,
                    'module_id' => $module_id
        ]);
    }

    public function actionReportalarm() {
        $alarms = array();
        $from = "";
        $to = "";
        $module_id = \Yii::$app->session->get('module_id', 0);
        if (!$module_id) {
            return $this->goHome();
        }
        $modules = Modules::findOne($module_id);
        if (Yii::$app->request->isPost) {
            $values = Yii::$app->request->post();
            //$module_id = $values['module_id'];
            $from = $values['from'];
            $to = $values['to'];
            if ($values['export']) {
                $this->exportAlarmCsv($module_id, $from, $to);
            }
            $alarms = Alarm::getReport($from, $to, $module_id);
        }
        return $this->render('reportalarm.php', [
                    'alarms' => $alarms,
                    'from' => $from,
                    'to' => $to,
                    'module' => $modules,
                    'module_id' => $module_id
        ]);
    }

    public function exportCsv($moduleId, $from, $to) {
        $sensors = Sensor::getReport($from, $to, $moduleId);
        $alarms = Alarm::getReport($from, $to, $moduleId);
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '-1');
        $fileName = 'report_sensor_' . date('Ymd_His') . '.csv';
        ob_start();
        header('Content-Encoding: UTF-8');
        header("Content-type: text/x-csv; charset=UTF-8");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Content-Disposition: attachment;filename=' . $fileName);
        //  echo "\xEF\xBB\xBF"; //cau echo nay de hien thi duoc tieng viet trong file csv khi mo bang excel

        $fp = fopen('php://output', 'w');
        fputs($fp, "\xEF\xBB\xBF"); // UTF-8 BOM !!!!!
        $delimiter = ',';
        fputcsv($fp, array("\t", "Module ID: ", $moduleId, "From: ", $from, "To:", $to));
        fputcsv($fp, array(), $delimiter);
        fputcsv($fp, array("#", "Module", "Solar panels temp", "Solar tank temp", "Solar tank level"
            , "Heater tank temp", "Heater tank pressure", "Lingh intensity",
            "Top of Solar tank temp", "Overflow tank temp", "Pipeline temp 1", "Pipeline temp 2",
            "Pipeline pressure", "Backup"), $delimiter);

        $j = 1;
        foreach ($sensors as $sens) {
            $put = array(
                $j,
                $moduleId,
                bindec($sens->cam_bien_dan_thu),
                bindec($sens->cam_bien_bon_solar),
                bindec($sens->cam_bien_muc_nuoc_bon_solar),
                bindec($sens->cam_bien_nhiet_do_bon_gia_nhiet),
                bindec($sens->cam_bien_ap_suat_bon_gia_nhiet),
                bindec($sens->cam_bien_buc_xa_dan_thu),
                bindec($sens->cam_bien_nhiet_dinh_bon_solar),
                bindec($sens->cam_bien_tran),
                bindec($sens->cam_bien_nhiet_do_duong_ong_1),
                bindec($sens->cam_bien_nhiet_do_duong_ong_2),
                bindec($sens->cam_bien_ap_suat_duong_ong),
                bindec($sens->du_phong)
            );
            fputcsv($fp, $put, $delimiter);
            $j++;
        }
        fclose($fp);
        die;
        // var_dump($from."|".$to."|".$moduleId);
        // die;
    }

    public function exportAlarmCsv($moduleId, $from, $to) {
        // $sensors = Sensor::getReport($from,$to,$moduleId);
        $alarms = Alarm::getReport($from, $to, $moduleId);
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '-1');
        $fileName = 'report_alarm_' . date('Ymd_His') . '.csv';
        ob_start();
        header('Content-Encoding: UTF-8');
        header("Content-type: text/x-csv; charset=UTF-8");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Content-Disposition: attachment;filename=' . $fileName);
        //  echo "\xEF\xBB\xBF"; //cau echo nay de hien thi duoc tieng viet trong file csv khi mo bang excel

        $fp = fopen('php://output', 'w');
        fputs($fp, "\xEF\xBB\xBF"); // UTF-8 BOM !!!!!
        $delimiter = ',';
        fputcsv($fp, array("\t", "Module ID: ", $moduleId, "From: ", $from, "To:", $to));
        fputcsv($fp, array(), $delimiter);
        fputcsv($fp, array("#", "Module", "Over heat", "Over Pressure", "Over Power", "Overflow", "Start alarm time", "Cancel alarm time"), $delimiter);

        $j = 1;
        foreach ($alarms as $alarm) {
            $put = array(
                $j,
                $moduleId,
                bindec($alarm->qua_nhiet),
                bindec($alarm->qua_ap_suat),
                bindec($alarm->tran_be),
                bindec($alarm->mat_dien),
                "'" . $alarm->time_start_alarm,
                "'" . $alarm->time_cancal_alarm
            );
            fputcsv($fp, $put, $delimiter);
            $j++;
        }
        fclose($fp);
        die;
        // var_dump($from."|".$to."|".$moduleId);
        // die;
    }

}
