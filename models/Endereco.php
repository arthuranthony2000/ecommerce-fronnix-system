<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property int $idEndereco
 * @property string $pais
 * @property string $uf
 * @property string $cep
 * @property string $cidade
 * @property string $bairro
 * @property string $endereco
 * @property string $numEstabelecimento
 *
 * @property Cliente[] $clientes
 * @property Fornecedor[] $fornecedors
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Endereco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pais', 'cep', 'bairro', 'endereco', 'numEstabelecimento'], 'required'],
            [['cep', 'numEstabelecimento'], 'integer'],
            [['pais', 'cidade'], 'string', 'max' => 20],
            [['uf'], 'string', 'max' => 15],
            [['bairro', 'endereco'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEndereco' => Yii::t('app', 'Id Endereco'),
            'pais' => Yii::t('app', 'Pais:'),
            'uf' => Yii::t('app', 'UF:'),
            'cep' => Yii::t('app', 'CEP:'),
            'cidade' => Yii::t('app', 'Cidade:'),
            'bairro' => Yii::t('app', 'Bairro:'),
            'endereco' => Yii::t('app', 'Endereço:'),
            'numEstabelecimento' => Yii::t('app', 'Número do Estabelecimento:'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['idEndereco' => 'idEndereco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedors()
    {
        return $this->hasMany(Fornecedor::className(), ['idEndereco' => 'idEndereco']);
    }
}
