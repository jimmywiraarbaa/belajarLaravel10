<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;
use Faker\Factory as Faker;

class StudentController extends Controller
{
    public function index(){
        $students = Student::paginate(2);
        return view ('index',['students' => $students]);
    }

    public function filter(){
        $students = Student::where('score','>=',70)
        ->where('name','LIKE','%a%')
        ->get();
        return view ('filter', compact('students'));
    }

    public function show($id){
        $student = Student::find($id);
        return view ('show', ['student' => $student]);
    }
}
