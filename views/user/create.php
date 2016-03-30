<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cities;
use app\models\Countries;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create col-xs-offset-2 col-xs-8">


    <div class="">
        <h2 class="text-center"><?= Html::encode($this->title) ?></h2>
    </div>
    <hr/>
    <?php if (Yii::$app->session->getAllFlashes()): ?>
        <div class="row">
            <div class="col-xs-12">
                <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
                    <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                        <div class="alert alert-<?= $type ?>">
                            <?= $message ?>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>
    <div class="users-form">

        <?php $form = ActiveForm::begin([
            'id' => 'users-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-3 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true])->label('Телефон') ?>

        <?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(Countries::find()->all(), 'id_country', 'country_name'),
            [
                'prompt' => 'Выберите страну',
                'onchange' => '
                $.post("index.php?r=user/list&id='.'"+$(this).val(),
                    function(data){
                        $("select#users-id_city").html(data);
                    });'
            ])?>

        <?= $form->field($model, 'id_city')->dropDownList(ArrayHelper::map(Cities::find()->all(), 'id_city', 'city_name'),
            [
                'prompt' => 'Выберите город',
            ])?>

        <?= $form->field($model, 'invite')->textInput(['maxlength' => true]) ?>

        <div class="form-group row">
            <div class="col-xs-offset-2 col-xs-4">
                <?= Html::submitButton( 'Регистрация' , ['class' => 'btn btn-success', 'style' => 'width:100%;']) ?>
            </div>
            <div class="col-xs-offset-1 col-xs-4">
                <?= Html::a('Очистить', ['/user/create'],['class' => 'btn btn-success'] ) ?>
            </div>

        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
