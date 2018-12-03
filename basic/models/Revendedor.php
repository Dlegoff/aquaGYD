<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revendedor".
 *
 * @property int $NroCli
 * @property string $email
 *
 * @property Cliente $nroCli
 */
class Revendedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revendedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NroCli'], 'required'],
            [['NroCli'], 'integer'],
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
            'email' => 'Email',
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
