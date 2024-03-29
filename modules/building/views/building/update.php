<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\building\models\Building */

$this->title = Yii::t('app', 'Update') . ' ' . Yii::t('app', 'Building').' :'. $model->building_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->building_id, 'url' => ['view', 'id' => $model->building_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="building-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
