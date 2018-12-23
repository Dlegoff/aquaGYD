<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $idProd
 * @property int $tipo
 * @property int $stock
 * @property int $stockMin
 * @property int $precioU
 *
 * @property ProductoTipo $tipo0
 * @property Reparte[] $repartes
 * @property Reparte[] $repartes0
 * @property Reparto[] $repartos
 * @property Reparto[] $repartos0
 * @property Reparto[] $repartos1
 * @property Reparto[] $repartos2
 * @property Retorna[] $retornas
 * @property Retorna[] $retornas0
 * @property VentaProducto[] $ventaProductos
 * @property Venta[] $ventas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProd'], 'required'],
            [['idProd', 'tipo', 'stock', 'stockMin', 'precioU'], 'integer'],
            [['idProd'], 'unique'],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => ProductoTipo::className(), 'targetAttribute' => ['tipo' => 'codptipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProd' => 'Id Prod',
            'tipo' => 'Tipo',
            'stock' => 'Stock',
            'stockMin' => 'Stock Min',
            'precioU' => 'Precio U',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(ProductoTipo::className(), ['codptipo' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartes()
    {
        return $this->hasMany(Reparte::className(), ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartes0()
    {
        return $this->hasMany(Reparte::className(), ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos()
    {
        return $this->hasMany(Reparto::className(), ['idReparto' => 'idReparto'])->viaTable('reparte', ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos0()
    {
        return $this->hasMany(Reparto::className(), ['idReparto' => 'idReparto'])->viaTable('reparte', ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos1()
    {
        return $this->hasMany(Reparto::className(), ['idReparto' => 'idReparto'])->viaTable('reparte', ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartos2()
    {
        return $this->hasMany(Reparto::className(), ['idReparto' => 'idReparto'])->viaTable('reparte', ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetornas()
    {
        return $this->hasMany(Retorna::className(), ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetornas0()
    {
        return $this->hasMany(Retorna::className(), ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaProductos()
    {
        return $this->hasMany(VentaProducto::className(), ['idProd' => 'idProd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idVenta' => 'idVenta'])->viaTable('venta_producto', ['idProd' => 'idProd']);
    }
}
