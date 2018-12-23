<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_tipo".
 *
 * @property int $codptipo
 * @property string $nombre
 * @property string $fechamod
 */
class ProductoTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codptipo'], 'required'],
            [['codptipo'], 'integer'],
            [['fechamod'], 'safe'],
            [['nombre'], 'string', 'max' => 30],
            [['codptipo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codptipo' => 'Codptipo',
            'nombre' => 'Nombre',
            'fechamod' => 'Fechamod',
        ];
    }
}
