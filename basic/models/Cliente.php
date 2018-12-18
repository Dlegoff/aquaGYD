<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $NroCli
 * @property string $nombre
 * @property string $observaciones
 * @property int $idCuenta
 * @property int $tipocli
 *
 * @property Abonado $abonado
 * @property Cuentacorriente $cuenta
 * @property ClienteTipo $tipocli0
 * @property ClienteLoc[] $clienteLocs
 * @property Localidad[] $locs
 * @property Domestico $domestico
 * @property Retorna[] $retornas
 * @property Retorna[] $retornas0
 * @property Revendedor $revendedor
 * @property Telefono[] $telefonos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NroCli', 'tipocli'], 'required'],
            [['NroCli', 'idCuenta', 'tipocli'], 'integer'],
            [['nombre', 'observaciones'], 'string', 'max' => 30],
            [['NroCli'], 'unique'],
            [['idCuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentacorriente::className(), 'targetAttribute' => ['idCuenta' => 'idCuenta']],
            [['tipocli'], 'exist', 'skipOnError' => true, 'targetClass' => ClienteTipo::className(), 'targetAttribute' => ['tipocli' => 'codctipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NroCli' => 'Nro Cli',
            'nombre' => 'Nombre',
            'observaciones' => 'Observaciones',
            'idCuenta' => 'Id Cuenta',
            'tipocli' => 'Tipocli',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbonado()
    {
        return $this->hasOne(Abonado::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta()
    {
        return $this->hasOne(Cuentacorriente::className(), ['idCuenta' => 'idCuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipocli0()
    {
        return $this->hasOne(ClienteTipo::className(), ['codctipo' => 'tipocli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteLocs()
    {
        return $this->hasMany(ClienteLoc::className(), ['nroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocs()
    {
        return $this->hasMany(Localidad::className(), ['idLoc' => 'idLoc'])->viaTable('cliente_loc', ['nroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomestico()
    {
        return $this->hasOne(Domestico::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetornas()
    {
        return $this->hasMany(Retorna::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetornas0()
    {
        return $this->hasMany(Retorna::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevendedor()
    {
        return $this->hasOne(Revendedor::className(), ['NroCli' => 'NroCli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonos()
    {
        return $this->hasMany(Telefono::className(), ['NroCli' => 'NroCli']);
    }

     public function getClientes(){
        $result=Yii::$app->db->createCommand("select c.NroCli, c.idCuenta, t.nombre as tipo,tipocli, c.nombre,c.observaciones from cliente c left join cliente_tipo t on (c.tipocli=t.codctipo)")->queryAll();
        return $result;
    }

    public function getTipoClientes(){
        return Yii::$app->db->createCommand('select codctipo,nombre from cliente_tipo')->queryAll();
    }
}
