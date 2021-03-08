<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    DB::insert('insert into students(name,birth_date,gpa,advisor) values(?,?,?,?)',["Sultan","2001 May 12","4","Akerke"]);
});

Route::get('/select', function () {
    $results=DB::select('select * from students where id = ?',[1]);
    foreach ($results as $students) {
  	echo $students->name;
  	echo "<br>";
  	echo $students->gpa;
  	echo "<br>";
  	echo $students->advisor;
    }
});

Route::get('/update', function () {
    $updated=DB::update('update students set gpa="3.4" where id=?',[1]);
    return $updated;
});




Route::get('/delete', function () {
    $deleted=DB::delete('delete from students where id=?',[2]);
    return $deleted;
});







Route::get('/insert2', function () {
    $student=new Student;
    $student->name='Marat';
    $student->birth_date='2000 May 9';
    $student->gpa='3';
    $student->advisor='Kalamkas';
    $student->save();
});

Route::get('/select2', function () {
    $students=Student::find(3);
    return $students->name;
});

Route::get('/update2', function () {
    $student=Student::find(3);
    $student->gpa='2';
    $student->save();
});

Route::get('/delete2', function () {
    $student=Student::find(3);
    $student->delete();
});









