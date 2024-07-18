<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Endereco;
use app\models\Usuario;
use yii\web\UrlManager;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */

$tipoUsuario = Yii::$app->user->identity->tipoUsuario;


?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sobrenomeCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefoneCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpfCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rgCliente')->textInput(['maxlength' => true]) ?>

    <?= "<b>Endereço: </b>" . Html::activeDropDownList($model,'idEndereco',ArrayHelper::map(Endereco::find()->all(), 'idEndereco','numEstabelecimento','endereco'))?>

    <?= Html::a(Yii::t('app','Criar um Endereço'), ['endereco/create','tipoUsuario'=>$tipoUsuario],['class' => 'btn btn-success']) ?>

    <?= $form->field($model, 'dataNascimento')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
