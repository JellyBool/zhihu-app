<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Topic
 * @package App
 */
class Topic extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name','questions_count','bio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
