<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventadescuento".
 *
 * @property int $idDesc
 * @property int $idVenta
 * @property int $porcentaje
 * @property int $importe
 * @property string $fechaDesc
 *
 * @property Descuento $desc
 * @property Venta $venta
 */
class Ventadescuento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventadescuento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDesc', 'idVenta'], 'required'],
            [['idDesc', 'idVenta', 'porcentaje', 'importe'], 'integer'],
            [['fechaDesc'], 'safe'],
            [['idDesc', 'idVenta'], 'unique', 'targetAttribute' => ['idDesc', 'idVenta']],
            [['idDesc'], 'exist', 'skipOnError' => true, 'targetClass' => Descuento::className(), 'targetAttribute' => ['idDesc' => 'idDesc']],
            [['idVenta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['idVenta' => 'idVenta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDesc' => 'Id Desc',
            'idVenta' => 'Id Venta',
            'porcentaje' => 'Porcentaje',
            'importe' => 'Importe',
            'fechaDesc' => 'Fecha Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesc()
    {
        return $this->hasOne(Descuento::className(), ['idDesc' => 'idDesc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['idVenta' => 'idVenta']);
    }
}
