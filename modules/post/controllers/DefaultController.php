<?php

namespace app\modules\post\controllers;

use app\models\Post;
use yii\web\Controller;

/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAjax()
    {
        $rat = false;

        $model = new Post();

        $model->title = \Yii::$app->request->post('title');
        $model->description = \Yii::$app->request->post('description');
        $model->author = \Yii::$app->request->post('author');
        $model->content = \Yii::$app->request->post('content');
        $model->created_at = date('Y-m-d');

        if($model->save()){
            $rat = true;
        }

        echo $rat;
    }

    public function actionNews()
    {

        $modelCount = Post::find()->count();
        $random = rand(1, $modelCount);
        $model = Post::find()->where(['id' => $random])->asArray()->one();
        echo json_encode($model);
    }
}
