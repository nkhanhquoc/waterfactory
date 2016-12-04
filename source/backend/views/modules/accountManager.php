<?php

use backend\components\common\Utility;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->getModuleId() . ' - ' . \yii\helpers\Html::encode($model->name);
?>
<div class="row modules">
    <input type="hidden" id="module-id" value="<?php echo $model->id ?>">
    <form method="post" action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
        <input type="hidden" name="check" value="1">
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
    </form>
    <br/>
    <form action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>" method="post">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
        <input type="hidden" name="pay" value="1">
        <div class="row row100">
            <div class="row20 params-left padding10">
                <input type="submit" value="Charge Account" class="btn btn-primary"/>
            </div>
            <div class="row80 params-left" style="verticle-align:middle;height:100%" >
                <input type="text" maxlength="16" class="form-control" style="width:50%;" name="card_info"/>
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
            $("#money-info").html(values.money);
            $("#data-info").html(values.data);
        });

    }

    setInterval(function () {
        console.log("reload module data");
        var id = $("#module-id").val();

        $.get("/modules/loadinfo?id=" + id, {}, function (values) {
            // console.log(data);
            // var values = JSON.parse(data);
            $("#money-info").html(values.money);
            $("#data-info").html(values.data);
        });

    }, 10000);
</script>
