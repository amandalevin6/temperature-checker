<?php

namespace App\Http\Controllers;
use App\Answer;
use App\Student;
use App\Worksheet;
use App\Question;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        return Answer::all();
    }
    public function show($id)
    {
        return Answer::find($id);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'worksheet_id' => 'required_without:worksheet_name',
            'worksheet_name' => 'required_without:worksheet_id',
            'question_id' => 'required_without:question_name',
            'question_name' => 'required_without:worksheet_id',
            'input_temperature' => 'required_without_all:question_id,question_name',
            'unit_of_measure' => 'required_without_all:question_id,question_name',
            'student_id' => 'required_without:student_name,student_guid',
            'student_name' => 'required_without:student_id',
            'student_guid' => 'required_without:student_id',
            'answer_value' => 'required|numeric',
        ]);
        if (!isset($request->worksheet_id) && isset($request->worksheet_name)){
            $worksheet = Worksheet::firstOrCreate(array('name' => $request->worksheet_name));
            $request->merge(["worksheet_id" => $worksheet->id]);
        }
        if (!isset($request->student_id) && isset($request->student_name) && isset($request->student_guid)){
            $student = Student::firstOrCreate(array('name' => $request->student_name, 'guid' => $request->student_guid));
            $request->merge(["student_id" => $student->id]);
        }
        if (!isset($request->question_id) && isset($request->question_name)){
            $question = Question::firstOrCreate(array('worksheet_id' => $request->worksheet_id, 'name' => $request->question_name), array('worksheet_id' => $request->worksheet_id, 'name' => $request->question_name, 'input_temperature' => $request->input_temperature, 'unit_of_measure' => $request->unit_of_measure));
            
            $request->merge(["question_id" => $question->id]);
        }
        
        $answer = Answer::where(array('worksheet_id' => $request->worksheet_id, 'student_id' => $request->student_id, 'question_id' => $request->question_id), $request->all())->first();
        //dd($answer);
        if (!$answer){
            return Answer::create($request->all());
        } else {
            $answer->update($request->all());
            return $answer;
        }
    }
    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->update($request->all());

        return $answer;
    }
    public function delete(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return 204;
    }

}
