<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountSessiondata;

/**
 * AccountSessiondataSearch represents the model behind the search form of `app\models\AccountSessiondata`.
 */
class AccountSessiondataSearch extends AccountSessiondata
{
    public $username;
    public $wheelchairType;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','wheelchairType'], 'safe'],
            [['id', 'uid', 'sbt'], 'integer'],
            [['st', 'et', 'wcId', 'sq1', 'sq2', 'sq3', 'eq1', 'eq2', 'v'], 'safe'],
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
        $query = AccountSessiondata::find();

        $query->joinWith(['user', 'wheelChair']);

        // add conditions that should always apply here

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

        $dataProvider->sort->attributes['wheelchairType'] = [
            'asc' => [AccountWheelchair::tableName() . '.type_wc' => SORT_ASC],
            'desc' => [AccountWheelchair::tableName() . '.type_wc' => SORT_DESC]
        ];


        // grid filtering conditions
        $query->andFilterWhere([
            'sbt' => $this->sbt,
        ]);

        $query->andFilterWhere(['like', AccountSessiondata::tableName() . '.st', $this->st])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.et', $this->et])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.wcId', $this->wcId])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.sq1', $this->sq1])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.sq2', $this->sq2])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.sq3', $this->sq3])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.eq1', $this->eq1])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.eq2', $this->eq2])
            ->andFilterWhere(['like', AccountSessiondata::tableName() . '.v', $this->v]);

        $query->andFilterWhere(['like', AccountUser::tableName() . '.name', $this->username]);
        $query->andFilterWhere(['like', AccountWheelchair::tableName() . '.type_wc', $this->wheelchairType]);

        $query->orderBy(AccountUser::tableName() . '.name ASC');

        return $dataProvider;
    }
}
