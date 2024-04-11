<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountSendata;

/**
 * AccountSendataSearch represents the model behind the search form of `app\models\AccountSendata`.
 */
class AccountSendataSearch extends AccountSendata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['time_stamp', 'e', 'ax', 'ay', 'az', 'gx', 'gy', 'gz', 'mx', 'my', 'mz', 'lat', 'lng', 'p', 's'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = AccountSendata::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'time_stamp', $this->time_stamp])
            ->andFilterWhere(['like', 'e', $this->e])
            ->andFilterWhere(['like', 'ax', $this->ax])
            ->andFilterWhere(['like', 'ay', $this->ay])
            ->andFilterWhere(['like', 'az', $this->az])
            ->andFilterWhere(['like', 'gx', $this->gx])
            ->andFilterWhere(['like', 'gy', $this->gy])
            ->andFilterWhere(['like', 'gz', $this->gz])
            ->andFilterWhere(['like', 'mx', $this->mx])
            ->andFilterWhere(['like', 'my', $this->my])
            ->andFilterWhere(['like', 'mz', $this->mz])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'p', $this->p])
            ->andFilterWhere(['like', 's', $this->s]);

        return $dataProvider;
    }
}
