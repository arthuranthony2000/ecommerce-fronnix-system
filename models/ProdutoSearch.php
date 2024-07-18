<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProduto', 'estoque', 'idCategoria', 'idFornecedor'], 'integer'],
            [['nomeProduto', 'marcaProduto', 'descricaoProduto','imagem'], 'safe'],
            [['valorProduto', 'desconto'], 'number'],
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

    
    public function listaIndex() {
        return self::find()
            ->orderBy('RAND()')->limit(6)->all();
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
        $query = Produto::find();
     

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
            'idProduto' => $this->idProduto,
            'valorProduto' => $this->valorProduto,
            'desconto' => $this->desconto,
            'estoque' => $this->estoque,
            'idCategoria' => $this->idCategoria,
            'idFornecedor' => $this->idFornecedor,
        ]);

        $query->andFilterWhere(['like', 'nomeProduto', $this->nomeProduto])
            ->andFilterWhere(['like', 'marcaProduto', $this->marcaProduto])
            ->andFilterWhere(['like', 'descricaoProduto', $this->descricaoProduto]);
            

        return $dataProvider;
    }
}
