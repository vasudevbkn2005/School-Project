<?php

namespace App\Http\Controllers;


use App\Models\Classes;
use App\Models\Fees;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fees::all();
        $students = Student::all();
        $classes = Classes::all();
        $student = Student::all();
        return view('student.index',compact('student','students','classes','fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all(); // Fetch all classes
        $sections = Section::all(); // Fetch all sections
        return view('student.create', compact('classes', 'sections'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:students,email',
            'mobile' => 'required|numeric|digits_between:10,15',
            'dob' => 'required|string|',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'gender' => 'required|in:male,female,other',
            'enrollment_number' => 'required|string|unique:students,enrollment_number',
            'admission_date' => 'required|date',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('image', 'public');

        // Create the student record
        $student = Student::create([
            'name' => $validatedData['name'],
            'image' => $imagePath,
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'dob' => $validatedData['dob'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'enrollment_number' => $validatedData['enrollment_number'],
            'admission_date' => $validatedData['admission_date'],
            'class_id' => $validatedData['class_id'],
            'section_id' => $validatedData['section_id'],
        ]);

        // Redirect to the student index page with a success message
        return redirect()->route('student.index')->with('success', 'Student created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // Retrieve all classes
        $classes = Classes::all();
        $sections = Section::all();
        // Pass the correct variables to the view
        return view('student.edit', compact('student', 'classes','sections'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Image is optional during update
            'email' => 'required|email|unique:students,email,' . $student->id,  // Ignore unique check for current student's email
            'mobile' => 'required|numeric|digits_between:10,15',
            'dob' => 'nullable|date', // Date of birth is optional, but should be a valid date
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'gender' => 'required|in:male,female,other',
            'enrollment_number' => 'required|string|unique:students,enrollment_number,' . $student->id, // Ignore unique check for current student's enrollment number
            'admission_date' => 'required|date',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'nullable|exists:sections,id',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($student->image && \Illuminate\Support\Facades\Storage::exists('public/' . $student->image)) {
                \Illuminate\Support\Facades\Storage::delete('public/' . $student->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('image', 'public');
            $student->image = $imagePath; // Save the image path in the database
        }

        // Update the student record with the validated data
        $student->name = $request->input('name');
        $student->father_name = $request->input('father_name');
        $student->mother_name = $request->input('mother_name');
        $student->email = $request->input('email');
        $student->mobile = $request->input('mobile'); // Save the phone number
        $student->dob = $request->input('dob'); // Save the date of birth
        $student->address = $request->input('address'); // Save address
        $student->gender = $request->input('gender'); // Save gender
        $student->enrollment_number = $request->input('enrollment_number'); // Save enrollment number
        $student->admission_date = $request->input('admission_date'); // Save admission date
        $student->class_id = $request->input('class_id'); // Save class ID
        $student->section_id = $request->input('section_id'); // Save section ID

        // Save the updated student record
        $student->save();

        // Redirect to the student index page with a success message
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete the student's image if it exists in storage
        if ($student->image && \Illuminate\Support\Facades\Storage::exists('public/' . $student->image)) {
            \Illuminate\Support\Facades\Storage::delete('public/' . $student->image);
        }

        // Delete the student record from the database
        $student->delete();

        // Redirect to the student index page with a success message
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
