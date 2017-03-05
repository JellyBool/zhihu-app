<?php
namespace app\Repositories;

use Request;
use App\Topic;

class TopicRepository
{
    public function getTopicsForTagging(Request $request)
    {
        return Topic::select(['id','name'])
            ->where('name','like','%'.$request->query('q').'%')
            ->get();
    }
}