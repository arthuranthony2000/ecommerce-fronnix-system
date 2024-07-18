<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoprodutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidoproduto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'preco') ?>

    <?= $form->field($model, 'qtdProduto') ?>

    <?= $form->field($model, 'idPedido') ?>

    <?= $form->field($model, 'idProduto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
