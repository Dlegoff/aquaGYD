<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "descuento".
 *
 * @property int $idDesc
 * @property int $porcentaje
 * @property string $descripcion
 *
 * @property Ventadescuento[] $ventadescuentos
 * @property Venta[] $ventas
 */
class Descuento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'descuento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDesc'], 'required'],
            [['idDesc', 'porcentaje'], 'integer'],
            [['descripcion'], 'string', 'max' => 30],
            [['idDesc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDesc' => 'Id Desc',
            'porcentaje' => 'Porcentaje',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentadescuentos()
    {
        return $this->hasMany(Ventadescuento::className(), ['idDesc' => 'idDesc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idVenta' => 'idVenta'])->viaTable('ventadescuento', ['idDesc' => 'idDesc']);
    }
}
