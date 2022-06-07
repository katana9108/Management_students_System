<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        $users = User::all();
        return view('welcome', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        return view('Student.index', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Students();
        $students->first_name = $request->input('first_name');
        $students->last_name = $request->input('last_name');
        $students->email = $request->input('email');
        $students->cne = $request->input('cne');
        $students->formation = $request->input('formation');
        $students->age = $request->input('age');
        $students->save();
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student  = Students::find($id);
        $students = Students::all();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::find($id);
        $students = Students::all();
        return view('studentEdit', compact('students','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student = Students::find($id);
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->cne = $request->input('cne');
        $student->formation = $request->input('formation');
        $student->age = $request->input('age');
        $student->user_id= $request->input('user_id');
        $student->save();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $student = Students::find($id);
        $student->delete();
        return back();

    }


    public function search($name){
        $student = Students::where('name','LIKE'.'%'.$name.'%')->first();
        return $student;

    }
}
