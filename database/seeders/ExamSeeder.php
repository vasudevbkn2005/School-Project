<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exam = \App\Models\Exam::create([
            'name' => 'Midterm Exam',
            'type' => 'Written',
            'start_date' => '2024-01-15',
            'end_date' => '2024-01-20',
            'class_id' => 20,
            'created_by' => 1,
            'description' => 'Midterm exam for Grade 10 students.'
        ]);

        $subjects = \App\Models\Subject::whereIn('id', [1, 2, 3])->get();
        $exam->subjects()->attach($subjects);
    }
}
