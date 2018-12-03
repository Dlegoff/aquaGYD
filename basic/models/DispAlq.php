<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disp_alq".
 *
 * @property int $idDisp
 * @property int $idAlq
 * @property string $fechaAlta
 * @property string $fechaBaja
 * @property string $motivobaja
 * @property bool $estado
 * @property string $comodato
 *
 * @property Alquiler $alq
 * @property Dispenser $disp
 */
class DispAlq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disp_alq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDisp', 'idAlq'], 'required'],
            [['idDisp', 'idAlq'], 'integer'],
            [['fechaAlta', 'fechaBaja'], 'safe'],
            [['estado'], 'boolean'],
            [['motivobaja', 'comodato'], 'string', 'max' => 30],
            [['idDisp', 'idAlq'], 'unique', 'targetAttribute' => ['idDisp', 'idAlq']],
            [['idAlq'], 'exist', 'skipOnError' => true, 'targetClass' => Alquiler::className(), 'targetAttribute' => ['idAlq' => 'idAlq']],
            [['idDisp'], 'exist', 'skipOnError' => true, 'targetClass' => Dispenser::className(), 'targetAttribute' => ['idDisp' => 'idDisp']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDisp' => 'Id Disp',
            'idAlq' => 'Id Alq',
            'fechaAlta' => 'Fecha Alta',
            'fechaBaja' => 'Fecha Baja',
            'motivobaja' => 'Motivobaja',
            'estado' => 'Estado',
            'comodato' => 'Comodato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlq()
    {
        return $this->hasOne(Alquiler::className(), ['idAlq' => 'idAlq']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisp()
    {
        return $this->hasOne(Dispenser::className(), ['idDisp' => 'idDisp']);
    }
}
