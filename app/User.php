<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * User genders
     * @var array
     */
    public const GENDER = ['male', 'female', 'transgender'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * users that belongs to exam
     */
    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'user_exam_enroll', 'user_id', 'exam_id')
                    ->withPivot('attendance_status', 'status')
                    ->withTimestamps();
    }
}
