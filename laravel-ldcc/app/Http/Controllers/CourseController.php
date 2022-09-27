<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $data = Course::get();
        return view('course.index',[
            'data' => $data
        ]);
    }


    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        // Cach viet theo OOP
        $object = new Course();
        $object -> fill($request -> except(['_token']));
        $object -> name = $request ->get('name');
        $object -> save();
        // Dieu huong ve trang chu
        return redirect() -> route('course.index');

        // Cach viet theo Query Bulder
//        Course::create($request -> except('_token'))
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }


    public function edit(Course $course)
    {
        return view('course.edit',[
            'course' => $course,
        ]);
    }


    public function update(Request $request, Course $course)
    {
//        dd($course -> name);
        // Cach 1
       /* Course::where('id', $course -> id) -> update (
          $request -> except([
              '_token',
              '_method',
          ])
        );*/

        // cach 2
        $course -> update(
          $request -> except([
              '_token',
              '_method',
          ])
        );
        return redirect() -> route('courses.index');

    }

// ham destroy bien thuoc tinh thanh doi tuong , kiem tra xem doi tuong do con ton tai hay khong
    public function destroy(Course $course)
    {
        //dd($course);
        // Query builder tức là nó sẽ tự sinh ra câu SQL theo kiểu dạng delete
        //Course::destroy($course);
        //Course::destroy($course -> id);
        $course -> delete();
        return redirect() -> route('courses.index');
    }
}
