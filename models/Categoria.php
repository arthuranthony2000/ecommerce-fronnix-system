<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property string $idCategoria
 * @property string $nomeCategoria
 * @property string $descricaoCategoria
 *
 * @property Produto[] $produtos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeCategoria', 'descricaoCategoria'], 'required'],
            [['descricaoCategoria'], 'string'],
            [['nomeCategoria'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => Yii::t('app', 'Id Categoria'),
            'nomeCategoria' => Yii::t('app', 'Nome Categoria'),
            'descricaoCategoria' => Yii::t('app', 'Descricao Categoria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['idCategoria' => 'idCategoria']);
    }
}
