<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Usuario;
use app\models\Cliente;
use app\models\Endereco;
use app\models\Pedido;
use app\models\Pedidoproduto;


?>

<h1 class="my-4">




        <small>Pedidos relacionados a <?= $produto['nomeProduto'] ?></small>

        </h1>

        <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="<?= $produto['imagem'] ?>" alt="">
        </div>
        <div class="col-md-4">
          <h3 class="my-3">Informações dos Clientes que solicitaram este Produto.</h3>
          <p>A seguir está detalhes dos clientes que solicitaram o pedido do produto!.</p>
          

<?php  
                $pedidos = Pedidoproduto::find()->
                where('Pedidoproduto.idProduto=:idProduto', [':idProduto' => $produto->idProduto])
                ->all();
                foreach ($pedidos as $pedido) {
                    $procura = Pedido::findOne($pedido->idPedido);
                    $usuario = Usuario::findOne($procura->idUsuario);
                    $cliente = Cliente::find()->where(['idUsuario'=> $usuario->idUsuario])->one();
                    $endereco = Endereco::find()->where(['idEndereco'=> $cliente->idEndereco])->one();
?>

      

      <!-- Portfolio Item Row -->
      

        
          <h3 class="my-3"><?= $cliente['nomeCliente']?> <?= $cliente['sobrenomeCliente'] ?></h3>
          <p style="overflow:none;height:50px;width:100%;overflow:auto">E-MAIL: <?= $cliente['emailCliente'] ?></p>
          <p style="overflow:none;height:20px;width:100%;overflow:auto">CPF: <?= $cliente['cpfCliente'] ?></p>
          <p style="overflow:none;height:20px;width:100%;overflow:auto">PAIS: <?= $endereco['pais'] ?></p>
          <p style="overflow:none;height:20px;width:100%;overflow:auto">CEP: <?= $endereco['cep'] ?></p>
          <p style="overflow:none;height:20px;width:100%;overflow:auto">BAIRRO: <?= $endereco['bairro'] ?></p>
          <p style="overflow:none;height:20px;width:100%;overflow:auto">ENDEREÇO: <?= $endereco['endereco'] ?></p>
          <p style="overflow:none;height:20px;width:100%;overflow:auto">NÚMERO DO ESTABELECIMENTO: <?= $endereco['numEstabelecimento'] ?></p>

          <p style="overflow:scroll;height:50px;width:100%;overflow:auto">SITUAÇÃO DO PEDIDO:
          <?php 

            if($procura->finalizado == 0){
              echo "Ainda não pagou o pedido!.";
            }
            else{
              echo "Pagou, entre em contato !.";
            }

          ?>
          </p>



          <p style="overflow:scroll;height:50px;width:100%;overflow:auto">QUANTIDADE SOLICITADA:
              <?= 
            $pedido->qtdProduto;
           ?>
            

          </p>

           </div>
 </div>
<?php

    }     

        
?>
          







          
       

     
      
      






      