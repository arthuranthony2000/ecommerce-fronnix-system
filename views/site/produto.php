<?php

/* @var $this yii\web\View */
/* @var $consultas app\models\Produto[] */
/* @var $categorias app\models\Categoria[] */
/* @var $pagination yii\data\Pagination */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Fronnix';
?>
<div class="site-index">

  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h6 class="my-4">Categorias</h6>
        <?php foreach ($categorias as $categoria): ?>
          <div class="list-group">
            <a href="<?= Url::toRoute(['site/produto', 'id' => $categoria->idCategoria]) ?>"
              class="list-group-item"><?= $categoria['nomeCategoria'] ?></a>
            <br />
          </div>
        <?php endforeach; ?>
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
              <img class="d-block img-fluid" src="<?= Url::to('@web/template/img/sample1.png') ?>" alt="First slide">
            </div>
            <div class="carousel-item" style="max-height: 312px; overflow: hidden;">
              <img class="d-block img-fluid" src="<?= Url::to('@web/template/img/sample2.jpg') ?>" alt="Second slide">
            </div>
            <div class="carousel-item" style="max-height: 312px; overflow: hidden;">
              <img class="d-block img-fluid" src="<?= Url::to('@web/template/img/sample3.jpg') ?>" alt="Third slide">
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
          <?php foreach ($consultas as $consulta): ?>
            <?php if ($consulta->estoque > 0): ?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <div style="display: flex; justify-content: center">
                    <a
                      href="<?= Url::toRoute(['site/detalhe', 'idProduto' => $consulta->idProduto, 'idCategoria' => $consulta->idCategoria]) ?>">
                      <img class="card-img-top"
                        style="padding-top: 10px; max-height: 150px; max-width: 150px; overflow: hidden;"
                        src="<?= $consulta['imagem'] ?>" alt="">
                    </a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a
                        href="<?= Url::toRoute(['site/detalhe', 'idProduto' => $consulta->idProduto, 'idCategoria' => $consulta->idCategoria]) ?>">
                        <?= $consulta['nomeProduto'] ?>
                      </a>
                    </h4>
                    <h5>R$ <?= $consulta['valorProduto'] ?></h5>
                    <h6 style="overflow:scroll; height:100px; width:100%; overflow:auto">
                      <?= $consulta['descricaoProduto'] ?>
                    </h6>
                  </div>
                  <div class="card-footer" style="display: flex; align-items: center; justify-content: flex-start;">
                    <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                    <?= Html::a(Yii::t('app', 'Comprar'), ['site/detalhe', 'idProduto' => $consulta->idProduto, 'idCategoria' => $consulta->idCategoria], ['class' => 'btn btn-success']) ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>

        <!-- Widget de Paginação -->
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <?= LinkPager::widget([
              'pagination' => $pagination,
              'options' => ['class' => 'pagination'],
              'linkOptions' => ['class' => 'page-link'],
              'pageCssClass' => 'page-item',
              'prevPageCssClass' => 'page-item',
              'nextPageCssClass' => 'page-item',
              'firstPageCssClass' => 'page-item',
              'lastPageCssClass' => 'page-item',
            ]) ?>
          </div>
        </div>
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  </div>
</div>