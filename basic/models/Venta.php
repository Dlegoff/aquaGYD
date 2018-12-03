<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $idVenta
 * @property int $condVenta
 * @property int $MontoT
 * @property string $fechaV
 * @property int $IdCuenta
 * @property int $idReparto
 *
 * @property Cuentacorriente $cuenta
 * @property Reparto $reparto
 * @property Cuentacorriente $cuenta0
 * @property Reparto $reparto0
 * @property VentaProducto[] $ventaProductos
 * @property Producto[] $prods
 * @property Ventadescuento[] $ventadescuentos
 * @property Descuento[] $descs
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVenta', 'condVenta', 'MontoT', 'fechaV', 'IdCuenta', 'idReparto'], 'required'],
            [['idVenta', 'condVenta', 'MontoT', 'IdCuenta', 'idReparto'], 'integer'],
            [['fechaV'], 'safe'],
            [['idVenta'], 'unique'],
            [['IdCuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentacorriente::className(), 'targetAttribute' => ['IdCuenta' => 'idCuenta']],
            [['idReparto'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['idReparto' => 'idReparto']],
            [['IdCuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentacorriente::className(), 'targetAttribute' => ['IdCuenta' => 'idCuenta']],
            [['idReparto'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['idReparto' => 'idReparto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVenta' => 'Id Venta',
            'condVenta' => 'Cond Venta',
            'MontoT' => 'Monto T',
            'fechaV' => 'Fecha V',
            'IdCuenta' => 'Id Cuenta',
            'idReparto' => 'Id Reparto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta()
    {
        return $this->hasOne(Cuentacorriente::className(), ['idCuenta' => 'IdCuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReparto()
    {
        return $this->hasOne(Reparto::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta0()
    {
        return $this->hasOne(Cuentacorriente::className(), ['idCuenta' => 'IdCuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReparto0()
    {
        return $this->hasOne(Reparto::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaProductos()
    {
        return $this->hasMany(VentaProducto::className(), ['idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds()
    {
        return $this->hasMany(Producto::className(), ['idProd' => 'idProd'])->viaTable('venta_producto', ['idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentadescuentos()
    {
        return $this->hasMany(Ventadescuento::className(), ['idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescs()
    {
        return $this->hasMany(Descuento::className(), ['idDesc' => 'idDesc'])->viaTable('ventadescuento', ['idVenta' => 'idVenta']);
    }
}
