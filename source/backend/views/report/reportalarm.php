<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\widgets\AwsGridView;
use common\socket\Socket;
$this->title = Yii::t('backend', 'Report Alarms');
$this->params['breadcrumbs'][] = $this->title;
?>
<form method="post" action="/index.php/report/reportalarm" id="report-sensor-alarm">
  <div class="params">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">

    <select class="row20" id="module_id" name="module_id">
        <?php foreach ($modules as $key => $m): ?>
            <option value="<?php echo $key ?>" <?php if ($module_id == $key) echo 'selected="selected"'; ?>><?php echo $m ?></option>
        <?php endforeach; ?>
    </select>
    From:
    <input type="text" name="from" id="report_from" value="<?php echo $from ?>">

    To:
    <input type="text" name="to" id="report_to" value="<?php echo $to ?>">

    <input type="hidden" name="export" id="export" value="0">
    <button onclick="drawGraph()" class="btn btn-primary">Report</button>
    <button onclick="exportFile()" class="btn btn-primary">Excel</button>
  </div>
</form>

<?php if(count($alarms) > 0 ):?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
console.log("start chart");
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(initChart);

function initChart() {
  console.log("init chart alarm");
  var quanhiet = initData();
  var quaapsuat = initData();
  var tranbe = initData();
  var matdien = initData();

quanhiet.addRows(<?php echo count($alarms)?>);
quaapsuat.addRows(<?php echo count($alarms)?>);
tranbe.addRows(<?php echo count($alarms)?>);
matdien.addRows(<?php echo count($alarms)?>);
<?php foreach($alarms as $k => $al):?>
  quanhiet = addData(quanhiet,<?php echo $k ?>,'<?php echo $al->time_start_alarm."     -      ".$al->time_cancal_alarm ?>',<?php echo bindec($al->qua_nhiet)?>);
  quaapsuat = addData(quaapsuat,<?php echo $k ?>,'<?php echo $al->time_start_alarm."-".$al->time_cancal_alarm ?>',<?php echo bindec($al->qua_ap_suat)?>);
  tranbe = addData(tranbe,<?php echo $k ?>,'<?php echo $al->time_start_alarm."    -   ".$al->time_cancal_alarm ?>',<?php echo bindec($al->tran_be)?>);
  matdien = addData(matdien,<?php echo $k ?>,'<?php echo $al->time_start_alarm."-".$al->time_cancal_alarm ?>',<?php echo bindec($al->mat_dien)?>);
<?php endforeach; ?>
  drawChart(quanhiet,'draw-qua-nhiet','Cảnh báo quá nhiệt');
  drawChart(quaapsuat,'draw-quaapsuat','Cảnh báo quá áp suất');
  drawChart(tranbe,'draw-tranbe','Cảnh báo tràn bể');
  drawChart(matdien,'draw-matdien','Cảnh báo mất điện');
}

function initData(){
  var data = new google.visualization.DataTable();
  data.addColumn('string','time');
  data.addColumn('number','value');
  return data;

}

function addData(data,k,val1, val2){
  data.setCell(k,0,val1);
  data.setCell(k,1,val2);
  return data;
}

function drawChart(data, id,tit){
  $('#report-view').append('<div id="'+id+'"></div>');
  var options = {
    chart: {
      title: tit,
    },
    width: 900,
    height: 200,
    vAxis: { ticks: [{v:0,f:'OFF'},{v:3,f:'ON'}] }
  };

  var chart = new google.visualization.SteppedAreaChart(document.getElementById(id));
  console.log("draw "+tit);
  chart.draw(data, options);
}

function exportFile(){
  $('#export').val(1);
  $('#report-sensor-alarm').submit();
}

function drawGraph(){
  $('#export').val(0);
  $('#report-sensor-alarm').submit();
}

</script>
<?php endif; ?>

<div id="report-view">

</div>
