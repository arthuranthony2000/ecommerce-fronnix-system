<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCliente', 'telefoneCliente', 'idEndereco'], 'integer'],
            [['nomeCliente', 'sobrenomeCliente', 'emailCliente', 'cpfCliente', 'rgCliente', 'dataNascimento'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cliente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idCliente' => $this->idCliente,
            'telefoneCliente' => $this->telefoneCliente,
            'dataNascimento' => $this->dataNascimento,
            'idEndereco' => $this->idEndereco,
        ]);

        $query->andFilterWhere(['like', 'nomeCliente', $this->nomeCliente])
            ->andFilterWhere(['like', 'sobrenomeCliente', $this->sobrenomeCliente])
            ->andFilterWhere(['like', 'emailCliente', $this->emailCliente])
            ->andFilterWhere(['like', 'cpfCliente', $this->cpfCliente])
            ->andFilterWhere(['like', 'rgCliente', $this->rgCliente]);

        return $dataProvider;
    }
}
