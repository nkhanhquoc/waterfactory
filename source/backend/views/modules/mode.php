<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Modules */
/* @var $form yii\widgets\ActiveForm */
$Mode = backend\models\Mode::getAll();

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->getModuleId() . ' - ' . \yii\helpers\Html::encode($model->name);
?>
<h1>Chọn chế độ hoạt động</h1>
<!-- <div class="modules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mode_id')->dropDownList(backend\models\Mode::getAll())->label('Chế độ hoạt động') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Save and send to Module'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div> -->

<div class="info-diagram">
  <form method="post" id="form-choose-mode" action="/index.php/modules/mode?id=<?php echo $model->id ?>">
    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
  <div class="check-account">
            <h3 class="title">ID: <?php echo $model->id ?></h3>
            <p align="center">Choose your system:</p>
            <div class="row-check-account">
              <input type="hidden" value="" name="mode_id" id="mode_id">
              <p align="center">
                <?php foreach($modes as $mode): ?>
                  <a href="javascript:void(0)" id="mode_<?php echo $mode->id ?>" onclick="chooseMode('<?php echo $mode->id ?>')" class="btn-check <?php if($model->mode_id == $mode->id) echo 'active' ;?>">
                    <!-- <img src="<?php echo $mode->getUrlImage(300,220) ?>" alt="<?php echo $mode->name ?>"/> -->
                    <?php echo $mode->getUrlImage(300,220) ?>
                  </a>
                <?php endforeach; ?>
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
