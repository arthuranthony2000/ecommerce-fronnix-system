<?php

namespace app\controllers;

use Yii;
use app\models\Formapagamento;
use app\models\FormapagamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pedido;
use app\models\Pedidoproduto;
use app\models\Produto;
use app\models\Cliente;
use app\models\Usuario;


/**
 * FormapagamentoController implements the CRUD actions for Formapagamento model.
 */
class FormapagamentoController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout = 'main';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Formapagamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->Autorizacao();    
        $searchModel = new FormapagamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Formapagamento model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->Autorizacao();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Formapagamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idPedido)
    {
        if(!Yii::$app->user->isGuest){
            $cliente = Cliente::find()->where(['idUsuario'=> Yii::$app->user->identity->idUsuario])->one();
            $condicao= is_object($cliente);
            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "fornecedor"){
            return $this->redirect(['site/index']);
    }
        elseif (Yii::$app->user->identity->tipoUsuario == "cliente" && $condicao != true) {
                 return $this->redirect(['cliente/create']);
             }
}
        else{
            return $this->redirect(['site/index']);
        }



        $model = new Formapagamento();

        $pedido = Pedido::findOne($idPedido);

        $model->idPedido = $pedido->idPedido;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $pedido->finalizado='1';
            $pedido->save();
            $iteracaopedidos = Pedidoproduto::find()->all();
            foreach ($iteracaopedidos as $iteracaopedido) {
                if($iteracaopedido->idPedido == $pedido->idPedido){
                    $produto = Produto::findOne($iteracaopedido->idProduto);
                    if($produto->estoque > 0){
                        if($iteracaopedido->qtdProduto >= $produto->estoque){
                            $iteracaopedido->qtdProduto = $produto->estoque;
                            $produto->estoque = 0;
                            $produto->save();
                        }
                        else{
                            $produto->estoque = $produto->estoque-$iteracaopedido->qtdProduto;
                            $produto->save();
                        }
                    }
                }
            }
            return $this->redirect(['site/finalizado']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Formapagamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->Autorizacao();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idFormaPagamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Formapagamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->Autorizacao();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Formapagamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Formapagamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {        
        if (($model = Formapagamento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function Autorizacao(){
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "fornecedor" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
    }
}
