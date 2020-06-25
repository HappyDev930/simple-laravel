<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function list() {
        $student = Student::All();
        return response()->json($student);
    } 

    public function save(Request $request){
        if($request->input('id')){
            $student = Student::find($request->input('id'));
        } else {
            $student = new Student();
        }
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->class = $request->input('class');
        $student->date_of_birth = $request->input('date_of_birth');

        $numbers = Student::where('class', $student)->count();
        if($numbers < 10) {
            $student->save();
            return response()->json('Added Successfully');
        } else {
            return response()->json('Exceed limit 10');
        }
        
    }

    public function getStudentDetail($id) {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function delete($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json('deleted successfully');
    }
}
