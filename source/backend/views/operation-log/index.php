<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\widgets\AwsGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OperationLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Operation Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-log-index">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Operation Log',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
    Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);
    ?>
            <?= AwsGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

                    'id',
            'created_time',
            'module_id',
            'message',

        ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>
        <?php 
    Pjax::end();
    ?>
</div>
