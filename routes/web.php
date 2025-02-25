<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// define a new route
// define a controller
//define a view contain posts
//remove any staric html data from the view
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::delete('posts/{post}', [PostController::class, 'destory'])->name('posts.destory');

//--------------------------------------------------------------------------------------------
// Students
Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('students', [StudentController::class, 'store'])->name('students.store');
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::delete('students/{student}', [StudentController::class, 'destory'])->name('students.destory');
//----------------------------------------------------------------------------------------
// Teachers
Route::controller(TeacherController::class)
    ->prefix('teachers')
    ->group(function () {
        Route::get('/', 'index')->name('teachers.index');
        Route::get('create', 'create')->name('teachers.create');
        Route::post('/', 'store')->name('teachers.store');
        Route::get('{teacher}/edit', 'edit')->name('teachers.edit');
        Route::put('{teacher}', 'update')->name('teachers.update');
        Route::get('{teacher}', 'show')->name('teachers.show');
        Route::delete('{teacher}', 'destroy')->name('teachers.destroy');
    });
//----------------------------------------------------------------------------------------

// Courses
Route::controller(CourseController::class)
    ->prefix('courses')
    ->group(function () {
        Route::get('/', 'index')->name('courses.index');
        Route::get('create', 'create')->name('courses.create');
        Route::post('/', 'store')->name('courses.store');
        Route::get('{course}/edit', 'edit')->name('courses.edit');
        Route::put('{course}', 'update')->name('courses.update');
        Route::get('{course}', 'show')->name('courses.show');
        Route::delete('{course}', 'destroy')->name('courses.destroy');
    });
//----------------------------------------------------------------------------------------
// Batches
Route::controller(BatchController::class)
    ->prefix('batches')
    ->group(function () {
        Route::get('/', 'index')->name('batches.index');
        Route::get('create', 'create')->name('batches.create');
        Route::post('/', 'store')->name('batches.store');
        Route::get('{batch}/edit', 'edit')->name('batches.edit');
        Route::get('{batch}', 'show')->name('batches.show');
        Route::put('{batch}', 'update')->name('batches.update');
        Route::delete('{batch}', 'destroy')->name('batches.destroy');
    });
//----------------------------------------------------------------------------------------
// Enrollments

Route::controller(EnrollmentController::class)
    ->prefix('enrollments')
    ->group(function () {
        Route::get('/', 'index')->name('enrollments.index');
        Route::get('create', 'create')->name('enrollments.create');
        Route::post('/', 'store')->name('enrollments.store');
        Route::get('{enrollment}/edit', 'edit')->name('enrollments.edit');
        Route::get('{enrollment}', 'show')->name('enrollments.show');
        Route::put('{enrollment}', 'update')->name('enrollments.update');
        Route::delete('{enrollment}', 'destroy')->name('enrollments.destroy');
    });
// Payments
Route::controller(PaymentController::class)
    ->prefix('payments')
    ->group(function () {
        Route::get('/', 'index')->name('payments.index');
        Route::get('create', 'create')->name('payments.create');
        Route::post('/', 'store')->name('payments.store');
        Route::get('{payment}/edit', 'edit')->name('payments.edit');
        Route::get('{payment}', 'show')->name('payments.show');
        Route::put('{payment}', 'update')->name('payments.update');
        Route::delete('{payment}', 'destroy')->name('payments.destroy');
    });
// Report
Route::get('report/report1/{paymentid}', [ReportController::class, 'report1'])->name('report.report1');
