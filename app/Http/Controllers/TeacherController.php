<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subject = Subject::all();
        return view('teacher.create',compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $info = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required',
            'email' => 'required',  // Ensure category ID exists
            'phone' => 'required|numeric',
            'qualification' => 'nullable|string',
            'subject_id'=> 'required'
        ]);
        // dd($info);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        } else {
            return back()->withErrors(['image' => 'Image upload failed.']);
        }

        // Create the product with the data
        $teacher = Teacher::create([
            'name' => $request->name,
            'image' => $imagePath,
            'email' => $request->email,  // Use category ID, not name
            'phone' => $request->phone,
            'qualification' => $request->qualification,
            'subject_id' => $request->subject_id,
        ]);
        return redirect()->route('teacher.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $subject = Subject::all();
        return view('teacher.edit', compact('teacher','subject')); // Use the injected $teacher instance
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id, // Ensure email is unique except for the current teacher
            'phone' => 'nullable|string|max:15',
            'qualification' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048', // Validate image if provided
            'subject_id' => 'required|exists:subjects,id', // Ensure the subject exists
        ]);

        // Update the teacher details
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->qualification = $request->qualification;
        $teacher->subject_id = $request->subject_id;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Store the new image and update the path in the database
            $path = $request->file('image')->store('images', 'public');
            $teacher->image = $path;
        }

        // Save the teacher object
        $teacher->save();

        // Redirect with a success message
        // return redirect()->route('teachers.index')->with('success', 'Teacher details updated successfully!');


        // Redirect to the teacher index page after successful update
        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        // Check if the teacher has an image, and if so, delete it from storage
        if ($teacher->image && Storage::exists('public/' . $teacher->image)) {
            Storage::delete('public/' . $teacher->image);
        }

        // Delete the teacher record from the database
        $teacher->delete();

        // Redirect to the teacher index page with a success message
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully!');
    }

}
