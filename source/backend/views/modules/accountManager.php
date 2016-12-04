<?php

use backend\components\common\Utility;

$this->title = Yii::t('backend', 'Modules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row modules">
  <input type="hidden" value="<?php echo $model->id ?>" id="module-id">
  <div class="row row100">
    <div class="row20 params-left padding10">
      <input type="submit" value="Check Account" class="btn btn-primary"/>
    </div>
    <div class="row80 params-left" >
      <span id="money-info" style="vertical-align:middle"><?php echo $model->money ?></span>
    </div>
      <!-- <input type="button" class="btn btn-primary" value="Send to Module" /> -->

  </div>
  <br/>
  <div class="row row100">
    <div class="row20 params-left padding10">
      <input type="submit" value="Check Data" class="btn btn-primary"/>
    </div>
    <div class="row80 params-left" >
      <span id="data-info" style="vertical-align:middle"><?php echo $model->data ?></span>
    </div>

  </div>
  <br/>
  <form action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>" method="post">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
    <div class="row row100">
      <div class="row20 params-left padding10">
        <input type="submit" value="Charge Account" class="btn btn-primary"/>
      </div>
      <div class="row80 params-left" style="verticle-align:middle;height:100%" >
        <input type="text" class="form-control" style="width:50%;" name="card_info"/>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
function loadInfo(){
  console.log("reload module data");
  var id = $("#module-id").val();

  $.get("/modules/loadinfo?id="+id,{},function(values){
    console.log(data);
    // var values = JSON.parse(data);
    $("#money-info").html(values.money);
    $("#data-info").html(values.data);
  });

}
    setInterval(loadInfo(),10000);
</script>
