<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Fronnix';
?>
<div class="site-index">

    <div class="container">

      <div class="row">


        
        
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
                  <?= Html::a(Yii::t('app','Gerenciar Usuários'), ['usuario/index'],['class' => 'btn btn-warning']) ?>         
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
                  <?= Html::a(Yii::t('app','Gerenciar Clientes'), ['cliente/index'],['class' => 'btn btn-warning']) ?>         
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
                  <?= Html::a(Yii::t('app','Gerenciar Fornecedores'), ['fornecedor/index'],['class' => 'btn btn-warning']) ?>         
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
                  <?= Html::a(Yii::t('app','Gerenciar Produtos'), ['produto/index'],['class' => 'btn btn-success']) ?>         
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
                  <?= Html::a(Yii::t('app','Gerenciar Categorias'), ['categoria/index'],['class' => 'btn btn-success']) ?>         
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
                  <?= Html::a(Yii::t('app','Gerenciar Pedidos'), ['pedido/index'],['class' => 'btn btn-success']) ?>         
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
                  <?= Html::a(Yii::t('app','Gerenciar Endereços'), ['endereco/index'],['class' => 'btn btn-primary']) ?>         
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" >
              <div class="card h-100" style="height:100px;width:300px;margin-right:100px;">
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
                  <?= Html::a(Yii::t('app','Gerenciar Status dos Usuários'), ['administrador/status'],['class' => 'btn btn-primary']) ?>         
                </div>
              </div>
            </div>            

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100" style="height:100px;width:300px;margin-left:50px;">
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
                  <?= Html::a(Yii::t('app','Gerenciar produtos de pedidos'), ['pedido-produto/index'],['class' => 'btn btn-primary']) ?>         
                </div>
              </div>
            </div>

            


            
     </div>




          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>

</div>
