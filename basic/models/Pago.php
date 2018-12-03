<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $idPago
 * @property int $montoPago
 * @property int $MedioPago
 * @property string $fechaPago
 * @property int $idcuenta
 *
 * @property Cuentacorriente $cuenta
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPago'], 'required'],
            [['idPago', 'montoPago', 'MedioPago', 'idcuenta'], 'integer'],
            [['fechaPago'], 'safe'],
            [['idPago'], 'unique'],
            [['idcuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentacorriente::className(), 'targetAttribute' => ['idcuenta' => 'idCuenta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPago' => 'Id Pago',
            'montoPago' => 'Monto Pago',
            'MedioPago' => 'Medio Pago',
            'fechaPago' => 'Fecha Pago',
            'idcuenta' => 'Idcuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta()
    {
        return $this->hasOne(Cuentacorriente::className(), ['idCuenta' => 'idcuenta']);
    }
}
