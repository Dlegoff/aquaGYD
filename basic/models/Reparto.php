<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reparto".
 *
 * @property int $idReparto
 * @property string $fechaReparto
 * @property int $idRepartidor
 * @property int $cantSalida
 * @property int $cantTotLLegLL
 * @property int $CantTotLLV
 * @property int $idCamion
 *
 * @property Reparte[] $repartes
 * @property Reparte[] $repartes0
 * @property Producto[] $prods
 * @property Producto[] $prods0
 * @property Producto[] $prods1
 * @property Producto[] $prods2
 * @property Repartidor $repartidor
 * @property Camion $camion
 * @property Repartidor $repartidor0
 * @property Camion $camion0
 * @property Retorna[] $retornas
 * @property Retorna[] $retornas0
 * @property Venta[] $ventas
 * @property Venta[] $ventas0
 */
class Reparto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reparto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idReparto'], 'required'],
            [['idReparto', 'idRepartidor', 'cantSalida', 'cantTotLLegLL', 'CantTotLLV', 'idCamion'], 'integer'],
            [['fechaReparto'], 'safe'],
            [['idReparto'], 'unique'],
            [['idRepartidor'], 'exist', 'skipOnError' => true, 'targetClass' => Repartidor::className(), 'targetAttribute' => ['idRepartidor' => 'idRepartidor']],
            [['idCamion'], 'exist', 'skipOnError' => true, 'targetClass' => Camion::className(), 'targetAttribute' => ['idCamion' => 'idCamion']],
            [['idRepartidor'], 'exist', 'skipOnError' => true, 'targetClass' => Repartidor::className(), 'targetAttribute' => ['idRepartidor' => 'idRepartidor']],
            [['idCamion'], 'exist', 'skipOnError' => true, 'targetClass' => Camion::className(), 'targetAttribute' => ['idCamion' => 'idCamion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idReparto' => 'Id Reparto',
            'fechaReparto' => 'Fecha Reparto',
            'idRepartidor' => 'Id Repartidor',
            'cantSalida' => 'Cant Salida',
            'cantTotLLegLL' => 'Cant Tot Lleg Ll',
            'CantTotLLV' => 'Cant Tot Llv',
            'idCamion' => 'Id Camion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartes()
    {
        return $this->hasMany(Reparte::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartes0()
    {
        return $this->hasMany(Reparte::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds()
    {
        return $this->hasMany(Producto::className(), ['idProd' => 'idProd'])->viaTable('reparte', ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds0()
    {
        return $this->hasMany(Producto::className(), ['idProd' => 'idProd'])->viaTable('reparte', ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds1()
    {
        return $this->hasMany(Producto::className(), ['idProd' => 'idProd'])->viaTable('reparte', ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProds2()
    {
        return $this->hasMany(Producto::className(), ['idProd' => 'idProd'])->viaTable('reparte', ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartidor()
    {
        return $this->hasOne(Repartidor::className(), ['idRepartidor' => 'idRepartidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCamion()
    {
        return $this->hasOne(Camion::className(), ['idCamion' => 'idCamion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepartidor0()
    {
        return $this->hasOne(Repartidor::className(), ['idRepartidor' => 'idRepartidor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCamion0()
    {
        return $this->hasOne(Camion::className(), ['idCamion' => 'idCamion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetornas()
    {
        return $this->hasMany(Retorna::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetornas0()
    {
        return $this->hasMany(Retorna::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idReparto' => 'idReparto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas0()
    {
        return $this->hasMany(Venta::className(), ['idReparto' => 'idReparto']);
    }
}
