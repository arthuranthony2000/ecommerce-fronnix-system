<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;
use app\models\Fornecedor;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeProduto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valorProduto')->textInput() ?>

    <?= $form->field($model, 'desconto')->textInput() ?>

    <?= $form->field($model, 'estoque')->textInput(['maxlength' => true]) ?>

    <?= "<b>Categoria: </b>" . Html::activeDropDownList($model,'idCategoria',ArrayHelper::map(Categoria::find()->all(), 'idCategoria', 'nomeCategoria'))?>

    <?= $form->field($model, 'marcaProduto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricaoProduto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imagem')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
