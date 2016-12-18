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
                    <img class="img-responsive" src="<?php echo $val->getImg(); ?>" alt="<?php echo \yii\helpers\Html::encode($val->name); ?>" />
                    <p class="">ID: <?php echo \yii\helpers\Html::encode($val->getModuleId()); ?></p>
                    <p class=""><?php echo \yii\helpers\Html::encode($val->name); ?></p>
                </a>
            </div>
            <?php
        }
    }
    ?>
</div>
