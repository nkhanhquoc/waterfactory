<div class="row modules">
    <?php
    $data = $dataProvider->getModels();
    if (!empty($data)) {
        foreach ($data as $val) {
            $url = 'javascript:void(0);';
            if ($val->imsis->status == CONFIRM_STATUS) {
                $url = '/modules/view?id=' . $val->id;
            }
            ?>
            <div class="col-md-4">
                <a href="<?php echo $url; ?>" title="<?php echo \yii\helpers\Html::encode($val->name); ?>">
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
