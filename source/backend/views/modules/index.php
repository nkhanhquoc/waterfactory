<?php

use backend\components\common\Utility;

$this->title = Yii::t('backend', 'Modules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row modules">
    <?php
    $data = $dataProvider->getModels();
    if (!empty($data)) {
        foreach ($data as $val) {
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
