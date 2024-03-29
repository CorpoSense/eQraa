<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\schoolyear\models\SchoolyearSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'School Years');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url' => ['/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schoolyear-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create'). ' '.Yii::t('app', 'School Year'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $visible = Yii::$app->user->can("/schoolyear/*") ? true : false; ?>
    <?php
    \yii\widgets\Pjax::begin(
            [
                'id' => 'school-year-id',
                'enablePushState' => false,
                'enableReplaceState' => false,
            ]
    );
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'school_year_id'/* => [
              'label' => 'N° School Year',
              'format' => 'raw',
              'value' => function ($data)
              {
                return Html::a($data->school_year_id,'schoolyear/view/'.$data->school_year_id);
              }
            ]*/,
            'start',
            'end',
            'school_year_alias',
            //'active',
            [
                'class' => '\pheme\grid\ToggleColumn',
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'is_status',
                'enableAjax' => true,
                'filter' => ['0' => Yii::t('app', 'Active'), '1' => Yii::t('app', 'Inactive')]
            ],
            //'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'app\components\CustomActionColumn',
                'visible' => $visible,
            ],
        ],
    ]);

    ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
