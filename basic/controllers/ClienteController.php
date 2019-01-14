<?php

namespace app\controllers;

use Yii;
use app\models\Cliente;
use app\models\Localidad;
use app\models\LocalidadTipo;
use app\models\ClienteBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\utils\utb;
use yii\helpers\ArrayHelper;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
         $model= new Cliente();
        $tipos=[];
        $searchModel = new ClienteBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $tipos=utb::setCombo($model->getTipoClientes(),'codctipo');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipos' => $tipos
        ]);
    }

    /**
     * Displays a single Cliente model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($scenario='')
    {
        //print_r($scenario);exit;
        $model = new Cliente();
        $model->setScenario($scenario);
        $modelLoc= new Localidad();
        $tipos=utb::setCombo($model->getTipoClientes(),'codctipo');
        /**
         *El combo de Localidades se armo de esta forma porque por alguna razon no andaba de otra...
         */
        $localidades = LocalidadTipo::find()->all();
        $listData = ArrayHelper::map($localidades, 'codltipo', 'nombre');
        $model->contacto=[];// = ['NroCli' => $value->NroCli, 'Telefono' => $value->Telefono];

        if ($model->load(Yii::$app->request->post())/* && $model->save()*/) {
            $model->grabarCliente();
            if($model->hasErrors()){
                $error=$model->getErrors();
                return json_encode($error);
            }
            return $this->redirect(['view', 'id' => $model->NroCli]);
        }

        return $this->render('create', [
            'model' => $model,
            'tipos' => $tipos,
            'localidades'=>$listData
        ]);
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->NroCli]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
