<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;

class AutherController extends Controller
{
    // Show register form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role'     => 'required|in:student,instructor',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect('/login')->with('success', 'Account created successfully! Please login.');
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user data in session
            Session::put('user_id', $user->id);
            Session::put('user_role', $user->role);

            return redirect('/dashboard');
        }

        // If invalid login
        return back()->withErrors(['login' => 'Invalid email or password'])->withInput();
    }

    // Handle logout
    public function logOut()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }

    // Display the user's dashboard based on their role
    public function dashboard()
    {
        $user_id = Session::get('user_id');
        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user = User::find($user_id);

        if ($user->role === 'student') {
            $courses = $user->enrolledCourses;
            return view('dashboard', [
                'role'    => 'student',
                'name'    => $user->name,
                'user'    => $user,
                'courses' => $courses,
            ]);
        } elseif ($user->role === 'instructor') {
            $mycourses = $user->createdCourses; 
            return view('dashboard', [
                'role'      => 'instructor',
                'name'      => $user->name,
                'user'      => $user,
                'mycourses' => $mycourses,
            ]);
        }
    }

    // Handle enrollment (student enrolls in a course)
    public function enroll(Request $request, $course_id)
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user   = User::find($user_id);
        $course = Course::findOrFail($course_id);

        // Prevent duplicate enrollment
        $already = Enrollment::where('user_id', $user->id)
                             ->where('course_id', $course->id)
                             ->first();
        if ($already) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        Enrollment::create([
            'user_id'   => $user->id,
            'course_id' => $course->id,
        ]);

        return back()->with('success', 'You have enrolled in the course successfully!');
    }

    // Handle unenrollment (student leaves a course)
    public function unenroll(Request $request, $course_id)
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user       = User::find($user_id);
        $enrollment = Enrollment::where('user_id', $user->id)
                                ->where('course_id', $course_id)
                                ->first();

        if (!$enrollment) {
            return back()->with('error', 'You are not enrolled in this course.');
        }

        $enrollment->delete();

        return back()->with('success', 'You have unenrolled from the course.');
    }
}
