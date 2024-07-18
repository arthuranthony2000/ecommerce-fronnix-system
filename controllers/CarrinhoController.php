<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Pedido;
use app\models\Pedidoproduto;
use app\models\Produto;
use app\models\Cliente;

class CarrinhoController extends Controller
{
    public function actionIndex()
    {
        $this->Autorizacao();

        $pedido = Pedido::getPedidoUsuario(Yii::$app->user->getId());
        $produtos = Pedidoproduto::getProdutoPedido($pedido->idPedido);

        $comp = Pedidoproduto::find()->where(['idPedido' => $pedido->idPedido])->count();

        return $this->render('index', [
            'pedido' => $pedido,
            'produtos' => $produtos,
            'comp' => $comp,
        ]);
    }

    public function actionAdd($idProduto, $quantidade)
    {
        $this->Autorizacao();

        $produto = Produto::findOne($idProduto);

        if ($produto->estoque == 0) {
            return $this->redirect(['site/index']);
        }

        $pedido = Pedido::getPedidoUsuario(Yii::$app->user->getId());
        $pedidoproduto = new Pedidoproduto();
        $pedidoproduto->idProduto = $idProduto;
        $pedidoproduto->qtdProduto = $quantidade;
        $pedidoproduto->idPedido = $pedido->idPedido;
        $pedidoproduto->save();

        return $this->redirect(['index']);
    }

    public function actionRemover($idPedido, $idProduto)
    {
        $this->Autorizacao();

        $pedido = Pedidoproduto::find()->where(['idPedido' => $idPedido, 'idProduto' => $idProduto])->one();

        if ($pedido !== null) {
            $pedido->delete();
        }

        return $this->redirect(['index']);
    }

    public function actionRecalcular($idProduto, $qtdProduto)
    {
        $this->Autorizacao();

        $pedido = Pedido::getPedidoUsuario(Yii::$app->user->getId());
        $produto = Produto::findOne($idProduto);

        $pedidoproduto = Pedidoproduto::find()->where(['idPedido' => $pedido->idPedido, 'idProduto' => $idProduto])->one();
        
        if ($pedidoproduto !== null) {
            if ($qtdProduto < 0) {
                $qtdProduto = -$qtdProduto;
            } elseif ($qtdProduto == 0) {
                $qtdProduto = 1;
            } elseif ($qtdProduto > $produto->estoque) {
                $qtdProduto = $produto->estoque;
            }
            
            $pedidoproduto->qtdProduto = $qtdProduto;
            $pedidoproduto->save();
        }

        return '';
    }

    public function Autorizacao()
    {
        if (!Yii::$app->user->isGuest) {
            $cliente = Cliente::find()->where(['idUsuario' => Yii::$app->user->identity->idUsuario])->one();
            $condicao = is_object($cliente);
            if (Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "fornecedor") {
                return $this->redirect(['site/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "cliente" && !$condicao) {
                return $this->redirect(['cliente/create']);
            }
        } else {
            return $this->redirect(['site/index']);
        }
    }
}
