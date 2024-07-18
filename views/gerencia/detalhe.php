<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Usuario;
use app\models\Pedido;
use app\models\Pedidoproduto;

?>

<h1 class="my-4">
        <small><?= $produto['nomeProduto'] ?></small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="<?= $produto['imagem'] ?>" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Imagem Ilustrativa</h3>
          <p>Ideal para você e sua família curtirem com essa sofisticada tecnologia.</p>
          <h3 class="my-3">Excelente Estado</h3>
          <p style="overflow:scroll;height:500px;width:100%;overflow:auto"><?= $produto['descricaoProduto'] ?></p>



         

        <?php  
                $pedidos = Pedidoproduto::find()->
                where('Pedidoproduto.idProduto=:idProduto', [':idProduto' => $produto->idProduto])
                ->All();                



                $j=0;
                foreach ($pedidos as $pedido) {                           
                        $j++;
                  }
            
?>

          <a href="<?= Url::toRoute(['gerencia/pedido','idProduto'=>$produto->idProduto]) ?>">Possui <?= $j ?> Pedidos.</a>







          
        </div>

      </div>
      
      






      