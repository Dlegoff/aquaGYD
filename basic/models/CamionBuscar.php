<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Camion;

/**
 * CamionBuscar represents the model behind the search form of `app\models\Camion`.
 */
class CamionBuscar extends Camion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCamion', 'modelo', 'capCargakg'], 'integer'],
            [['marca', 'Obs'], 'safe'],
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
        $query = Camion::find();

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
            'idCamion' => $this->idCamion,
            'modelo' => $this->modelo,
            'capCargakg' => $this->capCargakg,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'Obs', $this->Obs]);

        return $dataProvider;
    }
}
