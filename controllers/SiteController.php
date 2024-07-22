<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Produto;
use app\models\Categoria;
use app\models\Usuario;
use app\models\Cliente;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    /*public $layout = 'main';*/

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $cliente = Cliente::find()->where(['idUsuario' => Yii::$app->user->identity->idUsuario])->one();
            $condicao = is_object($cliente);
            if (Yii::$app->user->identity->tipoUsuario == "administrador") {
                return $this->redirect(['administrador/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "fornecedor") {
                return $this->redirect(['gerencia/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "cliente" && $condicao != true) {
                return $this->redirect(['cliente/create']);
            }
        }



        $finalizado = 0;
        $produtos = Produto::find()->All();
        $categorias = Categoria::find()->All();

        return $this->render('index', [
            'finalizado' => $finalizado,
            'produtos' => $produtos,
            'categorias' => $categorias
        ]);
    }

    public function actionFinalizado()
    {
        if (!Yii::$app->user->isGuest) {
            $cliente = Cliente::find()->where(['idUsuario' => Yii::$app->user->identity->idUsuario])->one();
            $condicao = is_object($cliente);
            if (Yii::$app->user->identity->tipoUsuario == "administrador") {
                return $this->redirect(['administrador/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "fornecedor") {
                return $this->redirect(['gerencia/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "cliente" && $condicao != true) {
                return $this->redirect(['cliente/create']);
            }
        }



        $finalizado = 1;
        $produtos = Produto::find()->All();
        $categorias = Categoria::find()->All();

        return $this->render('index', [
            'finalizado' => $finalizado,
            'produtos' => $produtos,
            'categorias' => $categorias
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $usuario = Usuario::findOne(Yii::$app->user->identity->idUsuario);
            $usuario->status = '1';
            $usuario->save();
            if (Yii::$app->user->identity->tipoUsuario == "cliente") {
                return $this->redirect(['index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "fornecedor") {
                return $this->redirect(['gerencia/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "administrador") {
                return $this->redirect(['administrador/index']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLoginCompra($idProduto, $idCategoria)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $usuario = Usuario::findOne(Yii::$app->user->identity->idUsuario);
            $usuario->status = '1';
            $usuario->save();
            if (Yii::$app->user->identity->tipoUsuario == "cliente") {
                return $this->redirect(['site/detalhe', 'idProduto' => $idProduto, 'idCategoria' => $idCategoria]);
            } elseif (Yii::$app->user->identity->tipoUsuario == "fornecedor") {
                return $this->redirect(['gerencia/index']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "administrador") {
                return $this->redirect(['administrador/index']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionCadastro()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $usuario = Usuario::findOne(Yii::$app->user->identity->idUsuario);
            $usuario->status = '1';
            $usuario->save();
            if (Yii::$app->user->identity->tipoUsuario == "cliente") {
                return $this->redirect(['cliente/create']);
            } elseif (Yii::$app->user->identity->tipoUsuario == "fornecedor") {
                return $this->redirect(['fornecedor/create']);
            }
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $usuario = Usuario::findOne(Yii::$app->user->identity->idUsuario);
        $usuario->status = '0';
        $usuario->save();
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDetalhe($idProduto, $idCategoria)
    {
        $produto = Produto::findOne($idProduto);
        //$objetos = Produto::find()->all();
        $consultas = Produto::find()
            ->where('Produto.idCategoria=:idCategoria', [':idCategoria' => $idCategoria])
            ->all();
        return $this->render('detalhe', [
            'produto' => $produto,
            //'objetos' => $objetos,
            'consultas' => $consultas,
        ]);
    }

    public function actionCarrinho($idProduto)
    {
        $produto = Produto::findOne($idProduto);
        //$objetos = Produto::find()->all();  
        return $this->render('carrinho', [
            'produto' => $produto,
            //'objetos' => $objetos
        ]);
    }

    public function actionProduto($id)
    {
        $consultas = Produto::find()
            ->where('Produto.idCategoria=:id', [':id' => $id])
            ->all();
        $categorias = Categoria::find()->All();

        return $this->render('produto', [
            'consultas' => $consultas,
            'categorias' => $categorias
        ]);
    }
}