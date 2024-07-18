<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fornecedor;

/**
 * FornecedorSearch represents the model behind the search form of `app\models\Fornecedor`.
 */
class FornecedorSearch extends Fornecedor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFornecedor', 'telefoneFornecedor', 'idEndereco'], 'integer'],
            [['nomeFornecedor', 'emailFornecedor', 'cnpjFornecedor', 'descricaoFornecedor'], 'safe'],
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
        $query = Fornecedor::find();

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
            'idFornecedor' => $this->idFornecedor,
            'telefoneFornecedor' => $this->telefoneFornecedor,
            'idEndereco' => $this->idEndereco,
        ]);

        $query->andFilterWhere(['like', 'nomeFornecedor', $this->nomeFornecedor])
            ->andFilterWhere(['like', 'emailFornecedor', $this->emailFornecedor])
            ->andFilterWhere(['like', 'cnpjFornecedor', $this->cnpjFornecedor])
            ->andFilterWhere(['like', 'descricaoFornecedor', $this->descricaoFornecedor]);

        return $dataProvider;
    }
}
