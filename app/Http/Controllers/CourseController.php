<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    // Show instructor dashboard with courses
    public function index()
    {
        $user_id = session('user_id');
        $user = User::find($user_id);

        if (!$user) return redirect('/login')->with('error', 'You must be logged in.');

        $mycourses = Course::where('instructor_id', $user_id)->get();

        return view('dashboard', [
            'role' => 'instructor',
            'user' => $user,
            'mycourses' => $mycourses
        ]);
    }

    // Show form to create a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store a new course
    public function store(Request $request)
    {
        $user_id = session('user_id');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'max_students' => 'required|integer',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'max_students' => $request->max_students,
            'instructor_id' => $user_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Course created successfully!');
    }

    // Edit course
    public function edit(Course $course)
    {
        $this->authorizeCourse($course);
        return view('courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $this->authorizeCourse($course);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'max_students' => 'required|integer',
        ]);

        $course->update($request->only(['title','description','start_date','max_students']));
        return redirect()->route('dashboard')->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $this->authorizeCourse($course);
        $course->delete();
        return redirect()->route('dashboard')->with('success', 'Course deleted successfully!');
    }

    // Ensure instructor owns the course
    private function authorizeCourse(Course $course)
    {
        $user_id = session('user_id');
        if ($course->instructor_id != $user_id) abort(403, 'Not allowed');
    }
}
