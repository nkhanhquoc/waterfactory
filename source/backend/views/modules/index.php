<?php

use backend\components\common\Utility;
?>
<div class="row modules">
    <?php
    $data = $dataProvider->getModels();
    if (!empty($data)) {
        foreach ($data as $val) {
            $route = Yii::$app->controller->route;
            $arrayParams = ['p1' => 'v1', 'p2' => 'v2'];
            $params = array_merge([$route], $arrayParams);
            ?>
            <div class="col-md-4">
                <a href="/modules/view?id=<?php echo $val->id; ?>" title="<?php echo \yii\helpers\Html::encode($val->name); ?>">
                    <?php
                    $thumb = '';
                    if (isset($val->thumb) && !empty($val->thumb)) {
                        $thumb = $val->thumb;
                    }
                    ?>
                    <img class="img-responsive" src="<?php echo Utility::getThumbImg($thumb); ?>" alt="<?php echo \yii\helpers\Html::encode($val->name); ?>" />
                    <p class="">ID: <?php echo \yii\helpers\Html::encode($val->getModuleId()); ?></p>
                    <p class=""><?php echo \yii\helpers\Html::encode($val->name); ?></p>
                </a>
            </div>
            <?php
        }
    }
    ?>
</div>
