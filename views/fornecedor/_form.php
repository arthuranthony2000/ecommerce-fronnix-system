<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Endereco;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedor */
/* @var $form yii\widgets\ActiveForm */

$tipoUsuario = Yii::$app->user->identity->tipoUsuario;

?>

<div class="fornecedor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeFornecedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefoneFornecedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailFornecedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cnpjFornecedor')->textInput(['maxlength' => true]) ?>

    <?= "<b>Endereco: </b>" . Html::activeDropDownList($model,'idEndereco',ArrayHelper::map(Endereco::find()->all(), 'idEndereco','numEstabelecimento','endereco'))?>

    <?= Html::a(Yii::t('app','Criar um Endereço'), ['endereco/create','tipoUsuario'=>$tipoUsuario],['class' => 'btn btn-success']) ?> 

    <?= $form->field($model, 'descricaoFornecedor')->textarea(['rows' => 6]) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
