<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente_tipo".
 *
 * @property int $codctipo
 * @property string $nombre
 * @property string $fechamod
 *
 * @property Cliente[] $clientes
 */
class ClienteTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codctipo'], 'required'],
            [['codctipo'], 'integer'],
            [['fechamod'], 'safe'],
            [['nombre'], 'string', 'max' => 30],
            [['codctipo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codctipo' => 'Codctipo',
            'nombre' => 'Nombre',
            'fechamod' => 'Fechamod',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['tipocli' => 'codctipo']);
    }
}
