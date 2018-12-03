<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mantenimiento".
 *
 * @property int $idMant
 * @property string $comentario
 * @property int $costo
 * @property string $fechamant
 *
 * @property DispMant[] $dispMants
 * @property Dispenser[] $disps
 */
class Mantenimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mantenimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMant'], 'required'],
            [['idMant', 'costo'], 'integer'],
            [['fechamant'], 'safe'],
            [['comentario'], 'string', 'max' => 30],
            [['idMant'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMant' => 'Id Mant',
            'comentario' => 'Comentario',
            'costo' => 'Costo',
            'fechamant' => 'Fechamant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispMants()
    {
        return $this->hasMany(DispMant::className(), ['idMant' => 'idMant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisps()
    {
        return $this->hasMany(Dispenser::className(), ['idDisp' => 'idDisp'])->viaTable('disp_mant', ['idMant' => 'idMant']);
    }
}
