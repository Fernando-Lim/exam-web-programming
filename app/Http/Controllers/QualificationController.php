<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualifications = Qualification::all();
        return view('qualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::all();
        $courses = Course::all();
        return view('qualifications.create', compact('instructors','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Qualification::create($request->all());
        return redirect()->route('qualifications.index')->with('success', 'Qualification created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $qualification = Qualification::find($id);
        $instructors = Instructor::all();
        $courses = Course::all();
        return view('qualifications.edit', compact('qualification','instructors','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $qualification = Qualification::find($id);

        $checkQualification = Qualification::where([
            'InstructorID' => $request->InstructorID,
            'TopicID' => $request->TopicID,
        ])->first();

        if(empty($checkQualification)){
            $qualification->update($request->all());
        }else{
            return redirect()->route('qualifications.index')->with('failed', 'Qualification not updated because there is duplicate qualification');
        }

        return redirect()->route('qualifications.index')->with('success', 'Qualification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Qualification::destroy($id);
        return redirect()->route('qualifications.index')->with('success', 'Qualification deleted successfully');

    }
}
