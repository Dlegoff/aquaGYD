<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dispenser".
 *
 * @property int $idDisp
 * @property string $tipodisp
 * @property string $modelo
 * @property string $observaciones
 *
 * @property DispAlq[] $dispAlqs
 * @property Alquiler[] $alqs
 * @property DispMant[] $dispMants
 * @property Mantenimiento[] $mants
 */
class Dispenser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dispenser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDisp'], 'required'],
            [['idDisp'], 'integer'],
            [['tipodisp', 'modelo', 'observaciones'], 'string', 'max' => 30],
            [['idDisp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDisp' => 'Id Disp',
            'tipodisp' => 'Tipodisp',
            'modelo' => 'Modelo',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispAlqs()
    {
        return $this->hasMany(DispAlq::className(), ['idDisp' => 'idDisp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlqs()
    {
        return $this->hasMany(Alquiler::className(), ['idAlq' => 'idAlq'])->viaTable('disp_alq', ['idDisp' => 'idDisp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispMants()
    {
        return $this->hasMany(DispMant::className(), ['idDisp' => 'idDisp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMants()
    {
        return $this->hasMany(Mantenimiento::className(), ['idMant' => 'idMant'])->viaTable('disp_mant', ['idDisp' => 'idDisp']);
    }
}
