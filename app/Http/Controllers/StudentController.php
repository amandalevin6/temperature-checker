<?php

namespace App\Http\Controllers;
use App\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }
    public function show($guid)
    {
        return Student::where('guid', $guid)->first();
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guid' => 'required|unique:students|max:255',
            'name' => 'required',
        ]);
        return Student::create($request->all());
    }
    public function update(Request $request, $guid)
    {
        $student = Student::where('guid', $guid)->first();
        if (!$student)
            return json_encode("Error: Student Not Found with the guid `".$guid."`");
        
        $student->update($request->all());

        return $student;
    }
    public function delete(Request $request, $guid)
    {
        $student = Student::where('guid', $guid)->first();
        $student->delete();

        return 204;
    }
}
