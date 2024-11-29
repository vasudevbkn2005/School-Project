<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamNameController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TypeController;
use App\Models\ExamName;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('teacher', TeacherController::class);

    // Subject
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'delete'])->name('subject.destroy');

    // Classes
    Route::get('/classes/{classes}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{classes}', [ClassesController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{classes}', [ClassesController::class, 'destroy']);
    Route::resource('classes', ClassesController::class);
    Route::get('/classes/{id}/sections', [ClassesController::class, 'getSections'])->name('classes.sections');


    // Student
    Route::resource('student', StudentController::class);

    // Exam
    Route::resource('exam', ExamController::class);

    // Type
    Route::resource('type', TypeController::class);

    // Name
    Route::resource('ExamName', ExamNameController::class);

});


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth'])->group(function () {
// Route::get('/admin', function () {
//     return view('admin.index');
// // });

// Teacher

// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth', 'is_admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index']);
//     // Route::resource('students', StudentController::class); // Manage students
//     Route::resource('teacher', TeacherController::class); // Manage teachers
//     // Route::resource('fees', FeeController::class); // Manage fees
//     // other admin routes
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
