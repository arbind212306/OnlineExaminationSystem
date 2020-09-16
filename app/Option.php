<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    const OPTION = [
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'D'
    ];
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'option_title', 'option_number'
    ];

    /**
     * Get the question that owns the option
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
