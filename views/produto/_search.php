<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idProduto') ?>

    <?= $form->field($model, 'nomeProduto') ?>

    <?= $form->field($model, 'valorProduto') ?>

    <?= $form->field($model, 'desconto') ?>

    <?= $form->field($model, 'estoque') ?>

    <?php // echo $form->field($model, 'idCategoria') ?>

    <?php // echo $form->field($model, 'marcaProduto') ?>

    <?php // echo $form->field($model, 'descricaoProduto') ?>

    <?php // echo $form->field($model, 'idFornecedor') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
