<?php
namespace App\Repositories;

use App\Topic;
use App\Question;

/**
 * Class QuestionRepository
 * @package App\Repositories
 */
class QuestionRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function byIdWithTopics($id)
    {
        return Question::where('id',$id)->with('topics')->first();
    }

    public function create(array $attributes)
    {
        return Question::create($attributes);
    }

    public function byId($id)
    {
        return Question::find($id);
    }

    public function getQuestionsFeed()
    {
        return Question::published()->latest('updated_at')->with('user')->get();
    }

    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if ( is_numeric($topic) ) {
                Topic::find($topic)->increment('questions_count');
                return (int) $topic;
            }
            $newTopic = Topic::create(['name' => $topic, 'questions_count' => 1]);

            return $newTopic->id;
        })->toArray();
    }
}