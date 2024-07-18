<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Usuario;

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

              <?php
                $usuarios = Usuario::find()->all();
                foreach ($usuarios as $usuario) {
                  
                
              ?>


            <div class="col-lg-4 col-md-6 mb-4" >
              <div class="card h-100">
                <a href="">
                  <img class="card-img-top" style="max-height: 300px; overflow: hidden;" src="" alt=""></a>
                <div class="card-body" >
                  <h4 class="card-title">
                    <a href=""><?= $usuario['username'] ?></a>
                  </h4>
                  <h5></h5>                
                  <h6 style="overflow:scroll;height:100px;width:100%;overflow:auto"></h6>
                </div>
                <?php
                if($usuario->status == 1){
                  ?>
                
                <div class="card-footer">                  
                  <?= Html::a(Yii::t('app','Online'), ['administrador/status'],['class' => 'btn btn-success']) ?>         
                </div>

                <?php
                  }
                ?>

                <?php
                if($usuario->status == 0){
                  ?>
                
                <div class="card-footer">                  
                  <?= Html::a(Yii::t('app','Offline'), ['administrador/status'],['class' => 'btn btn-danger']) ?>         
                </div>

                <?php
                  }
                ?>


              </div>
            </div>

            <?php
              }
            ?>

            


            
     </div>




          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>

</div>
