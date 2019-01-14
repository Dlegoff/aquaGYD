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

    public $localidad;
    public $tbidon;
   
    public $contacto;

    //Tabla Cliente_Localidad
    public $calle_nom;
    public $calle_nro;
    public $fechaVive;
    public $piso;
    public $dpto;
    //-------------//

    //Tabla CuentaCorriente
    public $SaldoAct;
    public $SaldoLimit;
    public $fechaCC;
    public $Estado;
    //-------------//

    //Tabla Abono
    public $idAbono;
    public $monto;
    public $cantBidones;
    public $fechaCobro;
    public $fechaAlta;
    //--------------//

    //Tabla Abonado
    public $cuit;
    public $email_abonado;
    public $condiva;

    //Tabla Domestico
    public $dni;
    //--------------//

    //Tabla Revendedor
    public $email;
    //--------------//


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
            [['NroCli', 'idCuenta', 'tipocli','calle_nro','localidad','dni', 'idAbono','monto','cantBidones', 'SaldoAct','SaldoLimit','Estado', 'piso','dpto'], 'integer'],
            [['fechaCobro','fechaAlta', 'fechaCC', 'fechaVive'],'safe'],
            [['estado','calle_nom', 'cuit'],'string'],
            [['nombre', 'observaciones'], 'string', 'max' => 30],
            [['NroCli'], 'unique'],
            ['email','email'],
            [['idCuenta'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentacorriente::className(), 'targetAttribute' => ['idCuenta' => 'idCuenta']],
            [['tipocli'], 'exist', 'skipOnError' => true, 'targetClass' => ClienteTipo::className(), 'targetAttribute' => ['tipocli' => 'codctipo']],
        ];
    }

    public function scenarios()
    {

        return [
            'insert' => ['NroCli', 'idCuenta', 'tipocli', 'calle_nro', 'localidad', 'dni', 'idAbono', 'monto', 'cantBidones', 'SaldoAct', 'SaldoLimit', 'Estado', 'piso', 'dpto', 'fechaCobro', 'fechaAlta', 'fechaCC', 'fechaVive', 'estado', 'calle_nom', 'cuit', 'nombre', 'observaciones', 'email','idLoc'],

            'update' => ['NroCli', 'idCuenta', 'tipocli', 'calle_nro', 'localidad', 'dni', 'idAbono', 'monto', 'cantBidones', 'SaldoAct', 'SaldoLimit', 'Estado', 'piso', 'dpto', 'fechaCobro', 'fechaAlta', 'fechaCC', 'fechaVive', 'estado', 'calle_nom', 'cuit', 'nombre', 'observaciones', 'email','idLoc'],

            'delete' => ['NroCli', 'idCuenta','idLoc','idAbono']
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
                    //Maximo id de cliente
                    $sql="select MAX(NroCli)+1 from cliente";
                    $this->NroCli=Yii::$app->db->createCommand($sql)->queryScalar();
                     //-----------------------------------------------------------------//

                    //Maximo id de cuentacorriente
                    $sql = "select max(idCuenta)+1 from cuentacorriente";
                    $this->idCuenta = Yii::$app->db->createCommand($sql)->queryScalar();
                     //-----------------------------------------------------------------//

                    //Maximo id de abono
                    $sql="select max(idAbono)+1 from abono";
                    $this->idAbono = Yii::$app->db->createCommand($sql)->queryScalar();
                    //-----------------------------------------------------------------//
                    //Inserto la cuentacorriente
                    $sql = "insert into cuentacorriente values (" . $this->idCuenta . "," . $this->SaldoAct . "," . $this->SaldoLimit . ",'$this->fechaCC',1)";
                    Yii::$app->db->createCommand($sql)->execute();
                    //-----------------------------------------------------------------//

                    //Inserto el Cliente
                    $sql = "insert into cliente values (".$this->NroCli.",'$this->nombre','$this->observaciones',".$this->idCuenta.",".$this->idLoc.",".$this->tipocli.")";
                    Yii::$app->db->createCommand($sql)->execute();
                    //-----------------------------------------------------------------//


                    //inserto la localidad
                    $sql = "insert into cliente_loc values (" . $this->idLoc . "," . $this->NroCli . ",'$this->calle_nom'," . $this->calle_nro . ",'$this->fechaVive'," . $this->piso . "," . $this->dpto . " )";
                    Yii::$app->db->createCommand($sql)->execute();
                    //-----------------------------------------------------------------//

                    //Abono
                    if($this->tipocli==1){
                        $sql="insert into abono values (".$this->idAbono.",".$this->NroCli.",".$this->monto.",".$this->cantBidones.",'$this->fechaCobro','$this->fechaAlta')";
                        Yii::$app->db->createCommand($sql)->execute();

                        //Abonado
                        $sql="insert into abonado values (".$this->NroCli.",'$this->cuit','$this->email_abonado',".$this->condiva;

                    }
                    //Domestico
                    if($this->tipocli==2){
                        $sql="insert into domestico values (".$this->NroCli.",$this->dni)";
                        Yii::$app->db->createCommand($sql)->execute();
                    }
                    //Revendedor
                    if($this->tipocli==3){
                        $sql = "insert into revendedor values (".$this->NroCli.",'$this->email')";
                        Yii::$app->db->createCommand($sql)->execute();
                    }

                    break;

                case 'update': //UPDATE
                    //Modifico el Cliente
                    $sql = "update cliente SET nombre='$this>nombre', observaciones='$this->observaciones',idLoc=".$this->idLoc.",tipocli=".$this->tipocli." where NroCli=".$this->NroCli;
                    Yii::$app->db->createCommand($sql)->execute();

                    //Modifico la cuentacorriente
                    $sql = "update cuentacorriente set SaldoAct=" . $this->SaldoAct . ",SaldoLimit=" . $this->SaldoLimit . ",fechaCC='$this->fechaCC',Estado=$this->Estado where NroCli=".$this->NroCli." and idCuenta=".$this->idCuenta;
                    Yii::$app->db->createCommand($sql)->execute();
                    //-----------------------------------------------------------------//

                    //Modifico la localidad
                    $sql = "update cliente_loc set nomCalle='$this->calle_nom',nroCalle=" . $this->calle_nro . ",fechaVive='$this->fechaVive',piso=" . $this->piso . ",depto=" . $this->dpto . " where idLoc=".$this->idLoc." and nroCli=".$this->NroCli;
                    Yii::$app->db->createCommand($sql)->execute();

                    //Abono
                    if ($this->tipocli == 1) {
                        $sql = "update abono SET monto=".$this->monto . ",cantBidones=" . $this->cantBidones . ",fechaCobro='$this->fechaCobro',fechaAlta='$this->fechaAlta' where NroCli=".$this->NroCli;
                        Yii::$app->db->createCommand($sql)->execute();

                        //Abonado
                        $sql = "update abonado set cuit='$this->cuit',email='$this->email_abonado',CondIva=" . $this->condiva. " where NroCli=" . $this->NroCli;

                        
                    }
                    //Domestico
                    if ($this->tipocli == 2) {
                        $sql = "update domestico SET dni=".$this->dni." where NroCli=".$this->NroCli;
                        Yii::$app->db->createCommand($sql)->execute();
                    }
                    //Revendedor
                    if ($this->tipocli == 3) {
                        $sql = "update revendedor set email='$this->email' where NroCli=".$this->NroCli;
                        Yii::$app->db->createCommand($sql)->execute();
                    }

                    break;

                case 'delete': //Delete
                    
                    $sql = "delete from cliente where NroCli=$this->NroCli";
                    Yii::$app->db->createCommand($sql)->execute();

                    //Elimino la cuentacorriente
                    $sql = "delete from cuentacorriente where NroCli=" . $this->NroCli . " and idCuenta=" . $this->idCuenta;
                    Yii::$app->db->createCommand($sql)->execute();

                    //Elimino la localidad
                    $sql = "delete from cliente_loc where idLoc=" . $this->idLoc . " and nroCli=" . $this->NroCli;
                    Yii::$app->db->createCommand($sql)->execute();

                    //Abono
                    if ($this->tipocli == 1) {
                        $sql = "delete from abono where NroCli=" . $this->NroCli;
                        Yii::$app->db->createCommand($sql)->execute();

                        //Abonado
                        $sql = "delete from abonado where NroCli=" . $this->NroCli;
                    }
                    //Domestico
                    if ($this->tipocli == 2) {
                        $sql = "delete from domestico where NroCli=" . $this->NroCli;
                        Yii::$app->db->createCommand($sql)->execute();
                    }
                    //Revendedor
                    if ($this->tipocli == 3) {
                        $sql = "delete from revendedor where NroCli=" . $this->NroCli;
                        Yii::$app->db->createCommand($sql)->execute();
                    }

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
