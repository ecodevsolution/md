<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserForm;

/**
 * UserFormSearch represents the model behind the search form about `backend\models\UserForm`.
 */
class UserFormSearch extends UserForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idrole', 'idcity', 'idprovince', 'paket', 'status', 'created_at', 'updated_at'], 'integer'],
            [['courier', 'province', 'city', 'firstname', 'lastname', 'email', 'nama_toko', 'domain', 'auth_key', 'password_hash', 'password_reset_token', 'address', 'phone', 'work_hour', 'description', 'logo'], 'safe'],
            [['balanced'], 'number'],
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
        $query = UserForm::find();

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
            'id' => $this->id,
            'idrole' => $this->idrole,
            'idcity' => $this->idcity,
            'idprovince' => $this->idprovince,
            'paket' => $this->paket,
            'balanced' => $this->balanced,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'courier', $this->courier])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'nama_toko', $this->nama_toko])
            ->andFilterWhere(['like', 'domain', $this->domain])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'work_hour', $this->work_hour])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
