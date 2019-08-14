<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pedido".
 *
 * @property string $idPedido
 * @property string $idUsuario
 * @property int $finalizado
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario'], 'required'],
            [['idUsuario'], 'integer'],
            [['finalizado'], 'string', 'max' => 4],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPedido' => Yii::t('app', 'Id Pedido'),
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'finalizado' => Yii::t('app', 'Finalizado'),
        ];
    }

    public static function getPedidoUsuario($idUsuario){
            $a = self::find()->where(['idUsuario'=>$idUsuario,'finalizado'=>0])->one();
            if (!$a) {
               $a = new self();
               $a->idUsuario = $idUsuario;
               $a->save();
            }
            return $a;
    }    
}