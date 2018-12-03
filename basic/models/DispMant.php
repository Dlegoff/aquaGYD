<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disp_mant".
 *
 * @property int $idDisp
 * @property int $idMant
 * @property string $fechaMant
 * @property int $importe
 *
 * @property Dispenser $disp
 * @property Mantenimiento $mant
 */
class DispMant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disp_mant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDisp', 'idMant'], 'required'],
            [['idDisp', 'idMant', 'importe'], 'integer'],
            [['fechaMant'], 'safe'],
            [['idDisp', 'idMant'], 'unique', 'targetAttribute' => ['idDisp', 'idMant']],
            [['idDisp'], 'exist', 'skipOnError' => true, 'targetClass' => Dispenser::className(), 'targetAttribute' => ['idDisp' => 'idDisp']],
            [['idMant'], 'exist', 'skipOnError' => true, 'targetClass' => Mantenimiento::className(), 'targetAttribute' => ['idMant' => 'idMant']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDisp' => 'Id Disp',
            'idMant' => 'Id Mant',
            'fechaMant' => 'Fecha Mant',
            'importe' => 'Importe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisp()
    {
        return $this->hasOne(Dispenser::className(), ['idDisp' => 'idDisp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMant()
    {
        return $this->hasOne(Mantenimiento::className(), ['idMant' => 'idMant']);
    }
}
