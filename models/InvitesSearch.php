<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Invites;

/**
 * InvitesSearch represents the model behind the search form about `app\models\Invites`.
 */
class InvitesSearch extends Invites
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invite', 'status'], 'integer'],
            [['date_status'], 'safe'],
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
        $query = Invites::find();

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
            'invite' => $this->invite,
            'status' => $this->status,
            'date_status' => $this->date_status,
        ]);

        return $dataProvider;
    }
}
