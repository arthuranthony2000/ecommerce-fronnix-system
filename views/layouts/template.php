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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="msapplication-TileColor" content="#416f97">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#416f97">

    <link rel="shortcut icon" type="image/x-png" href="">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">

    <style type="text/css">
        .borda {
            border: 1px solid #ddd;
            border-collapse: collapse;
            overflow: auto;
            padding: 10px;
        }
    </style>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body style="background-color: white">
    <?php $this->beginBody() ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= Url::toRoute(Yii::$app->user->isGuest ? 'site/index' : (Yii::$app->user->identity->tipoUsuario == 'cliente' ? 'site/index' : (Yii::$app->user->identity->tipoUsuario == 'fornecedor' ? 'gerencia/index' : 'administrador/index'))) ?>">Fronnix</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= Url::toRoute(Yii::$app->user->isGuest ? 'site/index' : (Yii::$app->user->identity->tipoUsuario == 'cliente' ? 'site/index' : (Yii::$app->user->identity->tipoUsuario == 'fornecedor' ? 'gerencia/index' : 'administrador/index'))) ?>">
                            Principal<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute('site/login') ?>">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute('site/logout') ?>" data-method="post">Logout (<?= Yii::$app->user->identity->username ?>)</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute('site/contact') ?>">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute('site/about') ?>">Sobre</a>
                    </li>
                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->tipoUsuario == 'cliente') : ?>
                        <li class="nav-item">
                            <a href="<?= Url::toRoute('carrinho/index') ?>"><img src="<?= Url::to('@web/template/img/carrinho.png') ?>" width="35px"></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 25px;">
        <!-- <?= Alert::widget() ?> -->
        <?= $content ?>
    </div>

    <footer class="py-5 bg-dark" style="margin-top: 100%; bottom: 0">
        <div class="container" style="display: flex; flex-direction: column; align-items: center;">
            <p class="m-0 text-center text-white">Copyright &copy; Fronnix System's 2018</p>
            <a href="#" style="color: #fff; margin-top: 10px;">
                <h6>Voltar ao topo da página</h6>
            </a>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
