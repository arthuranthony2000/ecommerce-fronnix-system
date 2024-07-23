<?php

namespace app\controllers;

use Yii;
use app\models\Pedidoproduto;
use app\models\PedidoProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoProdutoController implements the CRUD actions for Pedidoproduto model.
 */
class PedidoProdutoController extends Controller
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
     * Lists all Pedidoproduto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->Autorizacao();
        $searchModel = new PedidoProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedidoproduto model.
     * @param string $idPedido
     * @param string $idProduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPedido, $idProduto)
    {
        $this->Autorizacao();
        return $this->render('view', [
            'model' => $this->findModel($idPedido, $idProduto),
        ]);
    }

    /**
     * Creates a new Pedidoproduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->Autorizacao();
        $model = new Pedidoproduto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedido' => $model->idPedido, 'idProduto' => $model->idProduto]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pedidoproduto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idPedido
     * @param string $idProduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPedido, $idProduto)
    {
        $this->Autorizacao();
        $model = $this->findModel($idPedido, $idProduto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedido' => $model->idPedido, 'idProduto' => $model->idProduto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pedidoproduto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idPedido
     * @param string $idProduto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPedido, $idProduto)
    {
        $this->Autorizacao();
        $this->findModel($idPedido, $idProduto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedidoproduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idPedido
     * @param string $idProduto
     * @return Pedidoproduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPedido, $idProduto)
    {
        if (($model = Pedidoproduto::findOne(['idPedido' => $idPedido, 'idProduto' => $idProduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function Autorizacao()
    {
        if (!Yii::$app->user->isGuest) {

            if (Yii::$app->user->identity->tipoUsuario == "fornecedor" || Yii::$app->user->identity->tipoUsuario == "cliente") {
                return $this->redirect(['site/index']);
            }
        } else {
            return $this->redirect(['site/index']);
        }
    }
}
