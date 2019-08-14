<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidoproduto */

$this->title = Yii::t('app', 'Update Pedidoproduto: {nameAttribute}', [
    'nameAttribute' => $model->idPedido,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidoprodutos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPedido, 'url' => ['view', 'idPedido' => $model->idPedido, 'idProduto' => $model->idProduto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pedidoproduto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
