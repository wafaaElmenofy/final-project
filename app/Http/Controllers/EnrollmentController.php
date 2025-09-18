<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{
    // Dashboard for student
    public function dashboard()
    {
        $user_id = Session::get('user_id');
        $user = User::find($user_id);

        // dd($user_id, $user);

        if (!$user) {
            return redirect('/login')->with('error', 'يجب تسجيل الدخول أولاً.');
        }

        if ($user->role === 'student') {
            $enrollments = Enrollment::where('user_id', $user_id)->get();
            $courses = [];
            foreach ($enrollments as $enrollment) {
                $course = Course::find($enrollment->course_id);
                if ($course) $courses[] = $course;
            }

            $suggestedCourses = Course::whereNotIn('id', array_column($courses, 'id'))->get();

            return view('dashboard', [
                'role' => 'student',
                'user' => $user,
                'courses' => $courses,
                'suggestedCourses' => $suggestedCourses
            ]);
        }

        if ($user->role === 'instructor') {

            $mycourses = $user->createdCourses;
            return view('dashboard', [
                'role' => 'instructor',
                'user' => $user,
                'mycourses' => $mycourses,
            ]);
        }

        if ($user->role === 'admin') {
            return view('dashboard', [
                'role' => 'admin',
                'user' => $user,
            ]);
        }

        return redirect('/login')->with('error', 'غير مصرح بالدخول.');
    }


    // Show all courses
    public function index()
    {
        $courses = Course::with('instructor', 'students')->get();
        $user_id = Session::get('user_id');
        $user = $user_id ? User::find($user_id) : null;

        return view('enrollments.index', compact('courses', 'user'));
    }

    // Enroll student in course
    public function enroll($course_id)
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            Session::put('intended_course', $course_id);
            return redirect('/login')->with('error', 'You must be logged in to enroll.');
        }

        $course = Course::find($course_id);
        if (!$course) return redirect()->back()->with('error', 'The course does not exist');

        $alreadyEnrolled = Enrollment::where('user_id', $user_id)
                                     ->where('course_id', $course_id)
                                     ->exists();

        if ($alreadyEnrolled) return redirect()->back()->with('error', 'Already enrolled');

        Enrollment::create(['user_id'=>$user_id,'course_id'=>$course_id]);
        return redirect('/dashboard')->with('success', 'Registered successfully.');
    }

    // Unenroll student from course
    public function unenroll($course_id)
    {
        $user_id = Session::get('user_id');

        if (!$user_id) return redirect('/login')->with('error', 'You must be logged in.');

        $enrollment = Enrollment::where('user_id',$user_id)->where('course_id',$course_id)->first();
        if ($enrollment) {
            $enrollment->delete();
            return redirect()->back()->with('success','Course registration canceled.');
        }

        return redirect()->back()->with('error','You are not enrolled in this course');
    }

    // Show student's courses
    public function myCourses()
    {
        $user_id = Session::get('user_id');
        if (!$user_id) return redirect('/login')->with('error','You must be logged in');

        $enrollments = Enrollment::where('user_id',$user_id)->get();
        $courses = [];
        foreach ($enrollments as $enrollment) {
            $course = Course::find($enrollment->course_id);
            if ($course) $courses[] = $course;
        }

        return view('enrollments.my', compact('courses'));
    }

    // Show students of a specific course (for instructor)
    public function students($course_id)
    {
        $course = Course::with('students')->find($course_id);
        if (!$course) return redirect()->back()->with('error','Course not found');

        return view('enrollments.students', compact('course'));
    }
}
