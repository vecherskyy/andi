<?php

namespace app\controllers;

use app\models\Cities;
use app\models\Invites;
use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

/**
 * UserController implements the CRUD actions for Users model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {

            $invite = intval($_POST["Users"]['invite']);


            //проверяем наличие инвайта
            if($model_invite = Invites::find()->where(['invite' => $invite])->one()){

                //если инвайт уже использован
                if($model_invite->status == 1){

                    Yii::$app->session->setFlash('warning', 'Инвайт уже использован');

                }else{

                    //убираем лишние символы из строки телефона, отказался от intval, он ибирает 0 в начале строки,
                    // что может стать проблемой при использовании какого нибудь смс сервиса.
                    $model->phone = strtr($model->phone_number, ['-'=>'', ' '=>'', '('=>'', ')'=>'', '+'=>'']);

                    //пароль рекомендуется кодировать
                   //$model->password = md5($model->password);

                    if($model->save()) {

                        //изменяем статус и дату в таблице инвайт
                        $model_invite->status = 1;
                        $model_invite->date_status = date('Y-m-d');

                        if ($model_invite->save()) {

                            Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались');

                        } else {

                            Yii::$app->session->setFlash('warning', 'Вы не зарегестрировались, попробуйте еще раз.:)');
                        }
                    }else{

                        Yii::$app->session->setFlash('warning', 'Логин уже занят');
                    }
                }

            }else{

                Yii::$app->session->setFlash('warning', 'Неверный инвайт');
                return $this->refresh();
            }
            return $this->refresh();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /*
     * Получаем список городов для формы регистрации
     * */
    public function actionList($id)
    {
        $countCities = Cities::find()->where(['id_country' => $id])->count();

        $cities = Cities::find()->where(['id_country' => $id])->all();

        if($countCities > 0){
            foreach($cities as $city){
                echo "<option value='" . $city->id_city . "'> " . $city->city_name . "</option>";
            }

        }else{
            echo '<option>Выберите город</option>';
        }
    }


    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
