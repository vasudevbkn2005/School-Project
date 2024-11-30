<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Fees;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('Admin.index');
    }

    public function dashboard()
    {
        return view('Admin.index', [
            'totalStudents' => Student::count(),
            'totalTeachers' => Teacher::count(),
            'totalClasses' => Classes::count(),
            'pendingFees' => Fees::where('status', 'pending')->sum('fees'),
            'recentActivities' => [
                ['description' => 'New student enrolled: John Doe', 'time' => '2 hours ago'],
                ['description' => 'Fee payment received from Jane Smith', 'time' => '1 day ago'],
                ['description' => 'Class 10A schedule updated', 'time' => '3 days ago'],
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
