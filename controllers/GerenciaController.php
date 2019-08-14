<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Produto;
use app\models\Fornecedor;
use app\models\Pedidoproduto;
use app\models\Categoria;
use app\models\Pedido;
use app\models\Usuario;
use app\models\Formapagamento;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class GerenciaController extends Controller {
	public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $fornecedor = Fornecedor::find()->where(['idUsuario'=> Yii::$app->user->identity->idUsuario])->one();
            $condicao= is_object($fornecedor);
            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
        elseif (Yii::$app->user->identity->tipoUsuario == "fornecedor" && $condicao != true) {
            return $this->redirect(['fornecedor/create']);
        }
}
        else{
            return $this->redirect(['site/index']);
        }

        $idUsuario = Yii::$app->user->identity->idUsuario;
        $fornecedor = Fornecedor::find()->where(['idUsuario'=> $idUsuario])->one();
        $produtos = Produto::find()->where(['idFornecedor'=> $fornecedor->idFornecedor])->all();
        $categorias = Categoria::find()->All();   

                   
        return $this->render('index', [
            'produtos' => $produtos,            
            'categorias' => $categorias,                      
        ]);
    }
    public function actionRemove($idProduto){ 
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
           	
    	$produto = Produto::findOne($idProduto);

        $pedidosprodutos = Pedidoproduto::find()->where(['idProduto'=>$produto->idProduto])->all();

        foreach ($pedidosprodutos as $pedidosproduto) {           
            $pedidosproduto->delete();
            
        }

        $pedidos = Pedido::find()->all();

        foreach ($pedidos as $pedido) {
                if($pedido->finalizado == '1'){
            $pedidosproduto = Pedidoproduto::find()->where(['idPedido'=>$pedido->idPedido])->one();

            if(!is_object($pedidosproduto)){
                $formaspagamento = Formapagamento::find()->where(['idPedido'=>$pedido->idPedido])->one();
                if(is_object($formaspagamento)){
                    $formaspagamento->delete();    
                }
                $pedido->delete();
            }

            }
        }

    	$produto->delete();
    	return $this->render('index');
    }
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
        $model = Produto::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
        $idUsuario = Yii::$app->user->identity->idUsuario;
        $Fornecedor = Fornecedor::findOne($idUsuario);
        $value = '1';

        $model = new Produto();
        $model->idFornecedor = Fornecedor::find()->where(['idUsuario'=>Yii::$app->user->identity->idUsuario])->one()->idFornecedor;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model, 
            'Fornecedor' => $Fornecedor,
            'value' => $value,            
        ]);
    }


    public function actionCreateFiltrada($idCategoria,$value)
    {
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
        $idUsuario = Yii::$app->user->identity->idUsuario;
        $Fornecedor = Fornecedor::findOne($idUsuario);
        $value = '0';       

        $model = new Produto();
        $model->idFornecedor = Fornecedor::find()->where(['idUsuario'=>Yii::$app->user->identity->idUsuario])->one()->idFornecedor;
        $model->idCategoria = $idCategoria;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model, 
            'Fornecedor' => $Fornecedor,
            'value' => $value,
        ]);
    }



    public function actionDetalhe($idProduto)
    {
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
        $produto = Produto::findOne($idProduto);
        return $this->render('detalhe',[
            'produto' => $produto,            
        ]);
    }
    public function actionPedido($idProduto)
    {   
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }     
        $produto = Produto::findOne($idProduto);
        return $this->render('pedido',[
            'produto' => $produto,            
        ]);
    }

    public function actionProduto($id)
    {
        if(!Yii::$app->user->isGuest){

            if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
            return $this->redirect(['site/index']);
    }
}
        else{
            return $this->redirect(['site/index']);
        }
        $idUsuario = Yii::$app->user->identity->idUsuario;
        $fornecedor = Fornecedor::find()->where(['idUsuario'=> $idUsuario])->one();
        $consultas = Produto::find()->where(['idFornecedor'=> $fornecedor->idFornecedor,'idCategoria'=>$id])->all();

        

        $categorias = Categoria::find()->All();



        return $this->render('produto',[
            'consultas' => $consultas,
            'categorias' => $categorias,
            'idCategoria' => $id,
        ]);
    }
    public function actionGerencia(){
            if(!Yii::$app->user->isGuest){
                    if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
                    return $this->redirect(['site/index']);
                    }
                }
        else{
            return $this->redirect(['site/index']);
        }
        
        $fornecedor = Fornecedor::find()->where(['idUsuario'=>Yii::$app->user->identity->idUsuario])->one();

        $produtos = Produto::find()->where(['idFornecedor'=>$fornecedor->idFornecedor])->all();

        return $this->render('gerencia',[
            'produtos' => $produtos,                      
        ]);  
    }

    public function actionGerenciaFiltrada($idCategoria){
            if(!Yii::$app->user->isGuest){
                    if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
                    return $this->redirect(['site/index']);
                    }
                }
        else{
            return $this->redirect(['site/index']);
        }
        
        $fornecedor = Fornecedor::find()->where(['idUsuario'=>Yii::$app->user->identity->idUsuario])->one();

        $produtos = Produto::find()->where(['idFornecedor'=>$fornecedor->idFornecedor,'idCategoria'=>$idCategoria])->all();

        return $this->render('gerencia',[
            'produtos' => $produtos,                      
        ]);  
    }




    public function actionCliente($idPedido,$idUsuario){
            if(!Yii::$app->user->isGuest){
                                if(Yii::$app->user->identity->tipoUsuario == "administrador" || Yii::$app->user->identity->tipoUsuario == "cliente"){
                                return $this->redirect(['site/index']);
                                }
                            }
                    else{
                        return $this->redirect(['site/index']);
                    }            
            return $this->render('cliente',[
            'idPedido' => $idPedido,
            'idUsuario' => $idUsuario,                      
        ]); 
    }
}