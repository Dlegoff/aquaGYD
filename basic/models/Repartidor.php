<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repartidor".
 *
 * @property int $idRepartidor
 * @property string $NyA
 * @property string $nomcalle
 * @property string $numcalle
 * @property int $idLoc
 * @property string $TelRep
 *
 * @property Reparto[] $repartos
 * @property Reparto[] $repartos0
 */
class Repartidor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repartidor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRepartidor', 'TelRep'], 'required'],
            [['idRepartidor', 'idLoc', 'TelRep'], 'integer'],
            [['NyA', 'nomcalle', 'numcalle'], 'string', 'max' => 30],
            [['idRepartidor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRepartidor' => 'Id Repartidor',
            'NyA' => 'Ny A',
            'nomcalle' => 'Nomcalle',
            'numcalle' => 'Numcalle',
            'idLoc' => 'Id Loc',
            'TelRep' => 'Tel Rep',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos()
    {
        return $this->hasMany(Reparto::className(), ['idRepartidor' => 'idRepartidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos0()
    {
        return $this->hasMany(Reparto::className(), ['idRepartidor' => 'idRepartidor']);
    }
}
