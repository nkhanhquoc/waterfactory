<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Update'), 'url' => ['/modules/update?id=' . $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'System mode config'), 'url' => ['/modules/mode?id=' . $model->id]];
$urlOP = ($model->outputModes) ? ['/output-mode/update?id=' . $model->outputModes->id] : ['/output-mode/create' . '?module_id=' . $model->id];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Load Mode'), 'url' => $urlOP];
$urlPC = ($model->paramConfigs) ? ['/param-config/update?id=' . $model->paramConfigs->id] : ['/param-config/create' . '?module_id=' . $model->id];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Parameter Config'), 'url' => $urlPC];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Account'), 'url' => ['accountmanager', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->getModuleId() . ' - ' . \yii\helpers\Html::encode($model->name);
?>
<div class="output-mode-view">
    <?php if (Yii::$app->controller->id == 'modules' && Yii::$app->controller->action->id == 'view') { ?>
        <div class="bottom-menu">
            <ul>
                <li><a href="#" <?php echo $alarms->tran_be == '11' ? "class='alarm'" : '' ?>>OVER TANK</a></li>
                <li><a href="#">LOST CONNECTION</a></li>
                <li><a href="#" <?php echo $alarms->qua_nhiet == '11' ? "class='alarm'" : '' ?>>OVER HEAT</a></li>
                <li><a href="#" <?php echo $alarms->qua_ap_suat == '11' ? "class='alarm'" : '' ?>>OVER PRESSURE</a></li>
                <li><a href="#">LOST SUPPLY</a></li>
            </ul>
        </div>
    <?php } ?>
    <div class="diagram">
        <div class="left-content">
            <div class="c-00"><?php echo bindec($sensors->cam_bien_ap_suat_duong_ong); ?></div>
            <div class="c-01">&nbsp;</div>

            <div class="c-02"><p><?php echo bindec($sensors->cam_bien_dan_thu); ?>&deg;C</p></div>    
            <div class="icon-02"><img src="/images/03.png"/></div>

            <div class="c-03"><p><?php echo bindec($sensors->cam_bien_nhiet_dinh_bon_solar); ?>&deg;C</p></div>
            <div class="icon-03"><img src="/images/01.png"/></div>    

            <div class="c-04">&nbsp;</div>
            <div class="bg-04">
                <div class="ctn">
                <!--<span class="row-01"></span>-->
                    <span class="row-02"></span>
                    <span class="row-03"></span>
                </div>
            </div>

            <div class="c-05"><p><?php echo bindec($sensors->cam_bien_bon_solar); ?>&deg;C</p></div>
            <div class="icon-05"><img src="/images/01.png"/></div>    

            <div class="c-06">&nbsp;</div>
            <div class="bg-06-green <?php echo $statuses->bom_doi_luu_1 == '00' ? 'bg-green' : 'bg-red' ?>"></div>
            <div class="bg-06-red <?php echo $statuses->bom_doi_luu_2 == '00' ? 'bg-green' : 'bg-red' ?>"></div>    

            <div class="c-07">&nbsp;</div>
            <div class="bg-07-green <?php echo $model->van_dien_tu_ba_nga_up == '00' ? 'bg-green' : 'bg-red' ?>" van_dien_tu_ba_nga_up="<?php echo $model->van_dien_tu_ba_nga_up; ?>"></div>
            <div class="bg-07-red <?php echo $model->van_dien_tu_ba_nga_down == '00' ? 'bg-green' : 'bg-red' ?>" van_dien_tu_ba_nga_down="<?php echo $model->van_dien_tu_ba_nga_down; ?>"></div>   

            <div class="c-08"><p><?php echo bindec($sensors->cam_bien_nhiet_do_bon_gia_nhiet); ?>&deg;C</p></div>
            <div class="icon-08"><img src="/images/03.png"/></div>    

            <div class="c-09"><p><?php echo bindec($sensors->cam_bien_ap_suat_bon_gia_nhiet); ?>&deg;C</p></div>
            <div class="icon-09"><img src="/images/04.png"/></div>    

            <div class="c-10">&nbsp;</div>
            <div class="bg-10-red <?php echo $statuses->dien_tro_nhiet_bon_gia_nhiet_1 == '00' ? 'bg-green' : 'bg-red' ?>"></div>
            <div class="bg-10-green <?php echo $statuses->dien_tro_nhiet_bon_gia_nhiet_2 == '00' ? 'bg-green' : 'bg-red' ?>"></div>   

            <div class="c-11">&nbsp;</div> 
            <div class="bg-11 <?php echo $statuses->bom_nhiet_bon_gia_nhiet == '00' ? 'bg-green' : 'bg-red' ?>"></div>   

            <div class="c-12">&nbsp;</div>
            <div class="bg-12-green <?php echo $statuses->bom_tang_ap_1 == '00' ? 'bg-green' : 'bg-red' ?>"></div>
            <div class="bg-12-red <?php echo $statuses->bom_tang_ap_2 == '00' ? 'bg-green' : 'bg-red' ?>"></div>  

            <div class="c-13"><p><?php echo bindec($sensors->cam_bien_nhiet_dinh_bon_solar); ?>&deg;C</p></div>
            <div class="icon-13"><img src="/images/04.png"/></div>	

            <div class="c-14"><p><?php echo bindec($sensors->cam_bien_tran); ?>&deg;C</p></div>
            <div class="icon-14"><img src="/images/03.png"/></div>    

            <div class="c-15">&nbsp;</div>
            <div class="bg-15-green <?php echo $statuses->bom_cap_nuoc_lanh_1 == '00' ? 'bg-green' : 'bg-red' ?>"></div>
            <div class="bg-15-red <?php echo $statuses->bom_cap_nuoc_lanh_2 == '00' ? 'bg-green' : 'bg-red' ?>"></div> 

            <div class="c-16">&nbsp;</div>
            <div class="bg-16-green <?php echo $statuses->bom_hoi_duong_ong_1 == '00' ? 'bg-green' : 'bg-red' ?>"></div>
            <div class="bg-16-red <?php echo $statuses->bom_hoi_duong_ong_2 == '00' ? 'bg-green' : 'bg-red' ?>"></div> 

            <div class="c-17"><p><?php echo bindec($sensors->du_phong); ?>&deg;C</p></div>
            <div class="icon-17"><img src="/images/03.png"/></div>    

            <div class="c-18">&nbsp;</div>
        </div>

        <!--        <div class="right-content collapse1">
                    <ol>
                        <li><a href="#">Cường độ bức xạ của mặt trời</a></li>
                        <li><a href="#">Nhiệt độ dàn thu</a></li>
                        <li><a href="#">Nhiệt độ đỉnh bồn Solar</a></li>
                        <li><a href="#">Mức nước trong bồn Solar</a></li>
                        <li><a href="#">Nhiệt độ đấy bồn Solar</a></li>
                        <li><a href="#">Trạng thái bơm tối ưu (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Trạng thái van ba ngả (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Nhiệt độ bồn gia nhiệt</a></li>
                        <li><a href="#">Áp suất bồn gia nhiệt</a></li>
                        <li><a href="#">Trạng thái điện trở nhiệt (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Trạng thái bơm nhiệt (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Trạng thái bơm tăng áp (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Áp suất đường ống</a></li>
                        <li><a href="#">Nhiệt độ đường ống 1</a></li>
                        <li><a href="#">Trạng thái bơm cấp nước lạnh (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Trạng thái bơm hồi đường ống (<span class="txt-green">xanh ON</span>, <span class="txt-red">đỏ OFF</span>)</a></li>
                        <li><a href="#">Nhiệt độ đường ống</a></li>
                        <li><a href="#">Các vòi nước ra ở các tầng</a></li>                                                
                    </ol>
                </div>-->
    </div>
</div>

