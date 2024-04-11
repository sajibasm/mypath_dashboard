<?php

namespace app\controllers;

use app\models\AccountUser;
use app\models\AccountWheelchair;
use app\models\AccountWheelchairSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccountWheelchairController implements the CRUD actions for AccountWheelchair model.
 */
class AccountWheelchairController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'view'],
                    'rules' => [
                        [
                            'actions' => ['index', 'view'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionUserWheelchair() {
        if (isset($_POST['expandRowKey'])) {
            $model = new AccountWheelchair();
            $searchModel = new AccountWheelchairSearch();
            $dataProvider = $searchModel->findByUserId($_POST['expandRowKey']);
            return $this->renderPartial('_user_wheelchair', ['dataProvider'=>$dataProvider, 'model'=>$model]);
        } else {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }
    /**
     * Lists all AccountWheelchair models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AccountWheelchairSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccountWheelchair model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the AccountWheelchair model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AccountWheelchair the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccountWheelchair::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
