<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Color;
use frontend\models\FontParagraph;
use frontend\models\FontTitle;
use frontend\models\Footer;
use frontend\models\Header;
use frontend\models\Navbar;
use frontend\models\Slider;
use frontend\models\Product;
use frontend\models\Customer;

use common\models\CustomerForm;

use frontend\models\InfoBox;
use frontend\models\BannerAds;
use frontend\models\BannerBottom;
use frontend\models\BannerRight;
use frontend\models\BannerSale;


use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		$product = Product::find()
				->joinWith(['mainCategory'])
				->joinWith(['subCategory'])
				->joinWith(['detailCategory'])
				->orderBy(['idproduk'=>SORT_DESC])
				->where(['discount'=>0])
				->Limit(10)
				->all();
		
		$sale = BannerSale::find()
				->all();
				
		$banner = BannerAds::find()
				->where(['flag'=>1])
				->all();
		
		$adsleft = BannerAds::find()
				->where(['flag'=>1])
				->all();
				
		
		$brand = Product::find()
				->joinWith('brand')
				->select('brand.idbrand')
				->distinct()
				->all();
		
		$icon = InfoBox::find()
				->all();
		
		$slider = Slider::find()
				->joinWith(['mainCategory'])
				->all();
		
		$tag = Product::find()
			  ->JoinWith('mainCategory')
			  ->select('main_category.idmain')
			  ->distinct()
			  ->all();
			  
			
					
        return $this->render('homepage',[
			'sale'=>$sale,
			'adsleft'=>$adsleft,
			'brand'=>$brand,
			'icon'=>$icon,
			'slider'=>$slider,
			'tag'=>$tag,
			'banner'=>$banner,
			'product'=>$product,
				
		]);
    }

    public function actionLogin()
    {
       
		if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new CustomerForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
			
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new Customer();
        if ($model->load(Yii::$app->request->post())) {
			$model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
			//var_dump($model->email."<br/>".$model->password_hash."<br/>".$model->generateAuthKey());
			$model->created_at = date('Ymd');
			$model->titles = $_POST['titles'];
			$model->status = 0;
			$model->is_guest = 0;
            $model->generateAuthKey();
			
            if($model->save()){
				return Yii::$app->getResponse()->redirect('success');
			}else{
				return Yii::$app->getResponse()->redirect('failed');
			}
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	public function actionMyaccount()
    {
        return $this->render('myaccount');
    }
	public function actionAccountinformation()
    {
        return $this->render('accountinformation');
    }

	
	
	

	
}
