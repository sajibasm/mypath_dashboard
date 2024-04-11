<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AccountWheelchairSearch represents the model behind the search form of `app\models\AccountWheelchair`.
 */
class AccountWheelchairSearch extends AccountWheelchair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['username'], 'safe'], //Join attributes

            [['id', 'number_w', 'wc_wdt', 'wc_ht', 'user_id'], 'integer'],
            [['type_wc', 'wc_identify', 'd_type', 'tire_mat'], 'safe'],
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
        $query = AccountWheelchair::find();

        // add conditions that should always apply here

        $query->joinWith(['user']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }


        $dataProvider->sort->attributes['username'] = [
            'asc' => [AccountUser::tableName() . '.name' => SORT_ASC],
            'desc' => [AccountUser::tableName() . '.name' => SORT_DESC]
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            AccountWheelchair::tableName() . '.number_w' => $this->number_w,
            AccountWheelchair::tableName() . '.wc_wdt' => $this->wc_wdt,
            AccountWheelchair::tableName() . '.wc_ht' => $this->wc_ht
        ]);

        $query->andFilterWhere(['like', AccountWheelchair::tableName() . '.type_wc', $this->type_wc])
            ->andFilterWhere(['like', AccountWheelchair::tableName() . '.wc_identify', $this->wc_identify])
            ->andFilterWhere(['like', AccountWheelchair::tableName() . '.d_type', $this->d_type])
            ->andFilterWhere(['like', AccountWheelchair::tableName() . '.tire_mat', $this->tire_mat]);

        $query->andFilterWhere(['like', AccountUser::tableName() . '.name', $this->username]);

        $query->orderBy(AccountUser::tableName().'.name ASC');

        return $dataProvider;
    }


    public function findByUserId($userId)
    {
        $query = AccountWheelchair::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere(['user_id' => $userId]);
        return $dataProvider;
    }
}
