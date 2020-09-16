<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExamQuestionAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'question_id', 'exam_id', 'option_id', 'selected_option'
    ];

    /**
     * Get the user that belongs to UserExamQuestionAnswer
     */
    public function user()
    {
        return $this->belongTo('App\User');
    }

    /**
     * Get the exam that belongs to UserExamQuestionAnswer
     */
    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

    /**
     * Get the question that belongs to UserExamQuestionAnswer
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
