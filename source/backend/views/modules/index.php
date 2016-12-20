<div class="row modules">
    <?php
    $data = $dataProvider->getModels();
    if (!empty($data)) {
        foreach ($data as $val) {
            $url = 'javascript:void(0);';
            $img = $val->getImg();
            if ($val->imsis->status == CONFIRM_STATUS) {
                $url = '/modules/view?id=' . $val->id;
                if ($img == MODULE_SETTING) {
                    $url = '/mode/index?module_id=' . $val->id;
                }
            }
            ?>
            <div class="col-md-4">
                <a href="<?php echo $url; ?>" title="<?php echo \yii\helpers\Html::encode($val->name); ?>">
                    <img class="img-responsive" src="<?php echo $img; ?>" alt="<?php echo \yii\helpers\Html::encode($val->name); ?>" />
                    <p class="">ID: <?php echo \yii\helpers\Html::encode($val->getModuleId()); ?></p>
                    <p class=""><?php echo \yii\helpers\Html::encode($val->name); ?></p>
                </a>
            </div>
            <?php
        }
    }
    ?>
</div>
