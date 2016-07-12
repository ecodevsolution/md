<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idorder', 'idcustomer', 'idaddress', 'idinvoice', 'status'], 'integer'],
            [['idshipping', 'bank', 'account_name', 'date'], 'safe'],
            [['sub_total', 'shipping', 'tax', 'grandtotal'], 'number'],
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
        $query = Order::find();

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
            'idorder' => $this->idorder,
            'idcustomer' => $this->idcustomer,
            'idaddress' => $this->idaddress,
            'idinvoice' => $this->idinvoice,
            'sub_total' => $this->sub_total,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'grandtotal' => $this->grandtotal,
            'status' => $this->status,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'idshipping', $this->idshipping])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'account_name', $this->account_name]);

        return $dataProvider;
    }
}
