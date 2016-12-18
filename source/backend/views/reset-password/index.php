<?php

use yii\helpers\Html;

$this->title = "Reset default password";
?>
<h1><?= Html::encode($this->title) ?></h1>
<form method="post" action="/index.php/reset-password/index">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
    <div class="params">
        <div class="row100 text-center">
            <h1 class="title"><?php echo $module->getModuleId() . ' - ' . \yii\helpers\Html::encode($module->name); ?></h1>
            <input type="submit" value="Update" class="btn btn-primary"/>
            <!-- <input type="button" class="btn btn-primary" value="Send to Module" /> -->
        </div>
    </div>

</form>
