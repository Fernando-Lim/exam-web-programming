@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Enrollment') }}
                    <a href="{{ route('courses.index') }}" style="float: right" class="btn btn-secondary float-right"><-Back</a>
                </div>

                <div class="card-body bg-white">


                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="InstructorID">Instructor</label>
                            <select class="form-control" id="InstructorID" name="InstructorID" required>
                                <option disabled selected value="">---Select---</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id}}">{{ $instructor->InstructorName }} - {{ $instructor->ExpDesc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Subtotal">Subtotal</label>
                            <input type="text" class="form-control" id="Subtotal" name="Subtotal" placeholder="{{$course->Price}}" value="{{ number_format($course->Price, 2, ',', '.') }}" min="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Discount">Discount</label>
                            <input type="text" class="form-control" id="Discount" name="Discount" value="{{ number_format($discount, 2, ',', '.') }}" min="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Total">Total</label>
                            <input type="text" class="form-control" id="Total" name="Total" value="{{ number_format(($course->Price - $discount), 2, ',', '.') }}" min="0" readonly>
                        </div>
                        <input type="text" style="visibility: hidden" class="form-control" id="CourseID" name="CourseID" value="{{ $course->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Enroll</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection