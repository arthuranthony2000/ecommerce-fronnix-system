<?php


use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Pedidoproduto;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */




$pedidos = Pedidoproduto::find()->
where('Pedidoproduto.idProduto=:idProduto', [':idProduto' => $model->idProduto])
->All();                

$j=0;
    foreach ($pedidos as $pedido) {                           
        $j++;
    }    

$this->title = $model->idProduto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-view">

    <h1><a href="<?= Url::toRoute(['gerencia/pedido','idProduto'=>$model->idProduto]) ?>">Foram realizados <?= $j ?> pedidos nesse produto.</a></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idProduto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idProduto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProduto',
            'nomeProduto',
            'valorProduto',
            'desconto',
            'estoque',
            'idCategoria',
            'marcaProduto',
            'descricaoProduto:ntext',
            'idFornecedor',
            'imagem',   
        ],
    ]) ?>

</div>
