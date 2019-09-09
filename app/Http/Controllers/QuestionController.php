<?php

namespace App\Http\Controllers;
use App\Question;
use App\Worksheet;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return Question::all();
    }
    public function show($id)
    {
        return Question::find($id);
    }
    public function store(Request $request)
    {
                
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'worksheet_id' => 'required_without:worksheet_name',
            'worksheet_name' => 'required_without:worksheet_id',
            'input_temperature' => 'required',
            'unit_of_measure' => 'required',
        ]);
        if (!isset($request->worksheet_id) && isset($request->worksheet_name)){
            $worksheet = Worksheet::firstOrCreate(array('name' => $request->worksheet_name));
            //dd($worksheet_id);
            $request->merge(["worksheet_id" => $worksheet->id]);
        }
        
        return Question::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return $question;
    }
    public function delete(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return 204;
    }
}
