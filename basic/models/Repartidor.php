<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repartidor".
 *
 * @property int $idRepartidor
 * @property string $NyA
 * @property string $TelRep
 * @property string $nomcalle
 * @property string $numcalle
 * @property int $idLoc
 * @property int $piso
 * @property int $depto
 *
 * @property Reparto[] $repartos
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
            [['idRepartidor'], 'required'],
            [['idRepartidor', 'TelRep', 'idLoc', 'piso', 'depto'], 'integer'],
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
            'TelRep' => 'Tel Rep',
            'nomcalle' => 'Nomcalle',
            'numcalle' => 'Numcalle',
            'idLoc' => 'Id Loc',
            'piso' => 'Piso',
            'depto' => 'Depto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos()
    {
        return $this->hasMany(Reparto::className(), ['idRepartidor' => 'idRepartidor']);
    }
}
