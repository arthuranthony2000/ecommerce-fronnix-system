<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidoproduto".
 *
 * @property int $qtdProduto
 * @property string $idPedido
 * @property string $idProduto
 *
 * @property Pedido $pedido
 * @property Produto $produto
 */
class Pedidoproduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Pedidoproduto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qtdProduto', 'idPedido', 'idProduto'], 'integer'],
            [['idPedido', 'idProduto'], 'required'],
            [['idPedido', 'idProduto'], 'unique', 'targetAttribute' => ['idPedido', 'idProduto']],
            [['idPedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['idPedido' => 'idPedido']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['idProduto' => 'idProduto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qtdProduto' => Yii::t('app', 'Qtd Produto'),
            'idPedido' => Yii::t('app', 'Id Pedido'),
            'idProduto' => Yii::t('app', 'Id Produto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['idPedido' => 'idPedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['idProduto' => 'idProduto']);
    }

    public static function getProdutoPedido($idPedido){
            $a = self::find()->where(['idPedido'=>$idPedido])->all();                      
            return $a;
    }
}
