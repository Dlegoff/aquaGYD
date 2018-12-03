<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentacorriente".
 *
 * @property int $idCuenta
 * @property int $SaldoAct
 * @property int $SaldoLimit
 * @property bool $Estado
 * @property string $fechaCC
 *
 * @property Cliente[] $clientes
 * @property Pago[] $pagos
 * @property Venta[] $ventas
 * @property Venta[] $ventas0
 */
class Cuentacorriente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cuentacorriente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCuenta'], 'required'],
            [['idCuenta', 'SaldoAct', 'SaldoLimit'], 'integer'],
            [['Estado'], 'boolean'],
            [['fechaCC'], 'safe'],
            [['idCuenta'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCuenta' => 'Id Cuenta',
            'SaldoAct' => 'Saldo Act',
            'SaldoLimit' => 'Saldo Limit',
            'Estado' => 'Estado',
            'fechaCC' => 'Fecha Cc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['idCuenta' => 'idCuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['idcuenta' => 'idCuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['IdCuenta' => 'idCuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas0()
    {
        return $this->hasMany(Venta::className(), ['IdCuenta' => 'idCuenta']);
    }
}
