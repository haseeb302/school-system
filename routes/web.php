<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/**
 * ROUTES: SUPER ADMIN CONTROLS SCHOOL AND ADMIN
 */
Route::get('/super-admin', 'SchoolController@index')->name('super-admin.index');
Route::post('/super-admin/store', 'SchoolController@store')->name('super-admin.store');
Route::get('/super-admin/{id}/edit', 'SchoolController@edit')->name('super-admin.edit');

Route::get('/super-admin/{id}/edit-admin', 'AdminController@edit')->name('super-admin.editAdmin');
Route::patch('/super-admin/{id}/update-admin', 'AdminController@update')->name('super-admin.updateAdmin');

Route::patch('/super-admin/{id}/update', 'SchoolController@update')->name('super-admin.update');
Route::delete('/super-admin/{id}', 'SchoolController@destroy')->name('super-admin.destroy');

/**
 *  ROUTES: ADMIN CONTROLS TEACHER
 */
Route::get('/admin/teacher', 'TeacherController@index')->name('admin.teacher.index')->middleware(['auth','admin']);;
Route::post('/admin/teacher', 'TeacherController@store')->name('admin.teacher.store')->middleware(['auth','admin']);;
Route::get('/admin/teacher/{id}/edit', 'TeacherController@edit')->name('admin.teacher.edit')->middleware(['auth','admin']);;
Route::patch('/admin/teacher/{id}/update', 'TeacherController@update')->name('admin.teacher.update')->middleware(['auth','admin']);;
Route::delete('/admin/teacher/{id}', 'TeacherController@destroy')->name('admin.teacher.destroy')->middleware(['auth','admin']);;

/**
 *  ROUTES: ADMIN CONTROLS STUDENTS
 */
Route::get('/admin/student', 'StudentController@index')->name('admin.student.index')->middleware(['auth','admin']);
Route::post('/admin/student', 'StudentController@store')->name('admin.student.store')->middleware(['auth','admin']);;
Route::get('/admin/student/{id}/edit', 'StudentController@edit')->name('admin.student.edit')->middleware(['auth','admin']);;
Route::patch('/admin/student/{id}', 'StudentController@update')->name('admin.student.update')->middleware(['auth','admin']);;
Route::delete('/admin/student/{id}', 'StudentController@destroy')->name('admin.student.destroy')->middleware(['auth','admin']);;

/**
 * ROUTES: TEACHER CONTROLLER
 */
Route::get('/teacher', 'TeacherController@profile')->name('teacher.profile')->middleware(['auth','teacher']);

/**
 * * ROUTES: STUDENTS CONTROLLER
 */
Route::get('/student', 'StudentController@profile')->name('student.profile')->middleware(['auth','student']);

/**
 * ROUTE: PASSWORD CONTROLLER
 */
Route::get('/edit-password', 'PasswordController@edit')->name('edit-password')->middleware('auth');
Route::patch('/update-password', 'PasswordController@update')->name('update-password')->middleware('auth');

/**
 * ROUTE: Image CONTROLLER
 */
Route::patch('/update-image', 'ImageController@update')->name('update-image')->middleware('auth');
