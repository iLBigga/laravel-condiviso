<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $params = $request->validate(
            [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'date_of_birth' => 'required|date|before:today',
                'fiscal_code' => 'required|min:16|max:16|distinct',
                'enrolment_date' => 'required|date|before:today',
                'email' => 'required||email|distinct|max:255',
            ]
        );

        $lastRegistrationNumber = Student::max('registration_number');

        $params['registration_number'] = $lastRegistrationNumber + 1;

        $student = Student::create($params);

        return redirect()->route('students.show', $student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {        
        $student = Student::findOrFail($student);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $department = Student::findOrFail($student);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $s = Student::findOrFail($student);

        $params = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'date_of_birth' => 'required|date|before:today',
            'fiscal_code' => 'required|min:16|max:16|distinct',
            'enrolment_date' => 'required|date|before:today',
            'email' => 'required||email|distinct|max:255',
        ]);

        $s->update($params);

        return redirect()->route('students.show', $s);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $s = Student::findOrFail($student);

        $s->delete();

        return redirect()->route('students.index');
    }
}
