<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Fees;
use App\Models\Student;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes=Classes::all();
        $fees = Fees::all();
        return view('fees.index', compact('fees','classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $classes = Classes::all();
        return view('fees.create', compact('students', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $info = $request->validate([
            'class_id' => 'required|exists:classes,id', // Ensure class exists
            'total_amount' => 'required|numeric|min:0', // Total amount must be a positive number
            'discount' => 'nullable|numeric|min:0|max:100', // Discount should be between 0 and 100 (percentage)
            'due_date' => 'required|date|after:today', // Ensure due date is in the future
            'description' => 'nullable|string|max:255', // Optional description
        ]);

        // Calculate the discount amount (if provided)
        // Calculate the discount amount (if provided)
        $discountAmount = 0;

        if ($request->discount) {
            $discountAmount = ($request->total_amount * $request->discount) / 100;
        }

        // Calculate the final amount after discount
        $finalAmount = $request->total_amount - $discountAmount;

        // Calculate due fees (Assuming no payment has been made yet)
        $dueFees = $finalAmount;

        // Create the fee record
        Fees::create([
            'class_id' => $request->class_id,
            'total_amount' => $request->total_amount,
            'discount' => $discountAmount, // Store the discount amount
            'fee_date' => now(), // Set the fee date to the current timestamp
            'due_date' => $request->due_date, // This must be a valid date
            'due_fees' => $dueFees, // Store the calculated due fees
            'description' => $request->description,
        ]);

        // Redirect back to the fees index page with a success message
        return redirect()->route('fees.index')->with('success', 'Fee added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fees $fees)
    {
        $fees->discount_percentage = $fees->total_amount > 0
            ? ($fees->discount / $fees->total_amount) * 100
            : 0;

        $classes = Classes::all();

        return view('fees.edit', compact('fees', 'classes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric|min:0|max:100', // Ensure discount is a percentage
            'due_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        // Find the fee record by ID
        $fees = Fees::findOrFail($id);

        // Calculate the discount amount
        $discountAmount = ($validatedData['total_amount'] * $validatedData['discount']) / 100;

        // Calculate due fees (final price minus discount amount)
        $dueFees = $validatedData['total_amount'] - $discountAmount;

        // Update the fee record (exclude final_price if it's auto-generated)
        $fees->update([
            'class_id' => $validatedData['class_id'],
            'total_amount' => $validatedData['total_amount'],
            'discount' => $validatedData['discount'], // Store as percentage
            'due_fees' => $dueFees,
            'due_date' => $validatedData['due_date'],
            'description' => $validatedData['description'],
        ]);

        // Redirect with a success message
        return redirect()->route('fees.index')->with('success', 'Fee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the fee record by ID
        $fees = Fees::findOrFail($id);

        // Delete the fee record
        $fees->delete();

        return redirect()->route('fees.index')->with('success', 'Fee deleted successfully!');
    }
    public function getFeesDetails($classId)
    {
        $fees = Fees::where('class_id', $classId)->first();

        if ($fees) {
            return response()->json([
                'success' => true,
                'fee' => [
                    'total_amount' => $fees->total_amount,
                    'discount' => $fees->discount,
                    'final_price' => $fees->final_price,
                    'due_date' => $fees->due_date
                ]
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Fees data not found.']);
        }
    }
}
