<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camion".
 *
 * @property int $idCamion
 * @property string $marca
 * @property int $modelo
 * @property int $capCargakg
 * @property string $Obs
 *
 * @property Reparto[] $repartos
 * @property Reparto[] $repartos0
 */
class Camion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'camion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCamion', 'capCargakg'], 'required'],
            [['idCamion', 'modelo', 'capCargakg'], 'integer'],
            [['marca', 'Obs'], 'string', 'max' => 30],
            [['idCamion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCamion' => 'Id Camion',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'capCargakg' => 'Cap Cargakg',
            'Obs' => 'Obs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos()
    {
        return $this->hasMany(Reparto::className(), ['idCamion' => 'idCamion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos0()
    {
        return $this->hasMany(Reparto::className(), ['idCamion' => 'idCamion']);
    }
}
