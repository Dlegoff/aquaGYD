<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Localidad;

/**
 * LocalidadBuscar represents the model behind the search form of `app\models\Localidad`.
 */
class LocalidadBuscar extends Localidad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLoc', 'codPost', 'cantHab'], 'integer'],
            [['NomLoc', 'provincia'], 'safe'],
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
        $query = Localidad::find();

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
            'idLoc' => $this->idLoc,
            'codPost' => $this->codPost,
            'cantHab' => $this->cantHab,
        ]);

        $query->andFilterWhere(['like', 'NomLoc', $this->NomLoc])
            ->andFilterWhere(['like', 'provincia', $this->provincia]);

        return $dataProvider;
    }
}
