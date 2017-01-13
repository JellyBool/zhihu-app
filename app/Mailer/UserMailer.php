<?php
namespace app\Mailer;

use Auth;

class UserMailer extends Mailer
{
    public function followNotifyEmail($email)
    {
        $data = [ 'url' => 'http://zhihu.dev' , 'name' => Auth::guard('api')->user()->name];

        $this->sendTo('zhihu_app_new_user_follow', $email, $data);
    }

    public function passwordReset($email,$token)
    {
        $data = [ 'url' => url('password/reset', $token) ];

        $this->sendTo('zhihu_app_password_reset', $email, $data);
    }

    public function welcome(User $user)
    {
        $data = [
            'url' => route('email.verify',['token' => $user->confirmation_token]),
            'name' => $user->name
        ];

        $this->sendTo('zhihu_app_register',$user->email,$data);
    }
}