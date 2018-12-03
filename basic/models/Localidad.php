<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidad".
 *
 * @property int $idLoc
 * @property string $NomLoc
 * @property string $provincia
 * @property int $codPost
 * @property int $cantHab
 *
 * @property ClienteLoc[] $clienteLocs
 * @property Cliente[] $nroClis
 */
class Localidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLoc'], 'required'],
            [['idLoc', 'codPost', 'cantHab'], 'integer'],
            [['NomLoc', 'provincia'], 'string', 'max' => 30],
            [['idLoc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLoc' => 'Id Loc',
            'NomLoc' => 'Nom Loc',
            'provincia' => 'Provincia',
            'codPost' => 'Cod Post',
            'cantHab' => 'Cant Hab',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteLocs()
    {
        return $this->hasMany(ClienteLoc::className(), ['idLoc' => 'idLoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroClis()
    {
        return $this->hasMany(Cliente::className(), ['NroCli' => 'nroCli'])->viaTable('cliente_loc', ['idLoc' => 'idLoc']);
    }
}
