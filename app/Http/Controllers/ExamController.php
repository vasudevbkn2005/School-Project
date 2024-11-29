<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamName;
use App\Models\Subject;
use App\Models\Type;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::with(['name', 'type', 'class'])->get();
        return view('Exam.index', compact('exams'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $examNames = ExamName::all(); // Fetch all exam names
        $examTypes = Type::all(); // Fetch all exam types
        $classes = Classes::all(); // Fetch all classes

        return view('exam.create', compact('examNames', 'examTypes', 'classes'));
    }
    
    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        // dd($request);
        $request->validate([
            'exam_name_id' => 'required|exists:exam_names,id', // Ensure exam_name_id exists in exam_names table
            'type_id' => 'required|exists:types,id',  // Ensure the type_id exists in the exam_types table
            'start_date' => 'required|date|before:end_date', // Ensure start_date is before end_date
            'end_date' => 'required|date|after:start_date',  // Ensure end_date is after start_date
            'class_id' => 'required|exists:classes,id', // Ensure class_id exists in classes table
            'description' => 'nullable|string', // Optional description
        ]);

        // Store the exam, ensuring we are only saving valid data
        Exam::create([
            'exam_name_id' => $request->exam_name_id,  // The foreign key for the exam name
            'type_id' => $request->type_id,  // The foreign key for the exam type
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'class_id' => $request->class_id,
            'description' => $request->description,  // Optional field
        ]);

        // Redirect back to the exam index page with a success message
        return redirect()->route('exam.index')->with('success', 'Exam added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $examNames = ExamName::all(); // Fetch all exam names
        $examTypes = Type::all(); 
        $classes = Classes::all(); // Replace 'ClassModel' with your actual model name for classes
        return view('exam.edit', compact('exam', 'classes','examNames','examTypes'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        // Validate the request data
        $request->validate([
            'exam_name_id' => 'required|exists:exam_names,id',
            'type_id' => 'required|exists:types,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'class_id' => 'required|exists:classes,id',
            'description' => 'nullable|string|max:255',
        ]);

        // Update the exam with the validated data
        $exam->update([
            'exam_name_id' => $request->exam_name_id,
            'type_id' => $request->type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'class_id' => $request->class_id,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->route('exam.index')->with('success', 'Exam updated successfully!');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exam.index')->with('success', 'Exam deleted successfully!');
    }
}
