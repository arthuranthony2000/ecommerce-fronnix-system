<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Fornecedor;

$number = $produto->idProduto;
?>

<h1 class="my-4">
    <small><?= Html::encode($produto['nomeProduto']) ?></small>
</h1>

<!-- Portfolio Item Row -->
<div class="row">

    <div class="col-md-8">
        <img class="img-fluid" src="<?= Html::encode($produto['imagem']) ?>" alt="">
    </div>

    <div class="col-md-4">
        <h3 class="my-3">Imagem Ilustrativa</h3>
        <p>Ideal para você e sua família curtirem com essa sofisticada tecnologia.</p>
        <h3 class="my-3">Excelente Estado</h3>
        <p style="overflow: scroll; height: 500px; width: 100%; overflow: auto"><?= Html::encode($produto['descricaoProduto']) ?></p>

        <p>
            <?php if (!Yii::$app->user->isGuest) : ?>
                <?php if (Yii::$app->user->identity->tipoUsuario == "cliente") : ?>
                    <?= Html::a(Yii::t('app', 'Comprar'), ['carrinho/add', 'idProduto' => $produto->idProduto, 'quantidade' => 1], ['class' => 'btn btn-success']) ?>
                <?php endif; ?>
            <?php else : ?>
                <p>Para realizar uma compra é preciso fazer o login na sua conta, por favor clique no botão Logar.</p>
                <?= Html::a(Yii::t('app', 'Logar'), ['site/login-compra', 'idProduto' => $produto->idProduto, 'idCategoria' => $produto->idCategoria], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
        </p>

        <h4>
            Preço do produto:
            <?= Html::encode($produto['valorProduto']) ?>
            R$.
        </h4>

        <?php $fornecedor = Fornecedor::findOne($produto->idFornecedor); ?>

        <h4>
            Contato do Fornecedor:
            <?= Html::encode($fornecedor->emailFornecedor) ?>
        </h4>
    </div>

</div>

<h3 class="my-4">Você pode se interessar também</h3>

<div class="row">
    <?php foreach ($consultas as $consulta) : ?>
        <div class="col-md-3 col-sm-6 mb-4">
            <a href="<?= Url::to(['site/detalhe', 'idProduto' => $consulta->idProduto, 'idCategoria' => $consulta->idCategoria]) ?>">
                <img class="img-fluid" style="max-height: 300px; overflow: hidden;" src="<?= Html::encode($consulta['imagem']) ?>" alt="">
            </a>
        </div>
    <?php endforeach; ?>
</div>
