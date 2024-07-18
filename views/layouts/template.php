<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TemplateAsset;

TemplateAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <style type="text/css">
    .borda{
        border: 1px solid #ddd;
        border-collapse: collapse;
        overflow: auto;
       
        padding: 10px;
    }

  </style>
  
  <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#416f97">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#416f97">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-png" href="">

  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>

  <!-- Bootstrap core CSS -->
  

  <!-- Custom styles for this template -->
  

</head>

<?php $this->beginBody() ?>
<body style="background-color: white">

  <!-- Audio Element -->
  <!-- <audio id="background-audio" src="<?= Url::to('@web/audio/audio.mp3') ?>" autoplay></audio> -->

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      
      <?php 
        if (!Yii::$app->user->isGuest) {
          if(Yii::$app->user->identity->tipoUsuario == "cliente"){
      ?>

      <a class="navbar-brand" href="<?=Url::toRoute('site/index')?>">Fronnix</a>

      <?php
        }
        elseif(Yii::$app->user->identity->tipoUsuario == "fornecedor"){
      ?> 

      <a class="navbar-brand" href="<?=Url::toRoute('gerencia/index')?>">Fronnix</a>

      <?php
          }
          elseif(Yii::$app->user->identity->tipoUsuario == "administrador"){
      ?>

      <a class="navbar-brand" href="<?=Url::toRoute('administrador/index')?>">Fronnix</a>

      <?php
    }
  }
  else{
    ?>
    <a class="navbar-brand" href="<?=Url::toRoute('site/index')?>">Fronnix</a>

    <?php
  }
      ?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
            if (!Yii::$app->user->isGuest) {
              if(Yii::$app->user->identity->tipoUsuario == "cliente"){
          ?>

          <li class="nav-item active">
            <a class="nav-link" href="<?=Url::toRoute('site/index')?>">
              Principal<span class="sr-only">(current)</span>
            </a>
          </li>

          <?php
        }
        elseif(Yii::$app->user->identity->tipoUsuario == "fornecedor"){
        ?> 

        <li class="nav-item active">
          <a class="nav-link" href="<?=Url::toRoute('gerencia/index')?>">
            Principal<span class="sr-only">(current)</span>
          </a>
        </li>

        <?php
            }
            elseif(Yii::$app->user->identity->tipoUsuario == "administrador"){
        ?>

        <li class="nav-item active">
          <a class="nav-link" href="<?=Url::toRoute('administrador/index')?>">
            Principal<span class="sr-only">(current)</span>
          </a>
        </li>

        <?php
    }
  }
  else{
    ?>
    <li class="nav-item active">
      <a class="nav-link" href="<?=Url::toRoute('site/index')?>">
        Principal<span class="sr-only">(current)</span>
      </a>
    </li>

    <?php
  }
          ?>

          <?php 
          if(Yii::$app->user->isGuest)
          {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=Url::toRoute('site/login')?>">Login</a>
            </li>

            <?php 

          } else {
            ?>
              <li class="nav-item">
              <a class="nav-link" href="<?=Url::toRoute('site/logout')?>" data-method="post">Logout (<?=
               Yii::$app->user->identity->username?>)</a>
            </li>
            <?php
          }
          ?>
           <li class="nav-item">
              <a class="nav-link" href="<?=Url::toRoute('site/contact')?>">Contato</a>
            </li>

           <li class="nav-item">
              <a class="nav-link" href="<?=Url::toRoute('site/about')?>">Sobre</a>
            </li>

            <?php 
                if(!Yii::$app->user->isGuest){
                if (Yii::$app->user->identity->tipoUsuario == "cliente") {
            ?>
            <li class="nav-item">
          <a href="<?=Url::toRoute('carrinho/index')?>"><img src="<?=Url::to('@web/template/img/carrinho.png')?>" width="35px"></a>
        </li>
          <?php 
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  
  <!-- /.container -->
  <div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
  </div>
  <!-- Footer -->

  <footer class="py-5 bg-dark" style="margin-top: 150px; width: 100%; bottom: 0">
    <div class="container">
      <center><p class="m-0 text-center text-white">Copyright &copy; Fronnix System's 2018</p>
        <a href="#" style="color: #fff"><h6 align="middle">Voltar ao topo da página</h6></a>
        </center>          
    </div>
  </footer>

  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
