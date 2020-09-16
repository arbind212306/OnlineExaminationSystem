<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'exam_id', 'valid_option', 'valid_mark', 'wrong_mark'
    ];

    /**
     * Get the options that own the question
     */
    public function options()
    {
        return $this->hasMany('App\Option');
    }

    /**
     * Get the user answer to the question
     */
    public function user_exam_question_answer()
    {
        return $this->hasMany('App\UserExamQuestionAnswer');
    }

    /**
     * Get the exam that owns the question
     */
    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

}
