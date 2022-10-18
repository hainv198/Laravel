<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
/*Route::get('courses',[CourseController::class,'index']) -> name('course.index');
Route::get('courses/create',[CourseController::class,'create']) -> name('course.create');
Route::post('courses/create',[CourseController::class,'store']) -> name('course.store');
Route::delete('destroy/{course}',[CourseController::class,'destroy']) -> name('course.destroy');
Route::get('courses/edit/{course}',[CourseController::class,'edit']) -> name('course.edit');
Route::put('courses/edit/{course}',[CourseController::class,'update']) -> name('course.update');*/

// goi gon cac route
Route::resource('courses',CourseController::class);
// template

Route::get('test',function () {
   return view('layout.master');
});

/*Route::group(['prefix' => 'courses', 'as' => 'course.'],function() {
    Route::get('/',[CourseController::class,'index']);
    Route::get('/create/',[CourseController::class,'create']) -> name('create');
    Route::get('/create/',[CourseController::class,'store']) -> name('store');
});*/

