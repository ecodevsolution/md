<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `frontend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproduk', 'iduser', 'idmain', 'idsub', 'iddetail', 'idbrand', 'sale', 'condition', 'stock', 'minqty', 'maxqty', 'weight', 'status'], 'integer'],
            [['title', 'tag', 'sku', 'short_description', 'description'], 'safe'],
            [['tax', 'service', 'discount', 'price', 'final_price'], 'number'],
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
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idproduk' => $this->idproduk,
            'iduser' => $this->iduser,
            'idmain' => $this->idmain,
            'idsub' => $this->idsub,
            'iddetail' => $this->iddetail,
            'idbrand' => $this->idbrand,
            'sale' => $this->sale,
            'condition' => $this->condition,
            'stock' => $this->stock,
            'minqty' => $this->minqty,
            'maxqty' => $this->maxqty,
            'weight' => $this->weight,
            'tax' => $this->tax,
            'service' => $this->service,
            'discount' => $this->discount,
            'price' => $this->price,
            'final_price' => $this->final_price,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
