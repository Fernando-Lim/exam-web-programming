<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Qualification;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trans = DetailTransaction::all();

        $graphTrans = Transaction::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

        $labels = $graphTrans->keys();
        $data = $graphTrans->values();

        $getDetail = Transaction::select(
            DB::raw("SUM(Discount) as Discount"),
            DB::raw("SUM(Subtotal) as Subtotal"),
            DB::raw("SUM(Total) as Total"),
            DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('id', 'ASC')
            ->get(); // Use get() instead of pluck()


        return view('transactions.index', compact('trans','labels', 'data', 'getDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $course = Course::find($request->CourseID);
        $discount = Auth::user()->member;
        if($discount == "Silver"){
            $discount = (5 / 100) * $course->Price;
        } else if ($discount == "Gold"){
            $discount = (10 / 100) * $course->Price;
        } else if ($discount == "Platinum"){
            $discount = (15 / 100) * $course->Price;
        } else{
            $discount = (0 / 100) * $course->Price;
        }
        $qualifications = Qualification::where('TopicID',$request->CourseID)->pluck('InstructorID');
        $instructors = Instructor::whereIn('id',$qualifications)->get();
        return view('transactions.create', compact('course','instructors','discount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'TransCode' => strtoupper(Str::random(6)),
            'TransDate' => now()->toDateString(),
            'CustName' => Auth::user()->name,
            'Member' => Auth::user()->member,
            'Subtotal' => str_replace(['.', ','], ['', '.'], $request->Subtotal),
            'Discount' => str_replace(['.', ','], ['', '.'], $request->Discount),
            'Total' => str_replace(['.', ','], ['', '.'], $request->Total),
        ]);
        DetailTransaction::create([
            'TransID' => $transaction->id,
            'CourseID' => $request->CourseID,
            'InstructorID' => $request->InstructorID,
            'StartDate' => now()->toDateString(),
            'Price' => str_replace(['.', ','], ['', '.'], $request->Total),
            'Discount' => str_replace(['.', ','], ['', '.'], $request->Discount),
        ]);
        return redirect()->route('courses.index')->with('success', 'Transaction success');
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
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');

    }
}
