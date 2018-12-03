<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mantenimiento;

/**
 * MantenimientoBuscar represents the model behind the search form of `app\models\Mantenimiento`.
 */
class MantenimientoBuscar extends Mantenimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMant', 'costo'], 'integer'],
            [['comentario', 'fechamant'], 'safe'],
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
        $query = Mantenimiento::find();

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
            'idMant' => $this->idMant,
            'costo' => $this->costo,
            'fechamant' => $this->fechamant,
        ]);

        $query->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
