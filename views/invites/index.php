<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvitesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invites-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'invite',
            'status',
            'date_status',
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
