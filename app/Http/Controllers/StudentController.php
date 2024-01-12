<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;

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

    public function create(){
        return view ('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'score' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'score' => $request->score,
            'teacher_id' => 1
        ]);

        return Redirect::route('index');
    }

    public function edit(Student $student){
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student){
        $student->update([
            'name' => $request->name,
            'score' => $request->score,
        ]);
        return redirect::route('index');
    }
}
