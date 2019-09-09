<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    protected $fillable = ['student_id', 'question_id', 'worksheet_id', 'answer_value', 'grade'];
    protected static function boot() {
        parent::boot();

        static::saving(function($model){
            
                $model->grade = $model->getGrade($model);
        });
        static::creating(function($model){
            if (!isset($model->grade)){
                $model->grade = $model->getGrade($model);
            }
        });
    }
    public function getGrade($model){
        $question = Question::find($model->question_id);
        if (!$question)
            abort(400, 'Error: Missing Question Data');
        if (round($question->answer) == round($model->answer_value)){
            $grade = 'correct';
        } else {
            $grade = 'incorrect';
        }
        return $grade;
    }
    public function student(){
        return $this->belongsTo('App\Student');
    }
    public function worksheet(){
        return $this->belongsTo('App\Worksheet');
    }
    public function question(){
        return $this->belongsTo('App\Question');
    }
}
