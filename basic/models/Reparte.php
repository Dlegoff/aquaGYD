<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reparte".
 *
 * @property int $idReparto
 * @property int $idProd
 * @property int $cantParSalida
 *
 * @property Reparto $reparto
 * @property Producto $prod
 * @property Reparto $reparto0
 * @property Producto $prod0
 */
class Reparte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reparte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idReparto', 'idProd'], 'required'],
            [['idReparto', 'idProd', 'cantParSalida'], 'integer'],
            [['idReparto', 'idProd'], 'unique', 'targetAttribute' => ['idReparto', 'idProd']],
            [['idReparto'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['idReparto' => 'idReparto']],
            [['idProd'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProd' => 'idProd']],
            [['idReparto'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['idReparto' => 'idReparto']],
            [['idProd'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProd' => 'idProd']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idReparto' => 'Id Reparto',
            'idProd' => 'Id Prod',
            'cantParSalida' => 'Cant Par Salida',
        ];
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
    public function getProd()
    {
        return $this->hasOne(Producto::className(), ['idProd' => 'idProd']);
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
    public function getProd0()
    {
        return $this->hasOne(Producto::className(), ['idProd' => 'idProd']);
    }
}
