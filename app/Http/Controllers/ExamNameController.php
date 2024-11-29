<?php

namespace App\Http\Controllers;

use App\Models\ExamName;
use Illuminate\Http\Request;

class ExamNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examNames = ExamName::all();
        return view('Examname.index', compact('examNames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Examname.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExamName::create($request->only(['name']));

        return redirect()->route('ExamName.index')->with('success', 'Exam added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamName $examName)
    {
        // Optional: Add logic to display a single exam name if needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamName $examName, $id)
    {
        $examName = ExamName::findOrFail($id); // ID ke basis par record fetch karein
        return view('Examname.edit', compact('examName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the record by ID
        $examName = ExamName::findOrFail($id);

        // Update the record
        $examName->update([
            'name' => $request->name,
        ]);

        // Redirect back with success message
        return redirect()->route('ExamName.index')->with('success', 'Exam name updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $examName = ExamName::findOrFail($id); // ID ke basis par record fetch karein
        $examName->delete(); // Record delete karein

        return redirect()->route('ExamName.index')->with('success', 'Exam deleted successfully!');
    }
}
