<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Usuario;
use app\models\Pedido;
use app\models\Pedidoproduto;
use app\models\Produto;

?>

<h1 class="my-4">
        <small>Produtos Vendidos:</small>
      </h1>      
      <div class="row">
        <div class="col-md-4">
          
          <table class="borda">
            <thead class="borda">
              <tr class="borda">
                <th class="borda">Imagem Ilustrativa</th>
                <th class="borda">Nome</th>
                <th class="borda">Valor</th>
                <th class="borda">Marca</th>
                <th class="borda">Estoque</th>
                <th class="borda">Solicitado por</th>
                <th class="borda">Quantidade Solicitada</th>
                <th class="borda">Pagou?</th>
                <th class="borda">Detalhes</th>                 
              </tr>
            </thead>

            <?php
                  foreach ($produtos as $produto) {

                          $pedidos = Pedidoproduto::find()->where(['idProduto'=>$produto->idProduto])->all();
                          foreach ($pedidos as $pedido) {
                             $valido = Pedido::findOne($pedido->idPedido);
                             $usuario = Usuario::findOne($valido->idUsuario);
                           
            ?>
            <tbody class="borda">
              <tr class="borda">
                <td class="borda"><img style="height: 100px;" class="img-fluid" src="<?= $produto['imagem'] ?>" alt=""></td>
                <td class="borda"><?= $produto->nomeProduto ?></td>
                <td class="borda"><?= $produto->valorProduto ?></td>
                <td class="borda"><?= $produto->marcaProduto ?></td>
                <td class="borda"><?= $produto->estoque ?></td>
                <td class="borda"><?= $usuario->username ?></td>
                <td class="borda"><?= $pedido->qtdProduto ?></td>
                <?php
                  if($valido->finalizado == '1'){
                ?>
                <td class="borda">SIM</td>

                <?php
                   }
                   else{
                ?>
                  <td class="borda">NÃO</td>

                  <?php
                }
                  ?>

                <td class="borda"><a href="<?= Url::toRoute(['gerencia/cliente','idPedido'=>$pedido->idPedido,'idUsuario'=>$usuario->idUsuario]) ?>">Informações</a></td>
              </tr>
            </tbody>

            <?php
                }
              }
            ?>
          </table>

        </div>
      </div>