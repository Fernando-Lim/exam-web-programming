@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add') }}
                    <a href="{{ route('qualifications.index') }}" style="float: right" class="btn btn-secondary float-right"><-Back</a>
                </div>

                <div class="card-body bg-white">


                    <form action="{{ route('qualifications.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="InstructorID">Instructor</label>
                            <select class="form-control" id="InstructorID" name="InstructorID" required>
                                <option disabled selected value="">---Select---</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id}}">{{ $instructor->InstructorName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="TopicID">Course</label>
                            <select class="form-control" id="TopicID" name="TopicID" required>
                                <option disabled selected value="">---Select---</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id}}">{{ $course->CourseName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection