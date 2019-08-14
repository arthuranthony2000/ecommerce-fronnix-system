<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formapagamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formapagamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numCartao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mesValidade')->dropDownList([ '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', 10 => '10', 11 => '11', 12 => '12', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'anoValidade')->dropDownList([ 2016 => '2016', 2017 => '2017', 2018 => '2018', 2019 => '2019', 2020 => '2020', 2021 => '2021', 2022 => '2022', 2023 => '2023', 2024 => '2024', 2025 => '2025', 2026 => '2026', 2027 => '2027', 2028 => '2028', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nomeTitular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codSeguranca')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
