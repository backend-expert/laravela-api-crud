<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class ApiController extends Controller
{
    public function getAllStudent(Student $student)
    {
        $students = $student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);

    }

    public function createStudent(Request $req, Student $student)
    {
        $student->name = $req->name;  
        $student->course = $req->course;
        $student->save();
        
        return response()->json([
            'message'=>'Student record created'
        ], 201);

    }

    public function getStudent($id)
    {
        if (Student::where('id', $id)->exists())
        {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                'message'=>'Student not found'
            ], 404);
        }

    }

    public function updateStudent(Request $req, $id)
    {
        if (Student::where('id', $id)->exists())
        {
            $student = Student::find($id);
            $student->name = is_null($req->name) ?  $student->name :  $req->name;
            $student->course = is_null($req->course) ?  $student->course :  $req->course;
            
            $student->save();

            return response()->json([
                'message'=>'records update success!'
            ], 200);

        } else {
            return response()->json([
                'message'=>'Student not found!'
            ], 404);
        }

    }

    public function deleteStudent($id)
    {
        if (Student::where('id', $id)->exists())
        {
            $student = Student::find($id);

            $student->delete();

            return response()->json([
                'message'=>'Records deleted'
            ], 202);
        } else {
            return response()->json([
                'message'=>'Studente not found'
            ], 404);
        }

    }
    
}
