<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormapagamentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formapagamento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idFormaPagamento') ?>

    <?= $form->field($model, 'numCartao') ?>

    <?= $form->field($model, 'mesValidade') ?>

    <?= $form->field($model, 'anoValidade') ?>

    <?= $form->field($model, 'nomeTitular') ?>

    <?php // echo $form->field($model, 'codSeguranca') ?>

    <?php // echo $form->field($model, 'idPedido') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
