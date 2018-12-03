<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta_producto".
 *
 * @property int $idProd
 * @property int $idVenta
 * @property int $cant
 * @property int $MontoP
 *
 * @property Venta $venta
 * @property Producto $prod
 */
class VentaProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProd', 'idVenta'], 'required'],
            [['idProd', 'idVenta', 'cant', 'MontoP'], 'integer'],
            [['idProd', 'idVenta'], 'unique', 'targetAttribute' => ['idProd', 'idVenta']],
            [['idVenta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['idVenta' => 'idVenta']],
            [['idProd'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProd' => 'idProd']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProd' => 'Id Prod',
            'idVenta' => 'Id Venta',
            'cant' => 'Cant',
            'MontoP' => 'Monto P',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Producto::className(), ['idProd' => 'idProd']);
    }
}
