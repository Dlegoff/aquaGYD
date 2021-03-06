<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoBuscar represents the model behind the search form of `app\models\Producto`.
 */
class ProductoBuscar extends Producto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProd', 'tipo', 'stock', 'stockMin', 'precioU'], 'integer'],
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
        $query = Producto::find();

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
            'idProd' => $this->idProd,
            'tipo' => $this->tipo,
            'stock' => $this->stock,
            'stockMin' => $this->stockMin,
            'precioU' => $this->precioU,
        ]);

        return $dataProvider;
    }
}
