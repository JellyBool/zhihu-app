<?php
namespace App;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class MessageCollection
 * @package App
 */
class MessageCollection extends Collection
{
    /**
     *
     */
    public function markAsRead()
    {
        $this->each(function($message) {
            if($message->to_user_id === user()->id ){
                $message->markAsRead();
            }
        });
    }
}