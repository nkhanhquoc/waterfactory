<?php

use backend\models\ConfigurationLogSearch;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;

/* @var $this View */
/* @var $searchModel ConfigurationLogSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('backend', 'Configuration Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-log-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'module.name:raw:Module',
        'message',
        'createdBy.username',
        'created_time',
    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'fontAwesome' => true,
        'asDropdown' => false,
        'target' => '_self',
        'showConfirmAlert' => false,
    ]) . "<hr>\n" .
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
    ]);
    ?>
</div>
