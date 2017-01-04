<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Naux\Mail\SendCloudTemplate;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function owns(Model $model)
    {
        return $this->id == $model->user_id;
    }

    public function follows()
    {
        return $this->belongsToMany(Question::class,'user_question')->withTimestamps();
    }

    public function followThis($question)
    {
        return $this->follows()->toggle($question);
    }

    public function followed($question)
    {
        return !! $this->follows()->where('question_id',$question)->count();
    }
    /**
     * send password reset email to user's email base on token.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $data = [ 'url' => url('password/reset', $token) ];
        $template = new SendCloudTemplate('zhihu_app_password_reset', $data);

        Mail::raw($template, function ($message) {
            $message->from('jb@laravist.com', 'Laravist');
            $message->to($this->email);
        });
    }
}
