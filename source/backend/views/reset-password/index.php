<?php

use yii\helpers\Html;

$this->title = "Reset mật khẩu mặc định";
?>
<h1><?= Html::encode($this->title) ?></h1>
<form method="post" action="/index.php/reset-password/index">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
    <div class="params">
        <div class="row80 params-right">

            <div class="row50 padding10">
                <select class="form-control row80" name="module_id">
                    <?php foreach ($modules as $key => $m): ?>
                        <option value="<?php echo $key ?>"><?php echo $m ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row100">
            <input type="submit" value="Cập nhật" class="btn btn-primary"/>
            <!-- <input type="button" class="btn btn-primary" value="Send to Module" /> -->
        </div>
    </div>

</form
