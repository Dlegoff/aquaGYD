<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "abonado".
 *
 * @property int $NroCli
 * @property string $CUIT
 * @property string $email
 * @property bool $CondIva
 *
 * @property Cliente $nroCli
 * @property Abono[] $abonos
 * @property Alquiler[] $alquilers
 */
class Abonado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abonado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NroCli', 'CUIT'], 'required'],
            [['NroCli'], 'integer'],
            [['CondIva'], 'boolean'],
            [['CUIT'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 30],
            [['NroCli'], 'unique'],
            [['NroCli'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['NroCli' => 'NroCli']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NroCli' => 'Nro Cli',
            'CUIT' => 'Cuit',
            'email' => 'Email',
            'CondIva' => 'Cond Iva',
        ];
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
    public function getAbonos()
    {
        return $this->hasMany(Abono::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlquilers()
    {
        return $this->hasMany(Alquiler::className(), ['NroCli' => 'NroCli']);
    }
}
