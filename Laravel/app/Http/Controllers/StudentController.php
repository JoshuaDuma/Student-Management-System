<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Auth;
use View;

class StudentController extends Controller
{

    private function generateStudentNumber()
    {
        /* @TODO
        * Get from db, store in memory and check if random generated string is in list of student numbers.
        *   Or use query to check.
        * Using randomly generated placeholder for now.
        */
        $randAlphaNum = bin2hex(random_bytes(20));
        return $randAlphaNum;
    }

    // For quick testing.
    private $classroomArr = [10,20,30,40,50,60];
    private $studentNumbers = [1,2,3,4,5,6];

    public function createStudent(Request $request)
    {
        if ($request->has('first_name') && $request->has('last_name') && $request->has('classroom_id')) {
            $student = new Student;
            $student->first_name = $request->only('first_name', false);
            $student->last_name = $request->input('last_name', false);
            $student->classroom_id = $request->input('classroom_id', false);
            if(!isset(array_flip($this->classroomArr)[$student->classroom_id])){
                return response()->json([
                    "message" => "Forbidden",
                    "errors" =>[
                        "message" => "Invalid classroom id."
                    ]
                  ], 403);
            }
            $student->student_number = $this->generateStudentNumber();
            /* @TODO
            * Insert query into database.
            */
        }
        else{
            return response()->json([
                "message" => "Forbidden",
                "errors" =>[
                    "message" => "Missing first name, last name or classroom id."
                ]
              ], 403);
        }
        return response()->json([
            "message" => "Student record created."
                  ], 201);
    }

    public function updateStudentRecord(Request $request){
        $student = new Student;
        
        if ($request->has('student_number') && ($request->has('first_name') || $request->has('last_name') || $request->has('classroom_id'))) {
            
            $student->first_name = $request->input('first_name', false);
            $student->last_name = $request->input('last_name', false);
            $student->classroom_id = $request->input('classroom_id', false);
            $student->student_number = $request->input('student_number', false);
            /* @TODO
            * Use update query for database where student number equals student_number, omit columns where the value is false.
            */
        }
        else{
            return response()->json([
                "message" => "Forbidden",
                "errors" =>[
                    "message" => "Invalid student number."
                ]
              ], 403);
        }
        return response()->json([
            "message" => "Student record updated."
                  ], 201);
    }

    public function getStudentRecord(Request $request, $id){
        // Check if student id exists, if not then return error.
        if(!isset(array_flip($this->studentNumbers)[$id])){
            return response()->json([
                "message" => "Forbidden",
                "errors" =>[
                    "message" => "Invalid student number."
                ]
              ], 403);
        }
        /* @TODO
        * GET student classroom information.
        */
        $classRoomInformation = ["name" => "bob", "school_id" => 1];
        return response()->json($classRoomInformation, 201);
    }

    public function deleteStudentRecord(Request $request, $id){
        // Check if student id exists, if not then return error.
        if(!isset(array_flip($this->studentNumbers)[$id])){
            return response()->json([
                "message" => "Forbidden",
                "errors" =>[
                    "message" => "Invalid student number."
                ]
              ], 403);
        }
        $student = new Student;
        $student->is_deleted = 1;
        /* @TODO
        * Perform soft delete.
        */
        return response()->json([
            "message" => "Student record created deleted."
                  ], 201);
    }
}
