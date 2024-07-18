<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formapagamento;

/**
 * FormapagamentoSearch represents the model behind the search form of `app\models\Formapagamento`.
 */
class FormapagamentoSearch extends Formapagamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFormaPagamento', 'numCartao', 'codSeguranca', 'idPedido'], 'integer'],
            [['mesValidade', 'anoValidade', 'nomeTitular'], 'safe'],
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
        $query = Formapagamento::find();

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
            'idFormaPagamento' => $this->idFormaPagamento,
            'numCartao' => $this->numCartao,
            'codSeguranca' => $this->codSeguranca,
            'idPedido' => $this->idPedido,
        ]);

        $query->andFilterWhere(['like', 'mesValidade', $this->mesValidade])
            ->andFilterWhere(['like', 'anoValidade', $this->anoValidade])
            ->andFilterWhere(['like', 'nomeTitular', $this->nomeTitular]);

        return $dataProvider;
    }
}
