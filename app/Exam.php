<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'exam_date'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'admin_id', 'exam_date', 'exam_duration', 'total_question',
        'status', 'exam_code'
    ];

    /**
     * Get the admin that owns the exam
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    /**
     * users that belongs to exam
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_exam_enroll', 'exam_id', 'user_id')
                    ->withPivot('attendance_status', 'status')
                    ->withTimestamps();
    }

    /**
     * Get the user answer to the exam
     */
    public function user_exam_question_answer()
    {
        return $this->hasMany('App\UserExamQuestionAnswer');
    }

    /**
     * Get the exam's duration.
     *
     * @param  string  $value
     * @return string
     */
    public function getExamDuration($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

     /**
     * Get the user answer to the exam
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
