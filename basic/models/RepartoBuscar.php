<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reparto;

/**
 * RepartoBuscar represents the model behind the search form of `app\models\Reparto`.
 */
class RepartoBuscar extends Reparto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idReparto', 'idRepartidor', 'cantSalida', 'cantTotLLegLL', 'CantTotLLV', 'idCamion'], 'integer'],
            [['fechaReparto'], 'safe'],
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
        $query = Reparto::find();

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
            'idReparto' => $this->idReparto,
            'fechaReparto' => $this->fechaReparto,
            'idRepartidor' => $this->idRepartidor,
            'cantSalida' => $this->cantSalida,
            'cantTotLLegLL' => $this->cantTotLLegLL,
            'CantTotLLV' => $this->CantTotLLV,
            'idCamion' => $this->idCamion,
        ]);

        return $dataProvider;
    }
}
