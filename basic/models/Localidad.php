<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidad".
 *
 * @property int $idLoc
 * @property string $provincia
 * @property int $codPost
 * @property string $cantHab
 * @property int $tipoloc
 *
 * @property ClienteLoc[] $clienteLocs
 * @property Cliente[] $nroClis
 * @property LocalidadTipo $tipoloc0
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
            [['idLoc', 'tipoloc'], 'required'],
            [['idLoc', 'codPost', 'cantHab', 'tipoloc'], 'integer'],
            [['provincia'], 'string', 'max' => 30],
            [['idLoc'], 'unique'],
            [['tipoloc'], 'exist', 'skipOnError' => true, 'targetClass' => LocalidadTipo::className(), 'targetAttribute' => ['tipoloc' => 'codltipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLoc' => 'Id Loc',
            'provincia' => 'Provincia',
            'codPost' => 'Cod Post',
            'cantHab' => 'Cant Hab',
            'tipoloc' => 'Tipoloc',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoloc0()
    {
        return $this->hasOne(LocalidadTipo::className(), ['codltipo' => 'tipoloc']);
    }
}
