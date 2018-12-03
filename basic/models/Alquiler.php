<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alquiler".
 *
 * @property int $idAlq
 * @property string $fechaAlq
 * @property string $fechaCancel
 * @property bool $estado
 * @property int $NroCli
 *
 * @property Abonado $nroCli
 * @property DispAlq[] $dispAlqs
 * @property Dispenser[] $disps
 */
class Alquiler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alquiler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAlq'], 'required'],
            [['idAlq', 'NroCli'], 'integer'],
            [['fechaAlq', 'fechaCancel'], 'safe'],
            [['estado'], 'boolean'],
            [['idAlq'], 'unique'],
            [['NroCli'], 'exist', 'skipOnError' => true, 'targetClass' => Abonado::className(), 'targetAttribute' => ['NroCli' => 'NroCli']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAlq' => 'Id Alq',
            'fechaAlq' => 'Fecha Alq',
            'fechaCancel' => 'Fecha Cancel',
            'estado' => 'Estado',
            'NroCli' => 'Nro Cli',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroCli()
    {
        return $this->hasOne(Abonado::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispAlqs()
    {
        return $this->hasMany(DispAlq::className(), ['idAlq' => 'idAlq']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisps()
    {
        return $this->hasMany(Dispenser::className(), ['idDisp' => 'idDisp'])->viaTable('disp_alq', ['idAlq' => 'idAlq']);
    }
}
