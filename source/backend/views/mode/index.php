<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\widgets\AwsGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Modes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mode-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=
        Html::a(Yii::t('backend', 'Create {modelClass}', [
                    'modelClass' => 'Mode',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>
    <?php
    Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);
    ?>
    <?=
    AwsGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'image_path',
            'createdBy.username:html:Tạo bởi',
            'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php
    Pjax::end();
    ?>
</div>
