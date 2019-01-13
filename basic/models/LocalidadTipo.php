<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidad_tipo".
 *
 * @property int $codltipo
 * @property string $nombre
 * @property string $fechamod
 *
 * @property Localidad[] $localidads
 */
class LocalidadTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localidad_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codltipo'], 'required'],
            [['codltipo'], 'integer'],
            [['fechamod'], 'safe'],
            [['nombre'], 'string', 'max' => 30],
            [['codltipo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codltipo' => 'Codltipo',
            'nombre' => 'Nombre',
            'fechamod' => 'Fechamod',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidads()
    {
        return $this->hasMany(Localidad::className(), ['tipoloc' => 'codltipo']);
    }
}
