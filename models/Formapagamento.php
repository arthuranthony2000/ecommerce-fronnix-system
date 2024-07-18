<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formapagamento".
 *
 * @property int $idFormaPagamento
 * @property string $numCartao
 * @property string $mesValidade
 * @property string $anoValidade
 * @property string $nomeTitular
 * @property int $codSeguranca
 * @property string $idPedido
 *
 * @property Pedido $pedido
 */
class Formapagamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Formapagamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numCartao', 'mesValidade', 'anoValidade', 'nomeTitular', 'codSeguranca', 'idPedido'], 'required'],
            [['numCartao', 'codSeguranca', 'idPedido'], 'integer'],
            [['mesValidade', 'anoValidade'], 'string'],
            [['nomeTitular'], 'string', 'max' => 45],
            [['codSeguranca'],'integer','max'=> 999],
            [['codSeguranca'],'integer','min'=> 100],
            [['numCartao'],'integer','max'=> 9999999999999999],
            [['numCartao'],'integer','min'=> 1000000000000000],
            [['idPedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['idPedido' => 'idPedido']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFormaPagamento' => Yii::t('app', 'Id Forma Pagamento'),
            'numCartao' => Yii::t('app', 'Número do cartão:'),
            'mesValidade' => Yii::t('app', 'Mês de Validade:'),
            'anoValidade' => Yii::t('app', 'Ano de Validade:'),
            'nomeTitular' => Yii::t('app', 'Nome do titular:'),
            'codSeguranca' => Yii::t('app', 'Código de segurança:'),
            'idPedido' => Yii::t('app', 'Id Pedido'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['idPedido' => 'idPedido']);
    }
}
