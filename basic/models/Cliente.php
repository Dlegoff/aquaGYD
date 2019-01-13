<?php

namespace app\models;

use Yii;
use app\utils\utb;
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

    public $estado;
    public $localidad;
    public $calle_nro;
    public $calle_nom;
    public $tbidon;
    public $fchalq;
    public $fchini;
    public $monto;
    public $cantidad;
    public $cuit;
    public $email;
    public $condiva;
    public $dni;
    public $saldoAct;
    public $saldoLim;
    public $fchloc;
    public $contacto;
    public $piso;
    public $dpto;
    //Falta agregar todas estas variables al rules de abajo para recibir todo por submit y hacer el load del controlador.

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
            [['NroCli', 'idCuenta', 'tipocli','calle_nro','localidad'], 'integer'],
            [['estado','calle_nom'],'string'],
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

    public function __construct(){
        $this->tipocli=0;
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

    public function getLocalidades()
    {
        return utb::getAux('localidad', 'idLoc');
    }

    public function grabarCliente(){


        $transaction = Yii::$app->db->beginTransaction();
        try {

            switch ($this->scenario) {

                case 'insert':  //Insert

                    $sql = "insert into cliente values ()";
                    Yii::$app->db->createCommand($sql)->execute();
                    break;

                case 'update': //UPDATE

                    $sql = "update cliente SET ";
                    Yii::$app->db->createCommand($sql)->execute();

                    break;

                case 'delete': //Delete
                    
                    $sql = "update cliente set est='B' WHERE ";

                    Yii::$app->db->createCommand($sql)->execute();

                    break;

            }

        } catch (\Exception $e) {

            $transaction->rollback();
            $this->addError('cliente', $e->getMessage());

            return false;
        }

        $transaction->commit();
        return true;
    }
}
