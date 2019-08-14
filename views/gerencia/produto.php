<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Pedidoproduto;

$this->title = 'Fronnix';
?>
<div class="site-index">

    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h6 class="my-4">Categorias</h4>

          <?php
          foreach ($categorias as $categoria) {
?>
          <div class="list-group">
            <a href="<?= Url::toRoute(['gerencia/produto','id'=> $categoria->idCategoria]) ?>" class="list-group-item"><?= $categoria['nomeCategoria'] ?></a>
            <br/>
          </div>
<?php
          }?>
        </div>
        
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active" style="max-height: 312px; overflow: hidden;">
                <img class="d-block img-fluid" src="<?=Url::to('@web/template/img/sample1.png')?>" alt="First slide">
              </div>
              <div class="carousel-item" style="max-height: 312px; overflow: hidden;">
                <img class="d-block img-fluid" src="<?=Url::to('@web/template/img/sample2.jpg')?>" alt="Second slide">
              </div>
              <div class="carousel-item" style="max-height: 312px; overflow: hidden;">
                <img class="d-block img-fluid" src="<?=Url::to('@web/template/img/sample3.jpg')?>" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>





          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" >
              <div class="card h-100">
                <a href="">
                  <img class="card-img-top" style="max-height: 300px; overflow: hidden;" src="" alt=""></a>
                <div class="card-body" >
                  <h4 class="card-title">
                    <a href=""></a>
                  </h4>
                  <h5 ></h5>                
                  <h6 style="overflow:scroll;height:100px;width:100%;overflow:auto"></h6>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  <?= Html::a(Yii::t('app','Criar produto'), ['gerencia/create-filtrada','idCategoria'=>$idCategoria,'value'=>0],['class' => 'btn btn-primary']) ?>         
                </div>
              </div>
            </div>


            <div class="col-lg-4 col-md-6 mb-4" >
              <div class="card h-100">
                <a href="">
                  <img class="card-img-top" style="max-height: 300px; overflow: hidden;" src="" alt=""></a>
                <div class="card-body" >
                  <h4 class="card-title">
                    <a href=""></a>
                  </h4>
                  <h5 ></h5>                
                  <h6 style="overflow:scroll;height:100px;width:100%;overflow:auto"></h6>
                </div>
                <div class="card-footer">                  
                  <?= Html::a(Yii::t('app','Gerenciar Vendas'), ['gerencia/gerencia-filtrada','idCategoria'=>$idCategoria],['class' => 'btn btn-success']) ?>         
                </div>
              </div>
            </div>
       




            <?php 

                foreach ($consultas as $consulta) {

                ?>

                <?php  
                $pedidos = Pedidoproduto::find()->
                where('Pedidoproduto.idProduto=:idProduto', [':idProduto' => $consulta->idProduto])
                ->All();                



                $j=0;
                foreach ($pedidos as $pedido) {                           
                        $j++;
                  }
            
?>




            <div class="col-lg-4 col-md-6 mb-4" >
              <div class="card h-100">
                <a href="<?= Url::toRoute(['gerencia/detalhe','idProduto'=>$consulta->idProduto]) ?>">
                  <img class="card-img-top" style="max-height: 300px; overflow: hidden;" src="<?= $consulta['imagem'] ?>" alt=""></a>
                <div class="card-body" >
                  <h4 class="card-title">
                    <a href="<?= Url::toRoute(['gerencia/detalhe','idProduto'=>$consulta->idProduto]) ?>"><?= $consulta['nomeProduto'] ?></a>
                  </h4>
                  <h5><?= $consulta['valorProduto'] ?> R$ </h5>

                  <h6 style="overflow:scroll;height:100px;width:100%;overflow:auto"><?= $consulta['descricaoProduto'] ?></h6>
                </div>
                <div class="card-footer">
                  
                    <?= Html::a(Yii::t('app','Atualizar'), ['gerencia/update','id'=>$consulta->idProduto],['class' => 'btn btn-success']) ?>
                    <?= Html::a(Yii::t('app','Deletar'), ['gerencia/remove','idProduto'=>$consulta->idProduto],['class' => 'btn btn-danger']) ?>  
                    <br/>
                    <br/> 
                    <h6>Pedidos: <?= $j ?></h6>              
                </div>
              </div>
            </div>




            <?php }?>


            
          </div>




          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>

</div>
