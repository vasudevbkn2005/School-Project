<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::with('sections')->get(); // Load classes with their sections
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());
        $info = $request->validate([
            'name' => 'required|string|max:255',
            'sections' => 'required|array',
            'sections.*' => 'required|string|max:255',
        ]);

        // Create the class
        $classes = Classes::create([
            'name' => $request->name,
        ]);

        foreach ($request->sections as $sectionName) {
            Section::create([
                'name' => $sectionName,
                'class_id' => $classes->id,
            ]);
        }
        return redirect()->route('classes.index')->with('success', 'Class and sections added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Classes $classes)
    {
        // Fetch the sections for the specific class
        $sections = $classes->sections;  // Assuming 'sections' is the relationship method

        return view('classes.edit', compact('classes', 'sections'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'existing_sections' => 'nullable|array',
            'existing_sections.*.id' => 'exists:sections,id',
            'existing_sections.*.name' => 'required|string|max:255',
            'new_sections' => 'nullable|array',
            'new_sections.*' => 'required|string|max:255',
            'removed_sections' => 'nullable|string', // IDs of sections to be removed
        ]);

        // Update class name
        $classes->update(['name' => $request->name]);

        // Update existing sections
        if ($request->filled('existing_sections')) {
            foreach ($request->existing_sections as $sectionData) {
                $section = Section::find($sectionData['id']);
                if ($section) {
                    $section->update(['name' => $sectionData['name']]);
                }
            }
        }

        // Add new sections
        if ($request->filled('new_sections')) {
            foreach ($request->new_sections as $newSectionName) {
                $classes->sections()->create(['name' => $newSectionName]);
            }
        }

        // Remove sections
        if ($request->filled('removed_sections')) {
            $removedSectionIds = explode(',', $request->removed_sections);
            Section::whereIn('id', $removedSectionIds)->delete();
        }

        // Redirect to the index page with a success message
        return redirect()->route('classes.index')->with('success', 'Class updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();
        // Redirect to the index page with a success message
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully!');
    }
}
