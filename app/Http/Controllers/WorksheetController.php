<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worksheet;

class WorksheetController extends Controller
{
    public function index()
    {
        return Worksheet::all();
    }
    public function show($id)
    {
        return Worksheet::find($id);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        return Worksheet::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $worksheet = Worksheet::findOrFail($id);
        $worksheet->update($request->all());

        return $worksheet;
    }
    public function delete(Request $request, $id)
    {
        $worksheet = Worksheet::findOrFail($id);
        $worksheet->delete();

        return 204;
    }
}
