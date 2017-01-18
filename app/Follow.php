<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Follow
 * @package App
 */
class Follow extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_question';

    /**
     * @var array
     */
    protected $fillable = ['user_id','question_id'];
}
