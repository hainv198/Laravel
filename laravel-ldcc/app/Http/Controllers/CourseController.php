<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DestroyRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(Request $request)
    {

        $search = $request -> get('q');
        $data = Course:: query() -> where('name', 'like','%' . $search .'%')  -> paginate(2);
        $data->appends(['q' => $search]);
//        $data = Course::query() -> get();
        return view('course.index',[
            'data' => $data,
            'search' => $search,
        ]);
    }


    public function create()
    {
        return view('course.create');
    }

    public function store(StoreRequest $request)
    {

        // Cach viet theo OOP
        /*$object = new Course();
        $object -> fill($request -> except(['_token']));
        $object -> name = $request ->get('name');
        $object -> save();*/

//         Cach viet theo Query Bulder
        Course::query() -> create($request -> except('_token'));

        //Kiem tra validate luon
//        Course::query() -> create($request -> validate());

        // Dieu huong ve trang chu
        return redirect() -> route('courses.index');

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


    public function update(UpdateRequest $request, Course $course)
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
        /*$course -> update(
          $request -> except([
              '_token',
              '_method',
          ])
        );*/
        //update theo OOP
       $course -> fill($request -> except('_token'));
       $course -> save();
        return redirect() -> route('courses.index');



    }

// ham destroy bien thuoc tinh thanh doi tuong , kiem tra xem doi tuong do con ton tai hay khong
    public function destroy(DestroyRequest $request,Course $course)
    {
        //dd($course);
        // Query builder tức là nó sẽ tự sinh ra câu SQL theo kiểu dạng delete
        //Course::destroy($course);
        //Course::destroy($course -> id);
        $course -> delete();
        return redirect() -> route('courses.index');
    }
}
