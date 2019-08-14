<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property string $idProduto
 * @property string $nomeProduto
 * @property double $valorProduto
 * @property double $desconto
 * @property string $estoque
 * @property string $idCategoria
 * @property string $marcaProduto
 * @property string $descricaoProduto
 * @property string $idUsuario_Fornecedor
 *
 * @property Pedido[] $pedidos
 * @property Categoria $categoria
 * @property UsuarioFornecedor $usuarioFornecedor
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeProduto', 'valorProduto', 'estoque', 'idCategoria'], 'required'],
            [['valorProduto', 'desconto'], 'number'],
            [['estoque', 'idCategoria', 'idFornecedor'], 'integer'],
            [['descricaoProduto'], 'string'],
            [['nomeProduto'], 'string', 'max' => 100],
            [['marcaProduto'], 'string', 'max' => 15],
            [['imagem'], 'string', 'max' => 300],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['idCategoria' => 'idCategoria']],
            [['idFornecedor'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::className(), 'targetAttribute' => ['idFornecedor' => 'idFornecedor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProduto' => Yii::t('app', 'Id Produto'),
            'nomeProduto' => Yii::t('app', 'Nome:'),
            'valorProduto' => Yii::t('app', 'Valor:'),
            'desconto' => Yii::t('app', 'Desconto:'),
            'estoque' => Yii::t('app', 'Estoque:'),
            'idCategoria' => Yii::t('app', 'Id Categoria'),
            'marcaProduto' => Yii::t('app', 'Marca:'),
            'descricaoProduto' => Yii::t('app', 'Descrição:'),
            'idFornecedor' => Yii::t('app', 'Id Fornecedor'),
            'imagem' => Yii::t('app', 'Url da Imagem:'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['idProduto' => 'idProduto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['idCategoria' => 'idCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['idFornecedor' => 'idFornecedor']);
    }
}
