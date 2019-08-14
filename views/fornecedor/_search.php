<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FornecedorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fornecedor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idFornecedor') ?>

    <?= $form->field($model, 'nomeFornecedor') ?>

    <?= $form->field($model, 'telefoneFornecedor') ?>

    <?= $form->field($model, 'emailFornecedor') ?>

    <?= $form->field($model, 'cnpjFornecedor') ?>

    <?php // echo $form->field($model, 'descricaoFornecedor') ?>

    <?php // echo $form->field($model, 'idEndereco') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
