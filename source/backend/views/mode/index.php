<?php

use backend\models\ModeSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel ModeSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('backend', 'Modes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-diagram">
  <form method="post" id="form-choose-mode" action="/index.php/modules/mode?id=<?php echo $module->id ?>">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
    <!-- <?= Html::csrfMetaTags() ?> -->
  <div class="check-account">
            <h3 class="title">ID: <?php echo $module->id ?></h3>
            <p align="center">Choose your system:</p>
            <div class="row-check-account">
              <input type="hidden" value="" name="mode_id" id="mode_id">
              <p align="center">
                <?php foreach($modes as $mode): ?>
                  <a href="javascript:void(0)" id="mode_<?php echo $mode->id ?>" onclick="chooseMode('<?php echo $mode->id ?>')" class="btn-check <?php if($module->mode_id == $mode->id) echo 'chosen' ;?>">
                    <!-- <img src="<?php echo $mode->getUrlImage(300,220) ?>" alt="<?php echo $mode->name ?>"/> -->
                    <?php echo $mode->getUrlImage(300,220) ?>
                  </a>
                <?php endforeach; ?>
                <a href="/mode/create">
                  <img src="/images/add.png" style="width:300px;height:220px" alt=""/>
                </a>
              </p>
              <p align="center"><a href="javascript:void(0)" onclick="$('#form-choose-mode').submit()" class="btn-link">Next</a></p>
            </div>
      </div>
      </form>
</div>

<script type="text/javascript">
function chooseMode(id){
  $('#mode_id').val(id);
  $('a').removeClass("chosen");
  $('#mode_'+id).addClass("chosen");
}
</script>
<style>
  .chosen {
    background-color: #1caf9a !important;
  }
</style>
