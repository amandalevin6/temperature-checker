<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['name', 'unit_of_measure', 'worksheet_id', 'input_temperature', 'answer'];

    protected static function boot() {
        parent::boot();

        static::saving(function($model){
            if (!isset($model->answer)){
                $model->answer = $model->getAnswer($model);
            }
        });
        static::creating(function($model){
            if (!isset($model->answer)){
                $model->answer = $model->getAnswer($model);
            }
        });
    }
    public function getAnswer($model)
    {
       $input_temperature = trim(preg_replace('/\s+/', ' ',$model->input_temperature));
       $unit_of_measure = trim(ucfirst($model->unit_of_measure));
       $conversions = config('temperature_conversions');
       
       $input_array = explode(' ', $input_temperature);
       if (count($input_array) !== 2)
            abort(400, "Error: Invalid Input Temperature.");
        
       $input_number = $input_array[0];
       $input_measure = ucfirst($input_array[1]);

       
       if (!isset($conversions[$input_measure]))
            abort(400, "Error: Invalid Input Temperature.");
        
       if (!isset($conversions[$input_measure][$unit_of_measure]))
            abort(400, "Error: Invalid Unit of Measure / Conversion Method Not Set");
       $config_function = $conversions[$input_measure][$unit_of_measure];
       $conversion = "return \$calculated_answer = ".str_replace('{input}', $input_number, $config_function).";";
       
       $answer = eval($conversion);
       return $answer;
       
    }
}
