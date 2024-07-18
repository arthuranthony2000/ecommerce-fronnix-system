<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor".
 *
 * @property string $idFornecedor
 * @property string $nomeFornecedor
 * @property string $telefoneFornecedor
 * @property string $emailFornecedor
 * @property string $cnpjFornecedor
 * @property string $descricaoFornecedor
 * @property string $idEndereco
 *
 * @property Endereco $endereco
 * @property UsuarioFornecedor[] $usuarioFornecedors
 */
class Fornecedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fornecedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeFornecedor', 'emailFornecedor', 'cnpjFornecedor', 'idEndereco'], 'required'],
            [['telefoneFornecedor', 'idEndereco', 'idUsuario'], 'integer'],
            [['descricaoFornecedor'], 'string'],
            [['nomeFornecedor'], 'string', 'max' => 20],
            [['emailFornecedor', 'cnpjFornecedor'], 'string', 'max' => 45],
            [['emailFornecedor'], 'unique'],
            [['cnpjFornecedor'], 'unique'],
            [['telefoneFornecedor'], 'unique'],
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
            'idFornecedor' => Yii::t('app', 'Id Fornecedor'),
            'nomeFornecedor' => Yii::t('app', 'Nome:'),
            'telefoneFornecedor' => Yii::t('app', 'Telefone:'),
            'emailFornecedor' => Yii::t('app', 'E-mail:'),
            'cnpjFornecedor' => Yii::t('app', 'CNPJ:'),
            'descricaoFornecedor' => Yii::t('app', 'Descrição:'),
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
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['idFornecedor' => 'idFornecedor']);
    }
}
