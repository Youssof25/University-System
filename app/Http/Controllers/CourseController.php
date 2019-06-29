<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $course = new Course();
        $data = $this->validate($request, [
            'id'=>'required',
            'name'=>'required',
            'description'=>'required'
        ]);

        $course->saveCourse($data);
        return redirect('/home')->with('success', 'New support Course has been created! Wait sometime to get resolved');
    }

    public function index()
    {
        $courses = Course::all();

        return view('course.index',compact('courses'));
    }

    public function edit($id)
    {
        $courses = Course::all()
            ->where('id', $id)
            ->first();

        return view('course.edit', compact('courses', 'id'));
    }

    public function update(Request $request, $id)
    {
        $course = new Course();
        $data = $this->validate($request, [
            'id'=>'required',
            'description'=>'required',
            'name'=>'required'
        ]);
        $data['id'] = $id;
        $course->updateCourse($data);

        return redirect('/home')->with('success', 'New support course has been updated!!');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/home')->with('success', 'Course has been deleted!!');
    }
}
