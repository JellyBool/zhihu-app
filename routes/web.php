<?php


Route::get('/','QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('email/verify/{token}',['as' => 'email.verify', 'uses' => 'EmailController@verify']);

Route::resource('questions','QuestionsController',['names' => [
    'create' => 'question.create',
    'show' => 'question.show',
]]);

Route::post('questions/{question}/answer','AnswersController@store');

Route::get('question/{question}/follow','QuestionFollowController@follow');


Route::get('test',function(){
   $followed =  Auth::user()->follows()->toggle(3);
   dd($followed);
});
