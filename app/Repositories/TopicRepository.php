<?php
namespace app\Repositories;

use Request;
use App\Topic;

/**
 * Class TopicRepository
 * @package app\Repositories
 */
class TopicRepository
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getTopicsForTagging(Request $request)
    {
        return Topic::select(['id','name'])
            ->where('name','like','%'.$request->query('q').'%')
            ->get();
    }
}