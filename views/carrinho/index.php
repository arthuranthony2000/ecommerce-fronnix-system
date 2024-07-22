<?php

use app\models\Produto;
use yii\helpers\Url;
use yii\helpers\Html;

$this->registerJsFile('@web/js/scripts.js', ['depends' => '\yii\web\JqueryAsset']);
?>

<script>
    var link = '<?= Url::toRoute('carrinho/recalcular') ?>';
    var linkIndex = '<?= Url::toRoute('carrinho/index') ?>';
</script>

<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Produto</th>
                <th style="width:10%">Preço</th>
                <th style="width:10%">Desconto</th>
                <th style="width:8%">Quantidade</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($produtos as $produto) {
                $colecao = Produto::findOne($produto->idProduto);
                $subTotal = ($colecao->valorProduto - $colecao->desconto) * $produto->qtdProduto;
                $total += $subTotal;
                ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?= $colecao->imagem ?>"
                                    style="max-height: 100px; max-width: 100px; overflow: hidden;" alt="..."
                                    class="img-responsive" /></div>
                            <div class="col-sm-10" style="padding-left: 50px">
                                <h4 class="nomargin"><?= $colecao->nomeProduto ?></h4>
                                <p style="overflow: auto; max-height: 100px;"><?= $colecao->descricaoProduto ?></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?= $colecao->valorProduto ?> R$</td>
                    <td data-th="Price"><?= $colecao->desconto ?> R$</td>
                    <td data-th="Quantity">
                        <input idproduto="<?= $produto->idProduto ?>" type="number" min="1"
                            class="form-control text-center qtdProduto" value="<?= $produto->qtdProduto ?>">
                    </td>
                    <td data-th="Subtotal" class="text-center"><?= $subTotal ?></td>
                    <td class="actions" data-th="">
                        <?= Html::a('Excluir', ['carrinho/remover', 'idPedido' => $pedido->idPedido, 'idProduto' => $colecao->idProduto], ['class' => 'btn btn-danger btn-sm']) ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

        <tfoot>
            <tr>
                <td><a href="<?= Url::to(['site/index']) ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                        Continue Comprando</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>R$<?= $total ?></strong></td>
                <td>
                    <?php if ($comp > 0) { ?>
                        <a href="<?= Url::to(['formapagamento/create', 'idPedido' => $pedido->idPedido]) ?>"
                            class="btn btn-success btn-block">Finalizar <i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                </td>
            </tr>
        </tfoot>

    </table>
</div>