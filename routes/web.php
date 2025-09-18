<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
});

// Authentication Routes
Route::get('/login', [AutherController::class, 'showLogin'])->name('login');
Route::post('/login', [AutherController::class, 'login']);

Route::get('/register', [AutherController::class, 'showRegister'])->name('register');
Route::post('/register', [AutherController::class, 'register']);

// Logout
Route::get('/logout', [AutherController::class, 'logOut'])->name('logout');

// Courses & Enrollments
Route::get('/all-coursess', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::post('/courses/{course_id}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
Route::post('/courses/{course_id}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');
Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('courses.my');

// CRUD Courses
Route::resource('courses', CourseController::class);

// Dashboard
Route::get('/dashboard', [EnrollmentController::class, 'dashboard'])->name('dashboard');
Route::get('/courses/{id}/students', [EnrollmentController::class, 'students'])->name('courses.students');
