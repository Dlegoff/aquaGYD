<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retorna".
 *
 * @property int $idReparto
 * @property int $idProd
 * @property int $NroCli
 * @property int $cantParLLegLL
 * @property int $cantParLLegV
 *
 * @property Reparto $reparto
 * @property Producto $prod
 * @property Cliente $nroCli
 * @property Reparto $reparto0
 * @property Producto $prod0
 * @property Cliente $nroCli0
 */
class Retorna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retorna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idReparto', 'idProd', 'NroCli'], 'required'],
            [['idReparto', 'idProd', 'NroCli', 'cantParLLegLL', 'cantParLLegV'], 'integer'],
            [['idReparto', 'idProd', 'NroCli'], 'unique', 'targetAttribute' => ['idReparto', 'idProd', 'NroCli']],
            [['idReparto'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['idReparto' => 'idReparto']],
            [['idProd'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProd' => 'idProd']],
            [['NroCli'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['NroCli' => 'NroCli']],
            [['idReparto'], 'exist', 'skipOnError' => true, 'targetClass' => Reparto::className(), 'targetAttribute' => ['idReparto' => 'idReparto']],
            [['idProd'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProd' => 'idProd']],
            [['NroCli'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['NroCli' => 'NroCli']],
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
            'NroCli' => 'Nro Cli',
            'cantParLLegLL' => 'Cant Par Lleg Ll',
            'cantParLLegV' => 'Cant Par Lleg V',
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
    public function getNroCli()
    {
        return $this->hasOne(Cliente::className(), ['NroCli' => 'NroCli']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroCli0()
    {
        return $this->hasOne(Cliente::className(), ['NroCli' => 'NroCli']);
    }
}
