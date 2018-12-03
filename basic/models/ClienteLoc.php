<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente_loc".
 *
 * @property int $idLoc
 * @property int $nroCli
 * @property string $nomCalle
 * @property string $nroCalle
 * @property string $fechaVive
 *
 * @property Localidad $loc
 * @property Cliente $nroCli0
 */
class ClienteLoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente_loc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLoc', 'nroCli'], 'required'],
            [['idLoc', 'nroCli'], 'integer'],
            [['fechaVive'], 'safe'],
            [['nomCalle', 'nroCalle'], 'string', 'max' => 30],
            [['idLoc', 'nroCli'], 'unique', 'targetAttribute' => ['idLoc', 'nroCli']],
            [['idLoc'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['idLoc' => 'idLoc']],
            [['nroCli'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['nroCli' => 'NroCli']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLoc' => 'Id Loc',
            'nroCli' => 'Nro Cli',
            'nomCalle' => 'Nom Calle',
            'nroCalle' => 'Nro Calle',
            'fechaVive' => 'Fecha Vive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoc()
    {
        return $this->hasOne(Localidad::className(), ['idLoc' => 'idLoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroCli0()
    {
        return $this->hasOne(Cliente::className(), ['NroCli' => 'nroCli']);
    }
}
