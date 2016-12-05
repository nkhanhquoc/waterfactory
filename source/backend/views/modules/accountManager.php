<?php

use backend\components\common\Utility;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->getModuleId() . ' - ' . \yii\helpers\Html::encode($model->name);
?>
<div class="row modules padding10">
    <input type="hidden" id="module-id" value="<?php echo $model->id ?>">
    <div class="row row100">
        <div class="row20 params-left padding10">
            Module
        </div>
        <div class="row80 params-right">
            <div class="row50 padding10">
                <select class="form-control row80" id="module_id" name="module_id" onchange="updateModuleInput()">
                    <?php foreach ($modules as $key => $m): ?>
                        <option value="<?php echo $key ?>" <?php if ($model->id == $key) echo 'selected="selected"'; ?>><?php echo $m."-".$model->id ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="row20">&nbsp;</span>
            </div>
        </div>
    </div>
    <form method="post" action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
        <input type="hidden" name="check" value="1">
        <div class="row row100">
            <div class="row20 params-left padding10">
                <input type="submit" value="Check Account" class="btn btn-primary"/>
            </div>
            <div class="row80 params-left padding10" >
                <input type="text" id="money-info" class="form-control" disabled style="vertical-align:middle;width:50%;" value="<?php echo $model->money ?>">
            </div>
        </div>
        <br/>
        <div class="row row100">
            <div class="row20 params-left padding10">
                <input type="submit" value="Check Data" class="btn btn-primary"/>
            </div>
            <div class="row80 params-left padding10" >
                <input type="text" id="data-info" disabled class="form-control" style="vertical-align:middle;width:50%;" value="<?php echo $model->data ?>">
            </div>
        </div>
    </form>
    <br/>
    <form action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>" id="pay_card_form" method="post">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
        <input type="hidden" name="pay" value="1">
        <div class="row row100">
            <div class="row20 params-left padding10">
                <input type="button" onclick="checkCard()" value="Charge Account" class="btn btn-primary"/>
            </div>
            <div class="row80 params-left padding10" style="verticle-align:middle;height:100%" >
                <input type="text" maxlength="16" class="form-control" id="card_info" style="width:50%;" name="card_info"/>
            </div>
        </div>
    </form>
</div>
<?php if ($alert): ?>
    <script type="text/javascript">
        alert('<?php echo $alert ?>')
    </script>
<?php endif; ?>
<script type="text/javascript">

    function loadInfo() {
        console.log("reload module data");
        var id = $("#module-id").val();

        $.get("/modules/loadinfo?id=" + id, {}, function (values) {
            console.log(values);
            // var values = JSON.parse(data);
            $("#money-info").val(values.money);
            $("#data-info").val(values.data);
        });

    }

    setInterval(function () {
        console.log("auto reload module data");
        var id = $("#module-id").val();

        $.get("/modules/loadinfo?id=" + id, {}, function (values) {
            console.log(values);
            // var values = JSON.parse(data);
            $("#money-info").val(values.money);
            $("#data-info").val(values.data);
        });

    }, 10000);

  function updateModuleInput(){
    $('#module-id').val($('#module_id').val());
    loadInfo();
  }

  function checkCard(){
    var card = $('#card_info').val();
    if(card.length < 12|| card.length > 16){
      alert("Mã thẻ cào chưa chính xác!");
       $('#card_info').focus();
       return false;
    }

    if(!$.isNumeric(card)){
      alert("Mã thẻ cào chưa chính xác!");
       $('#card_info').focus();
       return false;
    }
    $('#pay_card_form').submit();
  }
</script>
