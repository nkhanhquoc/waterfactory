<div class="row modules">
    <?php
    $data = $dataProvider->getModels();
    if (!empty($data)) {
        foreach ($data as $val) {
            $url = 'javascript:void(0);';
            $img = $val->getImg();
            $alarm = ($_GET['alarm']) ? intval($_GET['alarm']) : 0;
            if ($alarm) {
                $continue = false;
                $alarmModel = $val->alarms;
                switch ($alarm) {
                    case 1:
                        if ($alarmModel->tran_be != '11') {
                            $continue = true;
                            break;
                        }
                        break;
                    case 3:
                        if ($alarmModel->qua_nhiet != '11') {
                            $continue = true;
                            break;
                        }
                        break;
                    case 4:
                        if ($alarmModel->qua_ap_suat != '11') {
                            $continue = true;
                            break;
                        }
                        break;
                    case 5:
                        if ($alarmModel->mat_dien != '11') {
                            $continue = true;
                            break;
                        }
                        break;
                }
                if ($continue) {
                    continue;
                }
            }
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
