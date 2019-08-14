<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class AdministradorController extends Controller {
	public function actionIndex()
    {   
	    $this->Autorizacao();    	
        return $this->render('index');
    }
    public function actionStatus(){
        $this->Autorizacao();            
        return $this->render('status');
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