<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property string $idCliente
 * @property string $nomeCliente
 * @property string $sobrenomeCliente
 * @property string $emailCliente
 * @property string $telefoneCliente
 * @property string $cpfCliente
 * @property string $rgCliente
 * @property string $dataNascimento
 * @property string $idEndereco
 *
 * @property Endereco $endereco
 * @property UsuarioCliente[] $usuarioClientes
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeCliente', 'emailCliente', 'cpfCliente', 'idEndereco'], 'required'],
            [['telefoneCliente', 'idEndereco', 'idUsuario'], 'integer'],            
            [['nomeCliente', 'sobrenomeCliente'], 'string', 'max' => 15],
            [['emailCliente'], 'string', 'max' => 45],
            [['cpfCliente', 'rgCliente','dataNascimento'], 'string', 'max' => 20],
            [['cpfCliente'], 'unique'],
            [['emailCliente'], 'unique'],
            [['telefoneCliente'], 'unique'],
            [['rgCliente'], 'unique'],
            [['idEndereco'], 'exist', 'skipOnError' => true, 'targetClass' => Endereco::className(), 'targetAttribute' => ['idEndereco' => 'idEndereco']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => Yii::t('app', 'Id Cliente'),
            'nomeCliente' => Yii::t('app', 'Nome:'),
            'sobrenomeCliente' => Yii::t('app', 'Sobrenome:'),
            'emailCliente' => Yii::t('app', 'E-mail:'),
            'telefoneCliente' => Yii::t('app', 'Telefone:'),
            'cpfCliente' => Yii::t('app', 'CPF:'),
            'rgCliente' => Yii::t('app', 'RG:'),
            'dataNascimento' => Yii::t('app', 'Data de Nascimento:'),
            'idEndereco' => Yii::t('app', 'Id Endereco'),
            'idUsuario' => Yii::t('app', 'Id Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndereco()
    {
        return $this->hasOne(Endereco::className(), ['idEndereco' => 'idEndereco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
    
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['idCliente' => 'idCliente']);
    }
}
