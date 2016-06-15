<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MainCategory;

/**
 * MainCategorySearch represents the model behind the search form about `backend\models\MainCategory`.
 */
class MainCategorySearch extends MainCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmain', 'flag'], 'integer'],
			[['username'], 'string'],
            [['main_category_name'], 'safe'],
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
        $query = MainCategory::find();

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
            'idmain' => $this->idmain,
            'username' => $this->username,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'main_category_name', $this->main_category_name]);

        return $dataProvider;
    }
}
