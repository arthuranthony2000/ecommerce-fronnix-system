<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property string $idUsuario
 * @property string $username
 * @property string $password
 * @property string $acess_token
 * @property string $auth_key
 * @property string $tipoUsuario
 * @property int $status
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */

    public function beforeSave($insert){
        if(array_key_exists('password',$this->dirtyAttributes) && ($this->password != '')){
            $this->password = sha1($this->password);
        }

        return parent::beforeSave($insert);
    }

    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'tipoUsuario'], 'required'],
            [['tipoUsuario'], 'string'],
            [['username'], 'string', 'max' => 20],
            [['password', 'acess_token', 'auth_key'], 'string', 'max' => 45],            
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'username' => Yii::t('app', 'Nome do Usuário:'),
            'password' => Yii::t('app', 'Senha:'),
            'acess_token' => Yii::t('app', 'Acess Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'tipoUsuario' => Yii::t('app', 'Quem você deseja ser?'),
            'status' => Yii::t('app', 'Status'),
        ];
    }    

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Localiza uma identidade pelo token informado
     *
     * @param string $token o token a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao token informado
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['acess_token' => $token]);
    }

    /**
     * @return int|string o ID do usuário atual
     */
    public function getId()
    {
        return $this->idUsuario;
    }

    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($username){
        return static::findOne(['username'=>$username]);
    }

    public function validatePassword($password){
            return (sha1($password) === $this->password);
    }
}