<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\widgets\AwsGridView;
use common\socket\Socket;

$this->title = Yii::t('backend', 'Report Sensors');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="title"><?php echo $module->getModuleId() . ' - ' . \yii\helpers\Html::encode($module->name); ?></h1>
<form method="post" action="/index.php/report/index" id="report-sensor-alarm">
    <div class="params">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">

        From:
        <input type="text" name="from" id="report_from" value="<?php echo $from ?>">

        To:
        <input type="text"  name="to" id="report_to" value="<?php echo $to ?>">

        <input type="hidden" name="export" id="export" value="0">
        <button onclick="drawGraph()" class="btn btn-primary">Report</button>
        <button onclick="exportFile()" class="btn btn-primary">Excel</button>
    </div>
</form>

<?php if (count($sensors) > 0): ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


                console.log("start chart");
                google.charts.load('current', {'packages': ['line']});
                google.charts.setOnLoadCallback(initChart);

                function initChart() {
                    console.log("init chart");
                    var danthu = initData();
                    var bonsolar = initData();
                    var mucnuoc_bonsolar = initData();
                    var nhietdo_bongianhiet = initData();
                    var apsuat_bongianhiet = initData();
                    var bucxa_danthu = initData();
                    var nhietdinh_bonsolar = initData();
                    var tran = initData();
                    var nhietdo_duongong_2 = initData();
                    var duphong = initData();
                    var apsuat_duongong = initData();
                    var nhietdo_duongong_1 = initData();

                    danthu.addRows(<?php echo count($sensors) ?>);
                    bonsolar.addRows(<?php echo count($sensors) ?>);
                    mucnuoc_bonsolar.addRows(<?php echo count($sensors) ?>);
                    nhietdo_bongianhiet.addRows(<?php echo count($sensors) ?>);
                    apsuat_bongianhiet.addRows(<?php echo count($sensors) ?>);
                    bucxa_danthu.addRows(<?php echo count($sensors) ?>);
                    nhietdinh_bonsolar.addRows(<?php echo count($sensors) ?>);
                    tran.addRows(<?php echo count($sensors) ?>);
                    nhietdo_duongong_2.addRows(<?php echo count($sensors) ?>);
                    duphong.addRows(<?php echo count($sensors) ?>);
                    apsuat_duongong.addRows(<?php echo count($sensors) ?>);
                    nhietdo_duongong_1.addRows(<?php echo count($sensors) ?>);

              <?php foreach ($sensors as $k => $sens): ?>
                    danthu = addData(danthu,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_dan_thu) ?>);
                    bonsolar = addData(danthu,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_bon_solar) ?>);
                    mucnuoc_bonsolar = addData(mucnuoc_bonsolar,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_muc_nuoc_bon_solar) ?>);
                    nhietdo_bongianhiet = addData(nhietdo_bongianhiet,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_nhiet_do_bon_gia_nhiet) ?>);
                    apsuat_bongianhiet = addData(apsuat_bongianhiet,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_ap_suat_bon_gia_nhiet) ?>);
                    bucxa_danthu = addData(bucxa_danthu,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_buc_xa_dan_thu) ?>);
                    nhietdinh_bonsolar = addData(nhietdinh_bonsolar,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_nhiet_dinh_bon_solar) ?>);
                    tran = addData(tran,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_tran) ?>);
                    nhietdo_duongong_2 = addData(nhietdo_duongong_2,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_nhiet_do_duong_ong_2) ?>);
                    duphong = addData(duphong,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->du_phong) ?>);
                    apsuat_duongong = addData(apsuat_duongong,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_ap_suat_duong_ong) ?>);
                    nhietdo_duongong_1 = addData(nhietdo_duongong_1,<?php echo $k ?>, '<?php echo $sens->created_at ?>',<?php echo bindec($sens->cam_bien_nhiet_do_duong_ong_1) ?>);
              <?php endforeach; ?>

                    drawChart(danthu, 'draw-dan-thu', 'Solar panels temp');
                    drawChart(bonsolar, 'draw-bon-solar', 'Solar tank temp');
                    drawChart(mucnuoc_bonsolar, 'draw-mucnuoc_bonsolar', 'Solar tank level');
                    drawChart(nhietdo_bongianhiet, 'draw-nhietdo_bongianhiet', 'Heater tank temp');
                    drawChart(apsuat_bongianhiet, 'draw-apsuat_bongianhiet', 'Heater tank pressure');
                    drawChart(bucxa_danthu, 'draw-bucxa_danthu', 'Lingh intensity');
                    drawChart(nhietdinh_bonsolar, 'draw-nhietdinh_bonsolar', 'Top of Solar tank temp');
                    drawChart(tran, 'draw-tran', 'Overflow temp');
                    drawChart(duphong, 'draw-duphong', 'Backup temp');
                    drawChart(apsuat_duongong, 'draw-apsuat_duongong', 'Pipeline pressure');
                    drawChart(nhietdo_duongong_1, 'draw-nhietdo_duongong_1', 'Pipeline temp 1');
                    drawChart(nhietdo_duongong_2, 'draw-nhietdo_duongong_2', 'Pipeline temp 2');
                }

                function initData() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'value');
                    return data;

                }
                function addData(data, k, val1, val2) {
                    data.setCell(k, 0, val1);
                    data.setCell(k, 1, val2);
                    return data;
                }

                function drawChart(data, id, tit) {
                    $('#report-view').append('<div id="' + id + '"></div>');
                    var options = {
                        chart: {
                            title: tit,
                        },
                        width: 900,
                        height: 300,
                        vAxis: {
                            viewWindowMode: 'explicit',
                            viewWindow: {
                                min: 0
                            }

                        },
                        chartArea:{ backgroundColor: '#f1f8e9'}
                    };

                    var chart = new google.charts.Line(document.getElementById(id));
                    console.log("draw " + tit);
                    chart.draw(data, options);
                }

                function exportFile() {
                    $('#export').val(1);
                    $('#report-sensor-alarm').submit();
                }

                function drawGraph() {
                    $('#export').val(0);
                    $('#report-sensor-alarm').submit();
                }
    </script>
<?php endif ?>
<div id="report-view">

</div>
