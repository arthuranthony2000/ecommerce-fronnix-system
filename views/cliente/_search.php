<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCliente') ?>

    <?= $form->field($model, 'nomeCliente') ?>

    <?= $form->field($model, 'sobrenomeCliente') ?>

    <?= $form->field($model, 'emailCliente') ?>

    <?= $form->field($model, 'telefoneCliente') ?>

    <?php // echo $form->field($model, 'cpfCliente') ?>

    <?php // echo $form->field($model, 'rgCliente') ?>

    <?php // echo $form->field($model, 'dataNascimento') ?>

    <?php // echo $form->field($model, 'idEndereco') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
