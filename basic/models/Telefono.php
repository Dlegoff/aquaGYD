<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefono".
 *
 * @property int $NroCli
 * @property string $Telefono
 *
 * @property Cliente $nroCli
 */
class Telefono extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefono';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NroCli', 'Telefono'], 'required'],
            [['NroCli', 'Telefono'], 'integer'],
            [['NroCli', 'Telefono'], 'unique', 'targetAttribute' => ['NroCli', 'Telefono']],
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
            'Telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNroCli()
    {
        return $this->hasOne(Cliente::className(), ['NroCli' => 'NroCli']);
    }
}
