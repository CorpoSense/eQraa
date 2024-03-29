<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\schoolyear\models\Schoolyear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schoolyear-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col col-md-12">
        <?= $form->field($model, 'school_year_alias')->textInput(['maxlength' => 45]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col col-md-6">
        <?php echo $form->field($model, 'end')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'End Date') .' ...'],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => Yii::$app->params['datePickerFormat']
            // 'format' => Yii::$app->formatter->dateFormat
            // 'format' => 'yyyy-mm-dd '
        ]
        ]); ?>
      </div>

      <div class="col col-md-6">
        <?php echo $form->field($model, 'start')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => Yii::t('app', 'Start Date') .' ...'],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => Yii::$app->params['datePickerFormat']
            // 'format' => Yii::$app->formatter->dateFormat
            // 'format' => 'yyyy-mm-dd'
              ]
          ]); ?>
      </div>

    </div>

    <?php
    /**
     * Hidden inputs
     */
    if($model->isNewRecord){
        echo $form->field($model, 'created_by')->hiddenInput(['value' => isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : 2])->label(false);
        echo $form->field($model, 'updated_by')->hiddenInput(['value' => isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : 2])->label(false);
    } else {
        echo $form->field($model, 'updated_by')->hiddenInput(['value' => isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : 2])->label(false);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back to list'), ['index'], ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
