<?php 
namespace app\components;
use Yii;

Class User extends \yii\web\User{

   public function afterLogin($identity, $cookieBased, $duration)
   {
        parent::afterLogin($identity, $cookieBased, $duration);
        $session = Yii::$app->session;
        $users = \dektrium\user\models\User::find()->all();
        foreach ($users as $key => $user) {}
        $session->set('user_id', $user->id);
   }
}
