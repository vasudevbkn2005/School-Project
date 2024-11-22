<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Display a list of all subjects
    public function index()
    {
        $subject = Subject::all();
        return view('subject.index', compact('subject',));
    }

    // Show the form to create a new subject
    public function create()
    {
        return view('subject.create');
    }

    // Store a new subject in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new subject
        Subject::create([
            'name' => $request->name,
        ]);

        // Redirect back to the subject list with a success message
        return redirect()->route('subject.index')->with('success', 'Subject created successfully!');
    }

    // Show the form to edit an existing subject
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    // Update an existing subject in the database
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the subject and update its details
        $subject = Subject::findOrFail($id);
        $subject->update([
            'name' => $request->name,
        ]);

        // Redirect back with a success message
        return redirect()->route('subject.index')->with('success', 'Subject updated successfully!');
    }

    // Delete a subject
    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        // Redirect back with a success message
        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully!');
    }
}
