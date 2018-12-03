<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domestico".
 *
 * @property int $NroCli
 * @property string $dni
 *
 * @property Cliente $nroCli
 */
class Domestico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domestico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NroCli', 'dni'], 'required'],
            [['NroCli', 'dni'], 'integer'],
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
            'dni' => 'Dni',
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
