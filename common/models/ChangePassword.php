<?php 
    namespace common\models;
    
    use Yii;
    use yii\base\Model;
    
    class ChangePassword extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
        
        public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
				[['newpass'],'string','min'=>6],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
      
        public function findPasswords($attribute, $params){
            $user = Customer::find()
					->where(['idcustomer'=>Yii::$app->user->identity->idcustomer])
					->one();
            $password = $user->password_hash;
            if(Yii::$app->security->validatePassword($this->oldpass, $password) != $this->oldpass){
                $this->addError($attribute,'Current password is incorrect');
			}
        }
        
        public function attributeLabels(){
            return [
                'oldpass'=>'Current Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Confirm Password',
            ];
        }
    }