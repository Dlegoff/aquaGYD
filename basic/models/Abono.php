<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "abono".
 *
 * @property int $idAbono
 * @property int $NroCli
 * @property int $monto
 * @property int $cantBidones
 * @property string $fechaCobro
 * @property string $fechaAlta
 *
 * @property Abonado $nroCli
 */
class Abono extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abono';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAbono', 'NroCli'], 'required'],
            [['idAbono', 'NroCli', 'monto', 'cantBidones'], 'integer'],
            [['fechaCobro', 'fechaAlta'], 'safe'],
            [['idAbono', 'NroCli'], 'unique', 'targetAttribute' => ['idAbono', 'NroCli']],
            [['NroCli'], 'exist', 'skipOnError' => true, 'targetClass' => Abonado::className(), 'targetAttribute' => ['NroCli' => 'NroCli']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAbono' => 'Id Abono',
            'NroCli' => 'Nro Cli',
            'monto' => 'Monto',
            'cantBidones' => 'Cant Bidones',
            'fechaCobro' => 'Fecha Cobro',
            'fechaAlta' => 'Fecha Alta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroCli()
    {
        return $this->hasOne(Abonado::className(), ['NroCli' => 'NroCli']);
    }
}
