<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\semester\models\SemesterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Semesters');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url' => ['/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semester-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Semester'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $visible = Yii::$app->user->can("/semester/*") ? true : false; ?>
	<?php
	\yii\widgets\Pjax::begin(
	    [
		'id' => 'semester-id',
		'enablePushState'=>false,
		'enableReplaceState' =>false,
	    ]
	); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'semester_id',
            'semester_name',
            'start_date',
            'end_date',
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
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
